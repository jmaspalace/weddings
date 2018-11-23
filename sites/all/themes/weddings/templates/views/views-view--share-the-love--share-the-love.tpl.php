<?php
$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:url',
		'content' => 'http://weddings.palaceresorts.com/en/share-the-love',
	),
);
drupal_add_html_head($element, 'og_url');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:type',
		'content' => 'website',
	),
);
drupal_add_html_head($element, 'og_type');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:title',
		'content' => 'Share the Love',
	),
);
drupal_add_html_head($element, 'og_title');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:description',
		'content' => 'Hey! I just referred you to take a look at your dream wedding LEARN MORE',
	),
);
drupal_add_html_head($element, 'og_description');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:image',
		'content' => 'https://weddings.palaceresorts.com/sites/all/themes/weddings/img/Offers/hare_the_love/FB.jpg',
	),
);
drupal_add_html_head($element, 'og_image');

?>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


  <link rel="stylesheet" href="<?= base_path().drupal_get_path('theme', 'weddings') ?>/css/Offers/hare_the_love/main.css">

   <section class="lp-offers">
    <section class="banner">
        <img class="bannerdesktop" src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/Offers/hare_the_love/Banner.jpg" alt="">
        <img class="bannermobile"src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/Offers/hare_the_love/BannerMobile.jpg" alt="">
    </section>
    <section class="content-info">
       <div class="container">
       <div class="info-text">
        <h2><span>give a little love and</span>receive So Much In Return!</h2>
        <p>Are you a former Palace Resorts bride? When you refer a bride-to-be to have their dream wedding at Palace Resorts, you'll get your choice of a complimentary 3-night stay or $1,000 USD toward wedding extras.
        </p>
        <p> Yes, it's actually that easy. She gets the destination wedding of her dreams, and you get a free vacation. <br>
        Or, if you're tying the knot soon at Palace Resorts, you can instead opt for $1,000 USD toward wedding extras
        of your own, such as live entertainment, professional photography, and so much more. We LOVE spoiling our brides, so give a little and get a whole lot in return with the Share the Love referral program.</p>
        <h2>How It Works<span>what’s the next step?</span></h2>
        <ul>
            <li>
                <label for="Step1">Step 1:</label> Click 'Copy Link' and paste it into your preferred platform (email, text message, Facebook, etc.) and invite your referred bride to fill out the form or introduce the couple to your preferred travel agent.

                <div class="copy_text">
                    <input type="text" readonly id="TextCopy" name="TextCopy" value="https://weddings.palaceresorts.com/en/take-next-step">
                    <button onclick="clipBoard()" onmouseout="overFun()">Copy Link <span class="tooltiptext" id="Tooltip">Copy to clipboard</span></button>
                </div>
            </li>
            <li><label for="Step2">Step 2:</label> Once she fills out the form, one of our talented wedding planners will contact her to help her with the booking process. </li>
            <li><label for="Step3">Step 3:</label> Once the referred wedding is booked, we will contact you with your reward of a complimentary 3-night stay or $1,000 USD toward your own wedding extras!</li>
        </ul>

       </div>
       <p class="terms"> <span>Terms & Conditions:</span>
        Referrer is eligible for $1,000 credit toward wedding extras OR a complimentary 3-night double occupancy stay upon wedding confirmation of referral. $1,000 credit cannot be reimbursed for cash. For complimentary 3-night stays, a $10 USD per person, per night fee for taxes and gratuities applies. In the case a referral wedding is cancelled, $1,000 credit or complimentary stay will no longer be valid. Maximum of three (3) referrals per wedding. Referral period begins when the referrer’s wedding is confirmed and expires 6 months after wedding date. Earned complimentary nights are valid for one (1) year after check-out date of referrer. Only applicable to wedding groups with a minimum of 10 rooms. Applies to all Palace Resorts and Le Blanc Spa Resort properties with restrictions on usage. If referring wedding took place at The Grand at Moon Palace Cancun, offer applies to The Grand at Moon Palace Cancun, Moon Palace Cancun, Moon Palace Jamaica, Beach Palace, Sun Palace, Isla Mujeres Palace, Playacar Palace, and Cozumel Palace. If referring wedding took place at a Le Blanc Spa Resort property, offer applies to Le Blanc Spa Resort Cancun, Le Blanc Spa Resort Los Cabos, The Grand at Moon Palace Cancun, Moon Palace Cancun, Moon Palace Jamaica, Beach Palace, Sun Palace, Isla Mujeres Palace, Playacar Palace, and Cozumel Palace. Contact Palace Resorts Weddings to learn more information about resort restrictions and/or usage. Limited to one (1) gift certificate use per booking. Not combinable with any other gift certificates. Blackout dates apply. Subject to availability. Not combinable with any other promotions, including Resort Credit. Promotion may be cancelled at any time without notice. Other terms and conditions may apply. </p>

       </div>

    </section>
</section>
<script>
function clipBoard() {
  var copyText = document.getElementById("TextCopy");
  copyText.select();
  document.execCommand("copy");

  var tooltip = document.getElementById("Tooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}
function overFun() {
  var tooltip = document.getElementById("Tooltip");
  tooltip.innerHTML = "Copy Link";
}
</script>
