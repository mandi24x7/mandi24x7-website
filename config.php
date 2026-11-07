<?php
/*
 * Mandi 24x7 website settings: the only file you normally need to edit.
 */

// ---- App stores -----------------------------------------------------------
const PLAY_STORE_URL = 'https://play.google.com/store/apps/details?id=com.mandi24x7.app';
const APP_STORE_URL  = 'https://apps.apple.com/in/app/mandi-24x7/id6831307144';

// ---- Site -----------------------------------------------------------------
const SITE_URL      = 'https://mandi24x7.com';   // no trailing slash
const SITE_NAME     = 'Mandi 24x7';
const SUPPORT_EMAIL = 'mandirke24x7@gmail.com';
const CITY          = 'Roorkee';
const STATE         = 'Uttarakhand';

// ---- Legal details (shown on Privacy, Terms and Contact) ------------------
// Leave a value empty ('') and the page shows a highlighted [placeholder] instead.
const BUSINESS_NAME     = 'Mandi 24x7';   // registered business name, e.g. 'Mandi 24x7 Services Pvt Ltd'
const BUSINESS_ADDRESS  = 'Roorkee, District Haridwar, Uttarakhand 247667';   // full business address
const GRIEVANCE_OFFICER = 'Chander Mohan Sharma';   // grievance officer's full name
const SUPPORT_PHONE     = '+91 90451 09910';   // support phone / WhatsApp, e.g. '+91 98xxx xxxxx' (empty = the phone section is hidden)
const COURT_CITY        = 'Roorkee';   // court jurisdiction city in the Terms: 'Haridwar' or 'Roorkee'

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

/** Both store badges. Apple and Google allow only their own artwork, so it loads from their servers. */
function store_badges(): string
{
    return '<div class="store-badges">'
        . '<a class="store-badge store-badge-play" href="' . e(PLAY_STORE_URL) . '" rel="noopener">'
        . '<img src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png" width="184" height="71" alt="Get it on Google Play"></a>'
        . '<a class="store-badge" href="' . e(APP_STORE_URL) . '" rel="noopener">'
        . '<img src="https://tools.applemediaservices.com/api/badges/download-on-the-app-store/black/en-us?size=250x83" width="144" height="48" alt="Download on the App Store"></a>'
        . '</div>';
}
