<?php
require_once __DIR__ . '/config.php';
http_response_code(404);
$title       = 'Page not found · Mandi 24x7';
$description = 'This page does not exist.';
$path        = '/';
$bodyClass   = 'legal-page';
$headExtra   = '  <meta name="robots" content="noindex">' . "\n";
require __DIR__ . '/includes/header.php';
?>
<div class="legal">
<article>
  <h1>Page not found</h1>
  <p>Sorry, this page doesn’t exist. Try the <a href="/">home page</a>, or see our
  <a href="/privacy-policy">Privacy Policy</a>, <a href="/terms">Terms</a> or <a href="/contact">Contact</a> page.</p>
</article>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
