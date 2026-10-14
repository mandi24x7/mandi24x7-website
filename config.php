<?php
/*
 * Mandi 24x7 website settings: the only file you normally need to edit.
 */

// ---- Google Play ----------------------------------------------------------
// Set to true once the app is approved on Google Play. Every "Get it on Google Play"
// button, the header "Get the app" button and the vendor "Open your shop" button switch over.
const PLAY_STORE_LIVE = false;
const PLAY_STORE_URL  = 'https://play.google.com/store/apps/details?id=com.mandi24x7.app';

// ---- Site -----------------------------------------------------------------
const SITE_URL      = 'https://mandi24x7.com';   // no trailing slash
const SITE_NAME     = 'Mandi 24x7';
const SUPPORT_EMAIL = 'mandirke24x7@gmail.com';
const CITY          = 'Roorkee';
const STATE         = 'Uttarakhand';

// ---- Legal details (shown on Privacy, Terms and Contact) ------------------
// Leave a value empty ('') and the page shows a highlighted [placeholder] instead.
const BUSINESS_NAME     = '';   // registered business name, e.g. 'Mandi 24x7 Services Pvt Ltd'
const BUSINESS_ADDRESS  = '';   // full business address
const GRIEVANCE_OFFICER = '';   // grievance officer's full name
const SUPPORT_PHONE     = '';   // support phone / WhatsApp, e.g. '+91 98xxx xxxxx'
const COURT_CITY        = '';   // court jurisdiction city in the Terms: 'Haridwar' or 'Roorkee'

date_default_timezone_set('Asia/Kolkata');

// ---- Helpers --------------------------------------------------------------

/** HTML-escape a string. */
function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/** A filled-in value, or a highlighted [placeholder] while it is still empty. */
function fill(string $value, string $placeholder): string
{
    return $value !== '' ? e($value) : '<mark>[' . e($placeholder) . ']</mark>';
}

/** Where "get the app" style buttons point: the Play Store when live, otherwise the download section. */
function app_link(): string
{
    return PLAY_STORE_LIVE ? PLAY_STORE_URL : '/#download';
}

/** The Google Play badge: a real link when live, a "coming soon" badge until then. */
function play_badge(string $extraClass = ''): string
{
    $icon = '<svg class="play-ico" viewBox="0 0 24 26" aria-hidden="true" focusable="false">'
        . '<path fill="#00d7fe" d="M1 1.2 13.6 13 1 24.8c-.4-.3-.6-.8-.6-1.4V2.6c0-.6.2-1.1.6-1.4Z"/>'
        . '<path fill="#ffce00" d="m17.8 17.2-4.2-4.2 4.2-4.2 4.7 2.7c1.4.8 1.4 2.2 0 3l-4.7 2.7Z"/>'
        . '<path fill="#ff3a44" d="M17.8 17.2 13.6 13 1 24.8c.5.5 1.2.5 2.1 0l14.7-7.6Z"/>'
        . '<path fill="#00f076" d="M17.8 8.8 3.1 1.2C2.2.7 1.5.7 1 1.2L13.6 13l4.2-4.2Z"/></svg>';
    $cls = trim('play-badge ' . $extraClass);
    if (PLAY_STORE_LIVE) {
        return '<a class="' . e($cls) . '" href="' . e(PLAY_STORE_URL) . '" rel="noopener">'
            . $icon . '<span><small>GET IT ON</small>Google Play</span></a>';
    }
    return '<span class="' . e($cls . ' is-soon') . '" role="img" aria-label="Coming soon on Google Play">'
        . $icon . '<span><small>Coming soon on</small>Google Play</span></span>';
}
