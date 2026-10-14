# Mandi 24x7 website (mandi24x7.com)

Plain PHP 8 + HTML/CSS for Hostinger shared hosting. No framework, no build step: upload and it runs.

## Upload to Hostinger `public_html/`

Upload everything in this folder **except** `README.md`, `LANDING-PAGE-BRIEF.md` and `_old-html/`:

```
.htaccess          index.php          privacy-policy.php   terms.php
404.php            config.php         delete-account.php   contact.php
style.css          favicon.ico        site.webmanifest     browserconfig.xml
robots.txt         sitemap.xml
includes/          (header.php, footer.php, icons.php, screens.php)
assets/            (fonts/, icons/, img/, og-image.png, site.js)
```

`.htaccess` starts with a dot, so turn on "Show hidden files" in Hostinger File Manager or your FTP app.

## URLs that must never change

The app, Google Play and the App Store link to these. `.htaccess` maps them to the PHP files:

| URL | File |
|---|---|
| https://mandi24x7.com/privacy-policy | privacy-policy.php |
| https://mandi24x7.com/terms | terms.php |
| https://mandi24x7.com/delete-account | delete-account.php |
| https://mandi24x7.com/contact | contact.php |

Old addresses such as `/terms.html` or `/terms.php` redirect (301) to these. `www.` and `http://` redirect to `https://mandi24x7.com`.

## Day-to-day changes: `config.php`

- **Google Play launch:** set `PLAY_STORE_LIVE = true`. All "Coming soon on Google Play" badges become "Get it on Google Play" links, and "Get the app" and "Open your shop" open the Play Store.
- **Legal details:** fill `BUSINESS_NAME`, `BUSINESS_ADDRESS`, `GRIEVANCE_OFFICER`, `SUPPORT_PHONE` and `COURT_CITY`. While a value is empty, the page shows it as a yellow `[placeholder]`.

## Real app screenshots

The phone screens on the home page are drawn in HTML with sample rates. To show real screenshots, save them as WebP
(portrait, about 1080×2280) in `assets/screens/` named `rates.webp`, `compare.webp`, `cart.webp`, `orders.webp`
and `khata.webp`. Each one replaces its drawn screen automatically.

## Files

| File | Purpose |
|---|---|
| `index.php` | Landing page |
| `includes/header.php`, `includes/footer.php` | Shared `<head>` (SEO, Open Graph, favicons), site header and footer |
| `includes/screens.php` | Phone mockups (sample rates) |
| `includes/icons.php` | Inline SVG icons |
| `style.css` | All styles (mobile-first, light and dark mode) |
| `assets/fonts/` | Baloo 2 (Latin + Devanagari), self-hosted |
| `_old-html/` | The previous static pages, kept for reference; do not upload |
