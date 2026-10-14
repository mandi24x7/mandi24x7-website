<?php
/* Shared site footer. Closes the <main> opened in header.php. */
?>
</main>
<footer class="site-footer">
  <div class="wrap foot">
    <a class="brand" href="/" aria-label="Mandi 24x7 home">
      <picture>
        <source srcset="/assets/img/logo-header-dark.webp" media="(prefers-color-scheme: dark)">
        <img src="/assets/img/logo-header-light.webp" width="160" height="48" alt="Mandi 24x7" loading="lazy">
      </picture>
    </a>
    <nav class="foot-links" aria-label="Legal">
      <a href="/privacy-policy">Privacy</a>
      <a href="/terms">Terms</a>
      <a href="/delete-account">Delete account</a>
      <a href="/contact">Contact</a>
      <a href="mailto:<?= e(SUPPORT_EMAIL) ?>"><?= e(SUPPORT_EMAIL) ?></a>
    </nav>
    <p class="copy">© <?= date('Y') ?> Mandi 24x7, <?= e(CITY) ?></p>
  </div>
</footer>
<?= $footExtra ?? '' ?>
</body>
</html>
