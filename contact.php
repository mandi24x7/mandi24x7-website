<?php
require_once __DIR__ . '/config.php';
$title       = 'Contact & support · Mandi 24x7';
$description = 'Contact Mandi 24x7 for help, vendor sign-up or complaints.';
$path        = '/contact';
$bodyClass   = 'legal-page';
require __DIR__ . '/includes/header.php';
?>
<div class="legal">
<article>
  <h1>Contact & support</h1>
  <p>We’re a small team in Roorkee and happy to help, whether you buy, sell or have a question.</p>

  <h2>Email</h2>
  <p><a href="mailto:mandirke24x7@gmail.com">mandirke24x7@gmail.com</a>. We reply within 1 working day.</p>

  <h2>Phone / WhatsApp</h2>
  <p><?= SUPPORT_PHONE !== '' ? '<a href="tel:' . e(preg_replace('/[^+0-9]/', '', SUPPORT_PHONE)) . '">' . e(SUPPORT_PHONE) . '</a>' : fill('', 'support number') ?>, 9 AM to 7 PM, Monday to Saturday</p>

  <h2>Want to sell on Mandi 24x7?</h2>
  <p>Vendors from Roorkee mandi can open a shop from the app (<em>Profile → Open a shop</em>). We call you to verify your
  shop, usually within a day.</p>

  <h2>Complaints and grievances</h2>
  <p>Grievance Officer: <?= fill(GRIEVANCE_OFFICER, 'name') ?>, <a href="mailto:mandirke24x7@gmail.com">mandirke24x7@gmail.com</a>.
  We acknowledge complaints within 24 hours and resolve them within 15 days.</p>

  <h2>Address</h2>
  <p><?= fill(BUSINESS_NAME, 'registered business name') ?><br><?= fill(BUSINESS_ADDRESS, 'business address') ?><br>Roorkee, Uttarakhand, India</p>
</article>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
