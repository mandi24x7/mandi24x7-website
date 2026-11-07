/* Mandi 24x7: carousel buttons (it also scrolls by touch without this) and the page's motion. */
window.mandiMotion = true;

(function () {
  var track = document.getElementById('shots');
  if (!track) return;
  var buttons = document.querySelectorAll('.car-btn');
  var smooth = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function step() {
    var slide = track.querySelector('.slide');
    return slide ? slide.getBoundingClientRect().width + 16 : track.clientWidth;
  }

  function update() {
    var max = track.scrollWidth - track.clientWidth - 2;
    buttons[0].disabled = track.scrollLeft <= 2;
    buttons[1].disabled = track.scrollLeft >= max;
  }

  buttons.forEach(function (b) {
    b.addEventListener('click', function () {
      track.scrollBy({ left: step() * Number(b.getAttribute('data-dir')), behavior: smooth ? 'smooth' : 'auto' });
    });
  });
  track.addEventListener('scroll', update, { passive: true });
  window.addEventListener('resize', update);
  update();
})();

(function () {
  var root = document.documentElement;
  var header = document.querySelector('.site-header');
  var hero = document.querySelector('.hero');
  var animated = root.classList.contains('anim');

  function onScroll() {
    var y = window.scrollY;
    if (header) header.classList.toggle('scrolled', y > 8);
    // Slow drift while the hero is in view: the heap sinks and the phone lifts away.
    if (animated && hero && y < hero.offsetHeight) {
      hero.style.setProperty('--heap', Math.round(y * 0.14) + 'px');
      hero.style.setProperty('--art', Math.round(y * -0.05) + 'px');
    }
  }
  var queued = false;
  window.addEventListener('scroll', function () {
    if (queued) return;
    queued = true;
    requestAnimationFrame(function () { queued = false; onScroll(); });
  }, { passive: true });
  onScroll();

  if (!animated) return;

  // Things rise into place when scrolled to; items in one group follow each other.
  var targets = document.querySelectorAll('.sec-head, .step, .feat, .fresh-tile, .v-list li, .vendor-card, .trust-row li, .slide, .faq details, .final-card');
  var seen = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('in');
      seen.unobserve(entry.target);
      if (entry.target.classList.contains('vendor-card')) countUp(entry.target);
    });
  }, { rootMargin: '0px 0px -8% 0px', threshold: 0.12 });
  targets.forEach(function (el) {
    var index = Array.prototype.indexOf.call(el.parentNode.children, el);
    if (el.parentNode.children.length > 1 && !el.classList.contains('sec-head')) {
      el.style.setProperty('--d', Math.min(index, 6) * 0.07 + 's');
    }
    seen.observe(el);
  });

  // The packing list's quantities count up as the rows arrive.
  function countUp(card) {
    card.querySelectorAll('.vc-list b').forEach(function (b, i) {
      var parts = b.textContent.match(/^(\d+)(.*)$/);
      if (!parts) return;
      var goal = Number(parts[1]);
      var start = performance.now() + 700 + i * 150;
      b.textContent = '0' + parts[2];
      (function tick(now) {
        var t = Math.min(Math.max((now - start) / 800, 0), 1);
        b.textContent = Math.round(goal * (1 - Math.pow(1 - t, 3))) + parts[2];
        if (t < 1) requestAnimationFrame(tick);
      })(performance.now());
    });
  }

  // The fresh tiles only move while they are on screen.
  var fresh = document.querySelector('.fresh');
  if (fresh) {
    new IntersectionObserver(function (entries) { fresh.classList.toggle('live', entries[0].isIntersecting); }).observe(fresh);
  }

  playDemo();

  // How to order, played on a phone: add two items, place the order, follow it to the door.
  function playDemo() {
    var stage = document.querySelector('.demo-stage');
    if (!stage) return;
    var tap = stage.querySelector('.demo-tap');
    var bar = stage.querySelector('.demo-bar');
    var count = stage.querySelector('.demo-count');
    var code = stage.querySelector('.demo-code');
    var rows = stage.querySelectorAll('.scene-rates .demo-list li');
    var marks = stage.querySelectorAll('.demo-steps li');
    var steps = document.querySelectorAll('.how-grid .step');
    var on = false;
    var run = 0;

    function setStep(i) {
      steps.forEach(function (s, n) { s.classList.toggle('on', n === i); });
    }
    function setScene(name) {
      stage.setAttribute('data-scene', name);
    }
    function press(selector) {
      var target = stage.querySelector(selector);
      if (!target) return;
      var box = stage.getBoundingClientRect();
      var spot = target.getBoundingClientRect();
      tap.style.transform = 'translate(' + (spot.left + spot.width / 2 - box.left) + 'px,' + (spot.top + spot.height / 2 - box.top) + 'px)';
      tap.classList.add('show');
      setTimeout(function () {
        tap.classList.remove('press');
        void tap.offsetWidth;
        tap.classList.add('press');
      }, 560);
    }
    function reset() {
      setScene('rates');
      setStep(0);
      bar.classList.remove('show');
      code.classList.remove('show');
      count.textContent = '0';
      tap.classList.remove('show');
      rows.forEach(function (r) { r.classList.remove('picked'); });
      marks.forEach(function (m) { m.classList.remove('done'); });
    }

    var script = [
      [700, function () { press('.add-a'); }],
      [720, function () { rows[0].classList.add('picked'); bar.classList.add('show'); count.textContent = '1'; }],
      [500, function () { press('.add-b'); }],
      [720, function () { rows[1].classList.add('picked'); count.textContent = '2'; }],
      [500, function () { press('.demo-bar'); }],
      [720, function () { setScene('cart'); setStep(1); tap.classList.remove('show'); }],
      [900, function () { press('.demo-place'); }],
      [720, function () { setScene('placed'); tap.classList.remove('show'); }],
      [1500, function () { setScene('track'); setStep(2); marks[0].classList.add('done'); }],
      [800, function () { marks[1].classList.add('done'); }],
      [800, function () { marks[2].classList.add('done'); code.classList.add('show'); }],
      [1300, function () { marks[3].classList.add('done'); }],
      [2400, reset],
    ];

    function play(index, id) {
      if (id !== run) return;
      var item = script[index % script.length];
      setTimeout(function () {
        if (id !== run) return;
        item[1]();
        play(index + 1, id);
      }, item[0]);
    }
    // Starts from the top each time it scrolls into view, so nobody walks in halfway through.
    new IntersectionObserver(function (entries) {
      var seen = entries[0].isIntersecting;
      if (seen === on) return;
      on = seen;
      run += 1;
      reset();
      if (seen) play(0, run);
    }, { threshold: 0.35 }).observe(stage);
  }

  // The hero phone does what the app does: the shop rates sort themselves, lowest first.
  var list = document.querySelector('.phone-hero .s-list');
  var tag = document.querySelector('.rate-tag');
  var chip = document.querySelector('.phone-hero .s-sort');
  if (!list || !list.animate) return;
  var rows = Array.prototype.slice.call(list.children); // the page lists them lowest first
  var mixed = [2, 4, 0, 3, 5, 6, 1].map(function (i) { return rows[i]; });
  var visible = true;
  var sorted = false;
  mixed.forEach(function (r) { list.appendChild(r); });
  rows[0].classList.remove('best');

  function arrange(order) {
    var before = new Map(rows.map(function (r) { return [r, r.getBoundingClientRect().top]; }));
    order.forEach(function (r) { list.appendChild(r); });
    order.forEach(function (r, i) {
      var shift = before.get(r) - r.getBoundingClientRect().top;
      if (shift) {
        r.animate([{ transform: 'translateY(' + shift + 'px)' }, { transform: 'none' }], {
          duration: 750, delay: i * 35, easing: 'cubic-bezier(.3, .8, .2, 1)', fill: 'backwards',
        });
      }
    });
  }

  function cycle() {
    if (visible) {
      sorted = !sorted;
      arrange(sorted ? rows : mixed);
      rows[0].classList.toggle('best', sorted);
      if (tag) tag.classList.toggle('show', sorted);
      if (chip && sorted) {
        chip.classList.remove('pulse');
        void chip.offsetWidth;
        chip.classList.add('pulse');
      }
    }
    setTimeout(cycle, sorted ? 5200 : 1800);
  }
  new IntersectionObserver(function (entries) { visible = entries[0].isIntersecting; }).observe(list);
  setTimeout(cycle, 1900);
})();
