	<?php
global $language;
$home = "/" . $language->language;
$host = $_SERVER["HTTP_HOST"];
$url = "http://" . $host;
?>
<h1 class="hidden"><?php print $node->title ?></h1>
	<section class="bloque-banner container-fluid">
		<a href=""><img src="/<?php print drupal_get_path('theme', 'weddings') ?>/img/logoBrand.png" alt="" class="logo-mobile"></a>
		<picture>
			<source srcset="<?php print file_create_url($node->field_imagen_mobile['und'][0]['uri']) ?>" media="(max-width: 767px)">
			<source srcset="<?php print file_create_url($node->field_imagen_desktop['und'][0]['uri']) ?>">
			<img srcset="<?php print file_create_url($node->field_imagen_desktop['und'][0]['uri']) ?>">
		</picture>
	</section>

	<section class="container-fluid bloque-breadcrumb">
		<div class="container">
			<ul>
				<li><a href="<?php print $home ?>"><?php print t('Home') ?></a></li>
				<li><a href="<?php print url('node/' . $node->nid, array('absolute' => true)); ?>"><?php print $node->title ?></a></li>
			</ul>
		</div>
	</section>

	<section class="container-fluid bloque-intro">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2><?php print $node->field_titulo['und'][0]['value'] ?></h2>
				<div class="separador"></div>
				<?php print $node->body['und'][0]['value'] ?>
			</div>
		</div>
	</section>

<section class="container-fluid bloque-steps">
		<div class="container">

			<div class="paso1">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="text">
						<p class="number">01</p>
						<p class="description">
							<?php print t('<strong>Announce your engagement to family and friends:</strong> You’re bursting with excitement, and this a chance to let those good feelings shine. Be creative, traditional, or shout it from the mountaintops—let your friends and family know you’re getting married.') ?>
						</p>
					</div>
				</div>

				<div class="col-md-6 col-sm-6 col-xs-12 container-img">
					<img src="/sites/all/themes/weddings/img/img-step1.jpg" class="img-responsive">
				</div>
			</div>

			<div class="paso2">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="text">
							<p class="number">02</p>
							<p class="description">
								<?php print t('<strong>Plan engagement party, set date and send invitations:</strong> Whether you’re throwing your own, or someone close to the bride takes care of the details, your engagement party should be a low-pressure, fun event. To get started, set a date and draft a guest list.') ?>
							</p>
						</div>
						<img src="/sites/all/themes/weddings/img/img-step2.png" class="img-responsive">
					</div>
					<div class="fondo-gris"></div>
				</div>
			</div>

			<div class="paso3">
				<div class="col-md-6 col-sm-6 col-xs-12 container-img">
					<img src="/sites/all/themes/weddings/img/img-step3.jpg" class="img-responsive">
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="text">
						<p class="number">03</p>
						<p class="description">
							<?php print t('<strong>Set a Budget:</strong> This is the “eat your veggies” portion of wedding planning. The rest will go down as sweet as cake. Here are some crucial factors when setting a budget: Establish who will be contributing to the wedding, how much you can afford, and how many guests you plan to invite. This is how you can make your dream a reality. '); ?>
						</p>
					</div>
				</div>
			</div>

			<div class="paso4">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="text">
						<p class="number">04</p>
						<p class="description">
							<?php print t('<strong>Create a guest list:</strong> Choosing who to celebrate your special day with can be nerve-racking. There is a lot of love in your life. Don’t stress. Start your list with immediate family and friends, and then work to your outer friend and relative circles in order of importance. Tally the numbers using your budget as a guide.') ?>
							<?php if ($language->language == "en") {
							$enlaceurl = $url . "/en/wedding-check-list";
						} else {
							$enlaceurl = $url . "/es/lista-de-pendientes-para-la-boda";
						}
						?>
							<br>
							<br>
							<a href="<?php print $enlaceurl ?>"><?php print t('My check list') ?></a>
						</p>
					</div>
				</div>
				<?php
			if ($language->language == "es") {
				$img4 = "/sites/all/themes/weddings/img/img-step-4.png";
			} else {
				$img4 = "/sites/all/themes/weddings/img/img-step4.png";
			}
			?>
				<div class="col-md-6 col-sm-6 col-xs-12 container-img">
					<img src="<?php print $img4 ?>" class="img-responsive">
				</div>
			</div>

			<div class="paso5">
				<div class="col-md-12 col-sm-12 col-xs-12 container-img">
					<img src="/sites/all/themes/weddings/img/img-step5.jpg" class="img-responsive">
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="text">
							<p class="number">05</p>
							<p class="description">
								<?php print t('<strong>Choose a venue and set a date:</strong> As your good news spreads among your friends and family, two questions will inevitably pop up: When and where is the special day? Carefully consider the season and the location. Marry in bliss with a destination wedding. Find your love oasis with Palace Resorts—pick your paradise, each property has its distinct flair. Be sure to choose a first and second option. <br><br>');
							if ($language->language == "en") {
								$enlace = $url . "/en/our-resorts";
							} else {
								$enlace = $url . "/es/nuestros-resorts";
							}

							?>
								<a href="<?php print $enlace ?>"><?php print t('VIEW MORE') ?></a>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="paso6">
				<div class="col-md-6 col-sm-6 col-xs-12 container-img">
					<img src="/sites/all/themes/weddings/img/img-step6.jpg" class="img-responsive">
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="text">
						<p class="number">06</p>
						<p class="description">
							<?php print t('<strong>Choose your style:</strong> Close your eyes and picture your special day. Is it an intimately elegant wedding? Think soft, muted hues. Is it a celebration with swagger? Express your love in bold tones. Save whatever emits love vibes to your color board so we can bring your special day to life. <br><br> ');
						if ($language->language == "en") {
							$enlace = $url . "/en/collections";
						} else {
							$enlace = $url . "/es/infinitas-posibilidades";
						}

						?>
								<a href="<?php print $enlace ?>"><?php print t('VIEW MORE') ?></a>
														</p>
					</div>
				</div>
				<div class="fondo-gris"></div>
			</div>

			<div class="paso7">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="text">
						<p class="number">07</p>
						<p class="description">
							<?php print t('<strong>Get Ideas:</strong> When inspiration strikes, write it down! Gather all your ideas, daydreams, thoughts and themes and vibe into one convenient place to present to your Palace Resorts Wedding Coordinator. We’re here to help with color themes, floral motifs, videos, lighting and photography. <br><br>');
						if ($language->language == "en") {
							$enlace = $url . "/en/real-weddings";
						} else {
							$enlace = $url . "/es/bodas-palace-resorts";
						}

						?>
							<a href="<?php print $enlace ?>"><?php print t('VIEW MORE') ?></a>

						</p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 container-img">
					<img src="/sites/all/themes/weddings/img/img-step7.jpg" class="img-responsive">
				</div>
			</div>

			<div class="paso8">
				<div class="col-md-12 col-sm-12 col-xs-12 container-img">
					<img src="/sites/all/themes/weddings/img/img-step8.png" class="img-responsive">
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="text">
							<p class="number">08</p>
							<p class="description">
								<?php print t('<strong>Check for deals:</strong> Stay budget-conscious and check for ways to save on your dream wedding. <br><br>');
							if ($language->language == "en") {
								$enlace = $url . "/en/offers";
							} else {
								$enlace = $url . "/es/ofertas";
							}

							?>
							<a href="<?php print $enlace ?>"><?php print t('VIEW MORE') ?></a>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="paso9">
				<div class="col-md-6 col-sm-6 col-xs-12 container-img">
					<img src="/sites/all/themes/weddings/img/img-step9.jpg" class="img-responsive">
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="text">
						<p class="number">09</p>
						<p class="description">
							<?php print t('<strong>Contact your free wedding coordinator:</strong> We are standing by to make your fantasy come to life. Check with us for availability for your ceremony date and rooms for your party and other details. <br><br>');
						if ($language->language == "en") {
							$enlace = $url . "/en/take-next-step";
						} else {
							$enlace = $url . "/es/da-el-siguiente-paso";
						}

						?>
							<a href="<?php print $enlace ?>"><?php print t('VIEW MORE') ?></a>

						</p>
					</div>
				</div>
				<div class="fondo-gris"></div>
			</div>

			<div class="paso10">
				<div class="col-md-6 col-sm-6 col-xs-12 container-img">
					<img src="/sites/all/themes/weddings/img/img-step10.jpg" class="img-responsive">
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="text">
						<p class="number">10</p>
						<p class="description">
							<?php print t('<strong>Book your wedding:</strong> Here you are, ready to make that final planning step. Before you proceed further, ask for a contract and read it thoroughly. Don’t be afraid to ask questions. Once you’re comfortable with the contract, lock in your wedding date and the number of rooms your friends and family will require. Here’s a tip from us: select a variety of room types so your guests can choose by preference.  The more guests you have, the more benefits you will accrue.  ');
						?>
						</p>
					</div>
				</div>
			</div>

			<div class="paso11">
				<div class="col-md-12 col-sm-12 col-xs-12 container-img">
					<img src="/sites/all/themes/weddings/img/img-step11.png" class="img-responsive">
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="text">
							<p class="number">11</p>
							<p class="description">
								<?php print t('<strong>Send out Save the Date invites:</strong> Make it official by sending out reminders to your friends and family so they can reserve the dates in their calendars for your wedding.');
							?>
							</p>
						</div>
					</div>
				</div>
				<div class="fondo-gris"></div>
			</div>

			<div class="paso12">
				<div class="col-md-12 col-sm-12 col-xs-12 container-img">
					<img src="/sites/all/themes/weddings/img/img-step12.jpg" class="img-responsive">
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="text">
							<p class="number">12</p>
							<p class="description">
								<?php print t('<strong>Preview your location for free:</strong> How does paradise look? Go find out! Schedule tours with your top venues. Before you visit, make a list of wedding day essentials and sweet indulgences so you can get the most out of your tours. <br><br>');
							if ($language->language == "en") {
								$enlace = $url . "/en/offers/preview-paradise";
							} else {
								$enlace = $url . "/es/ofertas/conoce-el-paraiso";
							}

							?>
							<a href="<?php print $enlace ?>"><?php print t('VIEW MORE') ?></a>
							</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>




