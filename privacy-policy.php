<?php
require_once __DIR__ . '/config.php';
$title       = 'Privacy Policy · Mandi 24x7';
$description = 'How Mandi 24x7 collects, uses and protects your personal data.';
$path        = '/privacy-policy';
$bodyClass   = 'legal-page';
require __DIR__ . '/includes/header.php';
?>
<div class="legal">
<article>
  <h1>Privacy Policy</h1>
  <p class="updated">Last updated: 9 October 2026</p>

  <p>Mandi 24x7 (“we”, “us”) runs the Mandi 24x7 mobile app and website, a marketplace where buyers compare the daily
  fruit and vegetable rates of vendors in their city, order for next-day delivery or pickup, and keep a khata (ledger)
  with each vendor. This policy explains what personal data we collect, why, and the choices you have. It is written to
  meet the Digital Personal Data Protection Act, 2023 and the Information Technology Act, 2000 of India.</p>

  <p>The service is operated by <?= fill(BUSINESS_NAME, 'registered business name') ?>, <?= fill(BUSINESS_ADDRESS, 'business address') ?>, India.</p>

  <h2>1. Data we collect</h2>
  <table>
    <tr><th>Data</th><th>Why we need it</th></tr>
    <tr><td>Mobile number</td><td>To create your account and log you in with a one-time password (OTP).</td></tr>
    <tr><td>Name (optional)</td><td>Shown to the vendors you order from, so they know who the order is for.</td></tr>
    <tr><td>City</td><td>To show you only the vendors and rates of your city.</td></tr>
    <tr><td>Delivery address</td><td>Given to the vendor of a home-delivery order so they can deliver it.</td></tr>
    <tr><td>Orders</td><td>Items, quantities, prices, charges and status, so vendors can fulfil orders and both sides have a record.</td></tr>
    <tr><td>Khata (ledger) and payments</td><td>Amounts owed and payments recorded by the vendor (cash, UPI or bank, with an optional reference), so buyer and vendor share one clear account.</td></tr>
    <tr><td>Vendor shop details</td><td>For vendors only: shop name, owner name, market, address, FSSAI number, GSTIN and UPI ID, used to verify the shop and shown to buyers where needed (for example the UPI ID for payments).</td></tr>
    <tr><td>Device notification token</td><td>To send you order and payment alerts. You can turn notifications off in your phone settings.</td></tr>
    <tr><td>Technical logs</td><td>IP address, app version and error logs, kept briefly to keep the service secure and working.</td></tr>
  </table>
  <p><strong>Voice search:</strong> when you tap the microphone, your phone’s own speech service (for example Google
  speech services on Android, or Apple speech recognition on iPhone) turns your words into text. Only the resulting text
  is used to search products. We do not record or store your voice.</p>
  <p>We do <strong>not</strong> collect your location (GPS), contacts, photos or files, and we do not show advertising.</p>

  <h2>2. How we use your data</h2>
  <ul>
    <li>To run the marketplace: log in, show rates, place and fulfil orders, keep the khata.</li>
    <li>To send service messages: OTPs, order updates, payment receipts and reminders.</li>
    <li>To support you and resolve disputes between buyers and vendors.</li>
    <li>To keep the service safe, prevent fraud and meet our legal obligations.</li>
    <li>To understand usage in aggregate (for example the number of orders per day) and improve the service.</li>
  </ul>

  <h2>3. Who we share it with</h2>
  <ul>
    <li><strong>Vendors you order from</strong> see your name, mobile number, delivery address, orders and khata with them.</li>
    <li><strong>Buyers</strong> see a vendor’s shop name, market, rates and UPI ID.</li>
    <li><strong>Service providers</strong> who process data for us: our cloud server host in India, an SMS provider
      for OTPs, and push-notification services (Expo, Google Firebase Cloud Messaging and Apple Push Notification service).</li>
    <li><strong>Authorities</strong>, when the law requires it.</li>
  </ul>
  <p>We never sell your personal data.</p>

  <h2>4. How long we keep it</h2>
  <p>We keep your account data while your account is active. When you delete your account (see
  <a href="/delete-account">Delete account</a>), we erase your name, mobile number, addresses, vendor documents,
  notification tokens and alerts. Order and khata records are kept without your name or number, for up to 8 years, because
  the other party and Indian tax and accounting laws need them. Technical logs are deleted within 90 days.</p>

  <h2>5. Security</h2>
  <p>Data travels over encrypted connections (HTTPS) and is stored on access-controlled servers with daily backups.
  OTPs expire after 5 minutes and are stored only in hashed form.</p>

  <h2>6. Your rights</h2>
  <p>You can see and correct your name and city in the app, and delete your account from the app at any time
  (<em>Profile → Delete my account</em>, or for vendors <em>Shop → Delete my account</em>). You can also ask us for a
  summary of your data, a correction, or deletion by writing to us. We reply within 30 days.</p>

  <h2>7. Children</h2>
  <p>Mandi 24x7 is meant for people aged 18 and over. We do not knowingly collect data from children.</p>

  <h2>8. Changes</h2>
  <p>If we change this policy we will update the date above and, for important changes, tell you in the app.</p>

  <h2>9. Contact and grievance officer</h2>
  <p>Grievance Officer: <?= fill(GRIEVANCE_OFFICER, 'name') ?><br>
  Email: <a href="mailto:mandirke24x7@gmail.com">mandirke24x7@gmail.com</a><br>
  Address: <?= fill(BUSINESS_ADDRESS, 'business address') ?></p>
</article>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
