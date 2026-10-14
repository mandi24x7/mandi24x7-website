<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/icons.php';
require_once __DIR__ . '/includes/screens.php';

$title       = 'Mandi 24x7: Roorkee mandi fruit & vegetable rates, order online';
$description = 'Compare today’s mandi rates from every vegetable and fruit vendor in Roorkee. Order tonight, get fresh delivery tomorrow.';
$path        = '/';
$bodyClass   = 'home';

$faqs = [
    ['Is there a delivery charge?',
     'Shown in the cart before you order; set per city, free above a set amount.'],
    ['Why can my bill change?',
     'Produce is sold by weight; you pay for what the vendor actually weighs.'],
    ['How do I pay?',
     'Directly to the vendor by cash or UPI; it’s recorded in your khata.'],
    ['Which cities?',
     'Roorkee now, more soon.'],
    ['How do I become a vendor?',
     'Install the app → Profile → Open a shop; we verify within a day.'],
    ['How do I delete my account?',
     'In the app, or see <a href="/delete-account">/delete-account</a>.'],
];

$ld = [
    [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => SITE_NAME,
        'url'      => SITE_URL . '/',
        'logo'     => SITE_URL . '/assets/icons/android-chrome-512x512.png',
        'email'    => SUPPORT_EMAIL,
        'address'  => ['@type' => 'PostalAddress', 'addressLocality' => CITY, 'addressRegion' => STATE, 'addressCountry' => 'IN'],
    ],
    [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(fn($f) => [
            '@type' => 'Question', 'name' => $f[0],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => strip_tags($f[1])],
        ], $faqs),
    ],
];
if (PLAY_STORE_LIVE) {
    $ld[] = [
        '@context' => 'https://schema.org',
        '@type'    => 'MobileApplication',
        'name'     => SITE_NAME,
        'operatingSystem'     => 'ANDROID',
        'applicationCategory' => 'ShoppingApplication',
        'installUrl' => PLAY_STORE_URL,
        'offers'     => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'INR'],
    ];
}
$headExtra = '  <script type="application/ld+json">' . json_encode($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) . '</script>' . "\n";

$vendorHref = PLAY_STORE_LIVE
    ? PLAY_STORE_URL
    : 'mailto:' . SUPPORT_EMAIL . '?subject=' . rawurlencode('Open my shop on Mandi 24x7');

$footExtra = '<script src="/assets/site.js?v=' . (@filemtime(__DIR__ . '/assets/site.js') ?: 1) . '" defer></script>';

require __DIR__ . '/includes/header.php';
?>

<!-- ============ Hero ============ -->
<section class="hero">
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <p class="eyebrow"><?= icon('pin') ?>Sabzi mandi Roorkee · aaj ka bhav</p>
      <h1>Your city’s <span class="hl">sabzi mandi</span>, on your phone</h1>
      <p class="hindi" lang="hi">मंडी के सारे रेट, एक जगह</p>
      <p class="lead">Compare tomorrow’s fruit &amp; vegetable rates from every vendor in Roorkee. Order tonight, get it fresh tomorrow.</p>
      <div class="cta-row">
        <?= play_badge() ?>
        <a class="btn btn-ghost" href="#vendors">For vendors <?= icon('arrow') ?></a>
      </div>
      <p class="fine"><?= icon('clock') ?>Order before 10 PM · home delivery or pickup tomorrow</p>
    </div>

    <div class="hero-art">
      <span class="ring r1" aria-hidden="true"></span>
      <span class="ring r2" aria-hidden="true"></span>
      <?= phone('rates', 'The Mandi 24x7 app showing tomorrow’s vegetable rates in Roorkee, sorted by lowest price', false, 'phone-hero') ?>
      <img class="bubble b1" src="/assets/img/p/tomato-lg.webp" width="160" height="160" alt="" fetchpriority="low">
      <img class="bubble b2" src="/assets/img/p/apple-lg.webp" width="160" height="160" alt="" fetchpriority="low">
      <img class="bubble b3" src="/assets/img/p/chilli-lg.webp" width="160" height="160" alt="" fetchpriority="low">
      <img class="bubble b4" src="/assets/img/p/onion-lg.webp" width="160" height="160" alt="" fetchpriority="low">
    </div>
  </div>
</section>

<!-- ============ How it works ============ -->
<section id="how" class="section">
  <div class="wrap">
    <header class="sec-head">
      <p class="kicker">How it works</p>
      <h2>Check the mandi rate tonight, get it fresh tomorrow</h2>
    </header>
    <ol class="steps-grid">
      <li class="card step">
        <span class="step-ico"><?= icon('compare') ?></span>
        <span class="step-no">1</span>
        <h3>Compare</h3>
        <p>Every evening vendors publish tomorrow’s rates; see them side by side.</p>
      </li>
      <li class="card step">
        <span class="step-ico"><?= icon('moon') ?></span>
        <span class="step-no">2</span>
        <h3>Order tonight</h3>
        <p>Pick your shop and order before the cutoff (10 PM).</p>
      </li>
      <li class="card step">
        <span class="step-ico"><?= icon('truck') ?></span>
        <span class="step-no">3</span>
        <h3>Fresh tomorrow</h3>
        <p>Home delivery or pickup; pay by actual weight.</p>
      </li>
    </ol>
  </div>
</section>

<!-- ============ For buyers ============ -->
<section id="buyers" class="section section-tint">
  <div class="wrap">
    <header class="sec-head">
      <p class="kicker">For buyers</p>
      <h2>Vegetable rate today, from every shop in the mandi</h2>
    </header>
    <ul class="feat-grid">
      <li class="card feat"><?= icon('sort') ?><div><h3>Lowest-price sorting</h3><p>See the cheapest shop for each item first.</p></div></li>
      <li class="card feat"><?= icon('mic') ?><div><h3>Hindi &amp; English voice search</h3><p>Just say “tamatar” or “tomato”.</p></div></li>
      <li class="card feat"><?= icon('shops') ?><div><h3>Order from many shops at once</h3><p>Sabzi from one, fruit from another, in one go.</p></div></li>
      <li class="card feat"><?= icon('weight') ?><div><h3>Pay only for the weighed quantity</h3><p>Your bill follows what the vendor actually weighs.</p></div></li>
      <li class="card feat"><?= icon('khata') ?><div><h3>Khata with every vendor</h3><p>Orders and payments, one clear account per shop.</p></div></li>
      <li class="card feat"><?= icon('bell') ?><div><h3>Live order updates</h3><p>Know when it is accepted, packed and on the way.</p></div></li>
    </ul>
  </div>
</section>

<!-- ============ For vendors ============ -->
<section id="vendors" class="section section-green">
  <div class="wrap vendor-grid">
    <div>
      <header class="sec-head">
        <p class="kicker">For vendors</p>
        <h2>Your shop, your mandi rate, more customers</h2>
      </header>
      <ul class="v-list">
        <li><?= icon('copy') ?><span><b>Publish rates in minutes</b> (copy yesterday’s)</span></li>
        <li><?= icon('chime') ?><span><b>New-order chime</b></span></li>
        <li><?= icon('list') ?><span><b>Packing list</b> for the mandi</span></li>
        <li><?= icon('receipt') ?><span><b>Weigh &amp; bill</b> automatically</span></li>
        <li><?= icon('wallet') ?><span><b>Customer khata</b> with UPI/cash records</span></li>
        <li><?= icon('percent') ?><span><b>Low commission</b> (from 1.5%, launch offer available)</span></li>
      </ul>
      <p class="cta-row">
        <a class="btn btn-saffron" href="<?= e($vendorHref) ?>"<?= PLAY_STORE_LIVE ? ' rel="noopener"' : '' ?>>Open your shop <?= icon('arrow') ?></a>
      </p>
      <?php if (!PLAY_STORE_LIVE): ?>
        <p class="fine">The app is coming soon on Google Play. Email us and we’ll set up your shop first.</p>
      <?php endif; ?>
    </div>

    <div class="vendor-card card" aria-label="Example vendor packing list" role="img">
      <div aria-hidden="true">
        <div class="toast"><?= icon('chime') ?><span><b>New order #2418</b><small>3 items · delivery</small></span></div>
        <p class="vc-title">Packing list · <?= e(tomorrow()) ?></p>
        <ul class="vc-list">
          <li><?= thumb('tomato', true) ?><span>Tomato<small>9 orders</small></span><b>42 kg</b></li>
          <li><?= thumb('onion', true) ?><span>Onion<small>11 orders</small></span><b>36 kg</b></li>
          <li><?= thumb('potato', true) ?><span>Potato<small>8 orders</small></span><b>30 kg</b></li>
          <li><?= thumb('coriander', true) ?><span>Coriander<small>6 orders</small></span><b>3 kg</b></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============ Trust strip ============ -->
<section class="trust" aria-label="Why trust Mandi 24x7">
  <ul class="wrap trust-row">
    <li><?= icon('pin') ?><span>Starting in <b>Roorkee, Uttarakhand</b></span></li>
    <li><?= icon('shop') ?><span>Local mandi vendors</span></li>
    <li><?= icon('tag') ?><span>Prices set by vendors, not by us</span></li>
    <li><?= icon('shield') ?><span>Your data is never sold</span></li>
  </ul>
</section>

<!-- ============ Screenshots ============ -->
<section id="screens" class="section">
  <div class="wrap">
    <header class="sec-head sec-head-row">
      <div>
        <p class="kicker">Inside the app</p>
        <h2>Mandi rates, fruit prices in Roorkee and your khata, in one app</h2>
      </div>
      <div class="car-btns">
        <button type="button" class="car-btn" data-dir="-1" aria-controls="shots" aria-label="Previous screen"><?= icon('left') ?></button>
        <button type="button" class="car-btn" data-dir="1" aria-controls="shots" aria-label="Next screen"><?= icon('right') ?></button>
      </div>
    </header>
    <ul class="carousel" id="shots" tabindex="0" aria-label="App screens">
      <?php
      $shots = [
          ['rates',   'Tomorrow’s rates',   'Every vendor’s rate, lowest first'],
          ['compare', 'Compare a product', 'One item across every shop'],
          ['cart',    'Cart',              'Many shops, one order'],
          ['orders',  'Orders',            'Live status till your door'],
          ['khata',   'Khata',             'Every order and payment, per shop'],
      ];
      foreach ($shots as [$key, $name, $cap]): ?>
        <li class="slide">
          <?= phone($key, 'App screen: ' . $name . '. ' . $cap) ?>
          <p class="cap"><b><?= e($name) ?></b><?= e($cap) ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
    <p class="fine center">Sample rates shown.</p>
  </div>
</section>

<!-- ============ FAQ ============ -->
<section id="faq" class="section section-tint">
  <div class="wrap narrow">
    <header class="sec-head center">
      <p class="kicker">FAQ</p>
      <h2>Questions, answered</h2>
    </header>
    <div class="faq">
      <?php foreach ($faqs as $i => [$q, $a]): ?>
        <details<?= $i === 0 ? ' open' : '' ?>>
          <summary><?= e($q) ?></summary>
          <p><?= $a ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ Final call to action ============ -->
<section id="download" class="final">
  <div class="wrap">
    <div class="final-card">
      <picture>
        <source media="(min-width: 760px)" srcset="/assets/img/banner-fresh-mandi.webp">
        <img class="final-bg" src="/assets/img/banner-fresh-mandi-720.webp" width="1200" height="600" alt="" loading="lazy" decoding="async">
      </picture>
      <div class="final-copy">
        <h2>Tomorrow’s rates are already live</h2>
        <p>Order before 10 PM tonight, get it fresh tomorrow.</p>
        <?= play_badge('on-dark') ?>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
