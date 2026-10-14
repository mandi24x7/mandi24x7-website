/* Mandi 24x7: prev/next buttons for the screenshot carousel (it also scrolls by touch without this). */
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
