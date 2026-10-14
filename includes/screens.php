<?php
/*
 * Phone mockups of the app screens, drawn in HTML/CSS with sample rates.
 * To use a real screenshot instead, save it as /assets/screens/<key>.webp
 * (keys: rates, compare, cart, orders, khata; portrait, about 1080x2280) and it is picked up automatically.
 */
require_once __DIR__ . '/icons.php';

const PRODUCTS = [
    'tomato'      => ['Tomato', 'टमाटर', 28, 6],
    'onion'       => ['Onion', 'प्याज़', 34, 6],
    'potato'      => ['Potato', 'आलू', 18, 5],
    'cauliflower' => ['Cauliflower', 'फूलगोभी', 30, 4],
    'ladyfinger'  => ['Bhindi', 'भिंडी', 40, 4],
    'chilli'      => ['Green chilli', 'हरी मिर्च', 60, 5],
    'spinach'     => ['Spinach', 'पालक', 24, 4],
    'apple'       => ['Apple', 'सेब', 120, 3],
    'banana'      => ['Banana', 'केला', 48, 4],
    'coriander'   => ['Coriander', 'धनिया', 60, 4],
];

function thumb(string $key, bool $lazy): string
{
    return '<img src="/assets/img/p/' . $key . '.webp" width="40" height="40" alt=""'
        . ($lazy ? ' loading="lazy" decoding="async"' : '') . '>';
}

/** Wraps a screen in a phone frame; uses /assets/screens/<key>.webp if it exists. */
function phone(string $key, string $label, bool $lazy = true, string $class = ''): string
{
    $file = '/assets/screens/' . $key . '.webp';
    if (is_file(__DIR__ . '/..' . $file)) {
        $inner = '<img class="shot" src="' . $file . '" width="360" height="760" alt="' . e($label) . '"'
            . ($lazy ? ' loading="lazy" decoding="async"' : '') . '>';
        return '<div class="phone ' . e($class) . '"><div class="screen">' . $inner . '</div></div>';
    }
    $fn = 'screen_' . $key;
    return '<div class="phone ' . e($class) . '" role="img" aria-label="' . e($label) . '">'
        . '<div class="screen" aria-hidden="true">' . $fn($lazy) . '</div></div>';
}

function appbar(string $title, string $sub = ''): string
{
    return '<div class="s-bar"><div><b>' . $title . '</b>' . ($sub ? '<small>' . $sub . '</small>' : '') . '</div>'
        . icon('bell', 'ico s-bell') . '</div>';
}

function tomorrow(): string
{
    return date('D, j M', strtotime('tomorrow'));
}

function screen_rates(bool $lazy): string
{
    $h = appbar('Tomorrow’s rates', 'Roorkee · ' . tomorrow());
    $h .= '<div class="s-search">' . icon('search') . '<span>Search “tamatar”, “pyaz”…</span>' . icon('mic', 'ico s-mic') . '</div>';
    $h .= '<div class="s-tabs"><span class="on">Sabzi</span><span>Fruits</span><span class="s-sort">' . icon('sort') . 'Lowest</span></div>';
    $h .= '<ul class="s-list">';
    foreach (['tomato', 'onion', 'potato', 'cauliflower', 'ladyfinger', 'chilli', 'spinach'] as $k) {
        [$en, $hi, $price, $shops] = PRODUCTS[$k];
        $h .= '<li>' . thumb($k, $lazy) . '<span class="s-name">' . $en . '<small>' . $hi . ' · ' . $shops . ' shops</small></span>'
            . '<span class="s-price"><small class="s-from">from</small>₹' . $price . '<small>/kg</small></span></li>';
    }
    return $h . '</ul><div class="s-cut">' . icon('clock') . 'Order by 10 PM tonight</div>';
}

function screen_compare(bool $lazy): string
{
    $h = appbar('Tomato · टमाटर', 'Rates for ' . tomorrow());
    $h .= '<div class="s-hero"><img src="/assets/img/p/tomato-lg.webp" width="110" height="110" alt=""'
        . ($lazy ? ' loading="lazy" decoding="async"' : '') . '><p>6 shops · sorted by price</p></div>';
    $h .= '<ul class="s-list s-shops">';
    $rows = [['Ram Sabzi Wale', 28, true], ['Kisan Traders', 30, false], ['Shiv Sabzi Bhandar', 30, false],
             ['Ganga Fruits & Veg', 32, false], ['Naveen Mandi Store', 34, false]];
    foreach ($rows as [$shop, $p, $best]) {
        $h .= '<li><span class="s-name">' . $shop . ($best ? '<em>Lowest</em>' : '') . '<small>Delivery · pickup</small></span>'
            . '<span class="s-price">₹' . $p . '<small>/kg</small></span><span class="s-add">+</span></li>';
    }
    return $h . '</ul>';
}

function screen_cart(bool $lazy): string
{
    $h = appbar('Your cart', '2 shops · delivery ' . tomorrow());
    $groups = [
        'Ram Sabzi Wale' => [['tomato', '2 kg', 56], ['onion', '3 kg', 102], ['chilli', '250 g', 15]],
        'Ganga Fruits & Veg' => [['apple', '1 kg', 120], ['banana', '1 kg', 48]],
    ];
    foreach ($groups as $shop => $items) {
        $h .= '<div class="s-group"><b>' . $shop . '</b><ul class="s-list">';
        foreach ($items as [$k, $qty, $amt]) {
            $h .= '<li>' . thumb($k, $lazy) . '<span class="s-name">' . PRODUCTS[$k][0] . '<small>' . $qty . '</small></span>'
                . '<span class="s-price">₹' . $amt . '</span></li>';
        }
        $h .= '</ul></div>';
    }
    $h .= '<div class="s-sum"><p><span>Estimated items</span><span>₹341</span></p><p><span>Delivery charge</span><span>₹20</span></p>'
        . '<p class="s-note">' . icon('weight') . 'Final bill by actual weight</p></div>';
    return $h . '<div class="s-btn">Place order · ₹361</div>';
}

function screen_orders(bool $lazy): string
{
    $h = appbar('Order #2417', 'Ram Sabzi Wale · ' . tomorrow());
    $steps = [['Placed', '8:42 PM', 'done'], ['Accepted by vendor', '8:55 PM', 'done'], ['Weighed & packed', '6:10 AM', 'done'],
              ['Out for delivery', '7:30 AM', 'now'], ['Delivered', '', '']];
    $h .= '<ol class="s-steps">';
    foreach ($steps as [$t, $time, $state]) {
        $h .= '<li class="' . $state . '"><b>' . $t . '</b>' . ($time ? '<small>' . $time . '</small>' : '') . '</li>';
    }
    $h .= '</ol><div class="s-sum"><p><span>Estimate</span><s>₹173</s></p><p><span>Weighed bill</span><b>₹168</b></p>'
        . '<p class="s-note">' . icon('check') . 'You pay for what was weighed</p></div>';
    return $h;
}

function screen_khata(bool $lazy): string
{
    $h = appbar('Khata · खाता', 'Ganga Fruits & Veg');
    $h .= '<div class="s-due"><small>Balance due</small><b>₹318</b><span>Pay by UPI or cash</span></div>';
    $rows = [['Today', 'Order #2417 delivered', '+₹168', ''], ['Yesterday', 'UPI payment · ref 4821', '−₹250', 'paid'],
             ['12 Oct', 'Order #2380 delivered', '+₹210', ''], ['10 Oct', 'Cash payment', '−₹100', 'paid'],
             ['9 Oct', 'Order #2331 delivered', '+₹290', '']];
    $h .= '<ul class="s-list s-ledger">';
    foreach ($rows as [$d, $what, $amt, $cls]) {
        $h .= '<li><span class="s-name">' . $what . '<small>' . $d . '</small></span><span class="s-price ' . $cls . '">' . $amt . '</span></li>';
    }
    return $h . '</ul>';
}
