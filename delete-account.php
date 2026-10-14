<?php
require_once __DIR__ . '/config.php';
$title       = 'Delete your account · Mandi 24x7';
$description = 'How to delete your Mandi 24x7 account and what happens to your data.';
$path        = '/delete-account';
$bodyClass   = 'legal-page';
require __DIR__ . '/includes/header.php';
?>
<div class="legal">
<article>
  <h1>Delete your Mandi 24x7 account</h1>
  <p class="updated">App: Mandi 24x7 (Android and iPhone)</p>

  <h2>Delete it in the app (instant)</h2>
  <ol class="steps">
    <li>Open the Mandi 24x7 app and log in.</li>
    <li>Buyers: open the <strong>Profile</strong> tab. Vendors: open the <strong>Shop</strong> tab.</li>
    <li>Scroll down and tap <strong>Delete my account</strong>, then confirm twice.</li>
  </ol>
  <p>Your account is deleted straight away. If you have orders that are not finished, cancel them or wait until they are
  delivered, then try again.</p>

  <h2>Or ask us by email</h2>
  <p>If you can’t use the app, email us from any address with the subject <strong>“Delete my account”</strong> and the
  mobile number you used. We confirm the number with you and delete the account within 7 days (at most 30).</p>
  <p><a class="btn" href="mailto:mandirke24x7@gmail.com?subject=Delete%20my%20account&amp;body=Please%20delete%20my%20Mandi%2024x7%20account.%20My%20mobile%20number%3A%20">Email a deletion request</a></p>

  <h2>What is deleted</h2>
  <ul>
    <li>Your name, mobile number and delivery addresses</li>
    <li>For vendors: owner name, shop address, FSSAI number, GSTIN and UPI ID; your shop is closed and hidden from buyers,
      and your upcoming rates are removed</li>
    <li>Notification tokens, alerts and login codes</li>
  </ul>

  <h2>What is kept, and for how long</h2>
  <div class="note">
    Past orders and khata (ledger) entries stay with the other party (the vendor or buyer) <strong>without your name or
    number</strong>, for up to 8 years, because they need them for their accounts and Indian tax and accounting laws
    require these records. Nothing else is kept.
  </div>

  <p>Questions? Write to <a href="mailto:mandirke24x7@gmail.com">mandirke24x7@gmail.com</a>. See also our
  <a href="/privacy-policy">Privacy Policy</a>.</p>
</article>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
