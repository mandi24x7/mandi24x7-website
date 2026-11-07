<?php
require_once __DIR__ . '/config.php';
$title       = 'Terms of Use · Mandi 24x7';
$description = 'Terms for using the Mandi 24x7 marketplace app.';
$path        = '/terms';
$bodyClass   = 'legal-page';
require __DIR__ . '/includes/header.php';
?>
<div class="legal">
<article>
  <h1>Terms of Use</h1>
  <p class="updated">Last updated: 5 November 2026</p>

  <p>These terms apply when you use the Mandi 24x7 app or website (the “service”), operated by
  <?= fill(BUSINESS_NAME, 'registered business name') ?> (“we”, “us”). By creating an account you agree to them.</p>

  <h2>1. What Mandi 24x7 is</h2>
  <p>Mandi 24x7 is a marketplace. Independent vendors publish their own daily fruit and vegetable rates; buyers compare
  them and order from the vendor they choose. <strong>The vendor sells the goods</strong>, sets the price, and is
  responsible for their quality, weight, packing and delivery or pickup. We provide the app and the order system.</p>

  <h2>2. Accounts</h2>
  <ul>
    <li>You must be 18 or older and use your own mobile number.</li>
    <li>Keep your phone and OTPs private; you are responsible for activity on your account.</li>
    <li>Give true information. Vendors must give a correct shop name, address and, where they have them, FSSAI number and GSTIN.</li>
  </ul>

  <h2>3. Orders, prices and billing</h2>
  <ul>
    <li>Rates are for delivery on the date shown in the app. Orders placed before the city’s cutoff time are delivered
      on that date.</li>
    <li>Fresh produce is sold by weight. The vendor weighs your items and your bill is based on the
      <strong>final weighed quantity</strong>, so it may differ slightly from the estimate. If an item is not available
      the vendor may supply less or none of it, and you are not charged for what you do not receive.</li>
    <li>Delivery charges and other charges (for example a rain or small-order fee) are shown in the cart before you order.</li>
    <li>A vendor may accept or reject an order. You can cancel an order in the app until the cutoff time for its delivery date.</li>
    <li>Each order shows a 4-digit delivery code in the app. Give it to the vendor only after you have your order. It records that the order reached you.</li>
  </ul>

  <h2>3A. Checking items, returns and problems</h2>
  <ul>
    <li>Please check your items when you get them, before you pay. If an item is bad or short, hand it back right there and the vendor removes it from your bill.</li>
    <li>Because fresh produce spoils quickly, items are not picked up for return after you have accepted them.</li>
    <li>If something is wrong after that, or you did not get your order, use “Report a problem” on the order in the app within 24 hours, with a photo if you can. The vendor and Mandi 24x7 will see it. The vendor replaces the items or refunds you directly. Nothing in these terms takes away your rights under consumer law.</li>
  </ul>

  <h2>4. Payments</h2>
  <ul>
    <li>You pay the vendor directly in cash when your order is delivered or when you pick it up (cash on delivery). Mandi 24x7 does not collect or hold your money.</li>
    <li>Mandi 24x7 does not offer credit (udhaar) through the app.</li>
    <li>Where a cashback reward is offered, it is a promotional reward funded by Mandi 24x7 and given after an order is delivered. It can only be used against later orders in the app and expires on the date shown in the app. It has no cash value: it cannot be bought or topped up, withdrawn, exchanged for cash or transferred to anyone. Unused rewards end if you delete your account. Mandi 24x7 may change or end the offer at any time; orders already placed keep the reward promised when they were placed.</li>
  </ul>

  <h2>5. Vendors</h2>
  <ul>
    <li>Vendors must keep their rates and stock honest, hold the licences their business needs, and follow food-safety and weights-and-measures laws.</li>
    <li>Mandi 24x7 charges vendors a commission (and applicable GST) on delivered orders, at the rate shown in the vendor
      app. Vendors settle it with us weekly or monthly.</li>
    <li>When a customer uses a cashback reward, the vendor collects that much less cash and Mandi 24x7 covers the amount: it is set off against the commission due, and we pay the vendor any amount above that.</li>
    <li>We may verify, suspend or remove a shop that breaks these terms or gets repeated genuine complaints.</li>
  </ul>

  <h2>6. Acceptable use</h2>
  <p>Do not misuse the service: no false orders, fake rates, abuse of other users, attempts to break or overload the
  service, or use for anything unlawful.</p>
  <p>To protect vendors from false orders, new customers have an order limit until their first delivery. If a vendor reports that an order could not be handed over (for example you were not home or you refused it), that counts against your account for 30 days. Repeated cases can limit you to pickup from the shop, and we may block an account that keeps doing this. If a report is wrong, use “Report a problem” within 24 hours and we will review it.</p>

  <h2>7. Our responsibility</h2>
  <p>We work to keep the service running and the information accurate, but it is provided “as is”. Disputes about the
  quality, quantity or price of goods are between the buyer and the vendor; we will help both sides using the order
  records. To the extent the law allows, our liability for any claim is limited to the commission we earned on
  the order concerned.</p>

  <h2>8. Ending your account</h2>
  <p>You can delete your account at any time from the app (see <a href="/delete-account">Delete account</a>). We may
  suspend accounts that break these terms.</p>

  <h2>9. Changes and law</h2>
  <p>We may update these terms; we will show the new date above and tell you in the app about important changes. These
  terms are governed by the laws of India, and courts at <?= fill(COURT_CITY, 'Haridwar / Roorkee') ?>, Uttarakhand have jurisdiction.</p>

  <h2>10. Contact</h2>
  <p>Email <a href="mailto:mandirke24x7@gmail.com">mandirke24x7@gmail.com</a>.</p>
</article>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
