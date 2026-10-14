# Mandi 24x7: landing page brief (mandi24x7.com)

Everything needed to build the home page in PHP on Hostinger. The legal pages already exist in this folder.

## 1. Must keep these URLs
The app and the Play Store link to them, so never rename them:
`/privacy-policy` · `/terms` · `/delete-account` · `/contact` (see `.htaccess` and `README.md`).

## 2. Brand
| Item | Value |
|---|---|
| Name | **Mandi 24x7** (wordmark: "Mandi" green, "24x7" saffron/red) |
| Background (cream) | `#FBF5EA` |
| Primary (forest green) | `#0E6B32` |
| Accent (saffron) | `#F28C28` |
| Text | `#1B1A12` · muted `#6B6457` |
| Dark background | `#121212` |
| Font | Bold rounded sans-serif, e.g. **Poppins** or **Baloo 2** (Google Fonts); Baloo 2 also has Hindi glyphs |
| Style | Warm, friendly, desi mandi; rounded cards (16–22px radius), soft shadows, plenty of cream space |

**Assets** (in `D:\mandi24x7\assets\`):
- Header logo: `web/logo-header-light.png` (dark mode: `logo-header-dark.png`)
- Big logo: `brand/mandi247-lockup-horizontal-light.png`, `brand/mandi247-lockup-stacked-light.png`
- Icon: `logo/mandi247-logo-512.png`
- Favicons and manifest: everything in `web/` (paste `web/head-snippet.html` into `<head>`)
- Social share image: `web/og-image.png` (1200×630)
- Hero / banner art: `store/google-play-feature-graphic-1024x500.png`, `D:\mandi24x7\banners\*.jpg`
- Product photos (600×600, white background): `D:\mandi24x7\photos-fixed\`

## 3. Page sections and copy

**Header**: logo · links: How it works · For vendors · FAQ · Contact · button **Get the app**

**Hero**
- Title: **Your city's sabzi mandi, on your phone**
- Hindi line: **मंडी के सारे रेट, एक जगह**
- Subtitle: Compare tomorrow's fruit & vegetable rates from every vendor in Roorkee. Order tonight, get it fresh tomorrow.
- Buttons: **Get it on Google Play** (badge) · **For vendors →**
- Visual: phone mockup of the Rates screen + produce photos around it

**How it works** (3 steps with icons)
1. **Compare**: every evening vendors publish tomorrow's rates; see them side by side.
2. **Order tonight**: pick your shop and order before the cutoff (10 PM).
3. **Fresh tomorrow**: home delivery or pickup; pay by actual weight.

**For buyers**: lowest-price sorting · Hindi & English voice search · order from many shops at once · pay only for the weighed quantity · khata with every vendor · live order updates

**For vendors**: publish rates in minutes (copy yesterday's) · new-order chime · packing list for the mandi · weigh & bill automatically · customer khata with UPI/cash records · low commission (from 1.5%, launch offer available) → button **Open your shop** (opens the app / Play Store)

**Trust strip**: Starting in **Roorkee, Uttarakhand** · Local mandi vendors · Prices set by vendors, not by us · Your data is never sold

**Screenshots**: carousel of 4–5 app screens (rates, product compare, cart, orders, khata)

**FAQ**
- *Is there a delivery charge?* Shown in the cart before you order; set per city, free above a set amount.
- *Why can my bill change?* Produce is sold by weight; you pay for what the vendor actually weighs.
- *How do I pay?* Directly to the vendor by cash or UPI; it's recorded in your khata.
- *Which cities?* Roorkee now, more soon.
- *How do I become a vendor?* Install the app → Profile → Open a shop; we verify within a day.
- *How do I delete my account?* In the app, or see /delete-account.

**Final call to action**: "Tomorrow's rates are already live" + Play Store badge

**Footer**: logo · © 2026 Mandi 24x7, Roorkee · Privacy · Terms · Delete account · Contact · mandirke24x7@gmail.com

## 4. SEO
- `<title>`: Mandi 24x7: Roorkee mandi fruit & vegetable rates, order online
- Meta description: Compare today's mandi rates from every vegetable and fruit vendor in Roorkee. Order tonight, get fresh delivery tomorrow.
- Keywords to use in headings: mandi rate, sabzi mandi Roorkee, aaj ka bhav, vegetable rate today, fruit price Roorkee
- Open Graph image: `og-image.png`; `theme-color` `#0E6B32`
- `lang="en"`, with Hindi phrases inline (UTF-8)

## 5. Technical notes
- Plain PHP + HTML/CSS is enough; mobile-first (most visitors are on phones), page under about 1.5 MB (use WebP images, lazy-load below the fold).
- Play Store link (after approval): `https://play.google.com/store/apps/details?id=com.mandi24x7.app`; until then show "Coming soon on Google Play".
- Optional live touch: show a few of today's lowest rates from the public API later (ask the developer for an endpoint; currently rates need login).
- HTTPS on (Hostinger free SSL); redirect `www` to root.
- Fill the `[...]` placeholders in the legal pages before going live.
