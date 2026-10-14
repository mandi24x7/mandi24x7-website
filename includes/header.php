<?php
/*
 * Shared <head> and site header. Set these before including:
 *   $title        page <title>
 *   $description  meta description
 *   $path         canonical path, e.g. '/' or '/privacy-policy'
 *   $bodyClass    optional class on <body>
 *   $headExtra    optional extra markup for <head> (e.g. JSON-LD)
 */
require_once __DIR__ . '/../config.php';

$title       = $title ?? SITE_NAME;
$description = $description ?? '';
$path        = $path ?? '/';
$canonical   = SITE_URL . $path;
$ogImage     = SITE_URL . '/assets/og-image.png';
$cssVersion  = @filemtime(__DIR__ . '/../style.css') ?: 1;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($title) ?></title>
  <meta name="description" content="<?= e($description) ?>">
  <link rel="canonical" href="<?= e($canonical) ?>">
  <meta name="color-scheme" content="light dark">
  <meta name="theme-color" content="#0E6B32">

  <link rel="preload" href="/assets/fonts/baloo2-latin.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="/style.css?v=<?= $cssVersion ?>">

  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/apple-touch-icon.png">
  <link rel="manifest" href="/site.webmanifest">
  <meta name="msapplication-config" content="/browserconfig.xml">

  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
  <meta property="og:locale" content="en_IN">
  <meta property="og:title" content="<?= e($title) ?>">
  <meta property="og:description" content="<?= e($description) ?>">
  <meta property="og:url" content="<?= e($canonical) ?>">
  <meta property="og:image" content="<?= e($ogImage) ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="Mandi 24x7 logo">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($title) ?>">
  <meta name="twitter:description" content="<?= e($description) ?>">
  <meta name="twitter:image" content="<?= e($ogImage) ?>">
<?= $headExtra ?? '' ?>
</head>
<body<?= !empty($bodyClass) ? ' class="' . e($bodyClass) . '"' : '' ?>>
<a class="skip" href="#main">Skip to content</a>
<header class="site-header">
  <div class="wrap bar">
    <a class="brand" href="/" aria-label="Mandi 24x7 home">
      <picture>
        <source srcset="/assets/img/logo-header-dark.webp" media="(prefers-color-scheme: dark)">
        <img src="/assets/img/logo-header-light.webp" width="160" height="48" alt="Mandi 24x7">
      </picture>
    </a>
    <nav class="nav" aria-label="Main">
      <a href="/#how">How it works</a>
      <a href="/#vendors">For vendors</a>
      <a href="/#faq">FAQ</a>
      <a href="/contact"<?= $path === '/contact' ? ' aria-current="page"' : '' ?>>Contact</a>
    </nav>
    <a class="btn btn-sm" href="<?= e(app_link()) ?>"<?= PLAY_STORE_LIVE ? ' rel="noopener"' : '' ?>>Get the app</a>
  </div>
</header>
<main id="main">
