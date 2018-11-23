<section class="preview_your_dream">
    <section class="banner">
        <img src="<?= base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/Banner.jpg" alt="">
    </section>
    <section class="section-win">
        <img class="title" src="<?= base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/text-how-to-win.png" alt="">
        <h2 class="subtitle">Your dream wedding can’t compare to any other.</h2>
		<div class="container">
			 <section class="steps">
				<ul>
					<li>
						<article>
								<div class="image-container">
									<picture>
										<img src="<?=base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/Imagestep1.jpg" alt="step 1">
									</picture>

									<i class="icon"><img src="<?=base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/icon-step1.png" alt=""></i>
								</div>
								<p><span>1</span> Create a video on Youtube <br> about how you imagine <br> your dream wedding at <br> Palace Resorts. <br> (máx. 30 sec)</p>

						</article>
					</li>
					<li>
					   <article>
							<div class="image-container">
								<picture>
									<img src="<?=base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/Imagestep2.jpg" alt="step 1">
								</picture>

								<i class="icon"><img src="<?=base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/icon-step2.png" alt=""></i>
							</div>
							<p><span>2</span> Pick your dream location from our gallery and start imagining. <br> Don’t forget to tell us a bit of your love story. <br>[The best dream wed + love story will be the winner]</p>
						</article>
					</li>
					<li>
					  <article>
							<div class="image-container">
								<picture>
									<img src="<?=base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/Imagestep3.jpg" alt="step 1">
								</picture>

								<i class="icon"><img src="<?=base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/icon-step3.png" alt=""></i>
							</div>
							<p><span>3</span> Register your details and share <br> the URL to the video in the  <br> form below.</p>
						</article>
					</li>
					<li>
					  <article>
							<div class="image-container">
								<picture>
									<img src="<?=base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/Imagestep4.jpg" alt="step 1">
								</picture>

								<i class="icon"><img src="<?=base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/icon-step4.png" alt=""></i>
							</div>
							<p><span>4</span> That’s it. Wait for us to <br> announce the winner.</p>
						</article>
					</li>
				</ul>

			</section>
		</div>

    </section>
    <section class="banner-complete">
    	<img src="<?=base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/Banner-image.jpg" alt="">

    		<div class="content-inf">
				<img src="<?=base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/titlebanner.png" alt="">
				<p>A free two-night stay at Palace Resorts. <br>
				To walk the venues, taste the menu, see the setting and preview <br>
				your wedding before you even plan it.</p>
			</div>


    </section>
    <section class="gallery">
        <img class="title" src="<?= base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/ourpalace.png" alt="Our Palace">
        <h2 class="subtitle">Pick a magical venue and start dreaming</h2>
        <div class="container">
        <ul class="items">
        	<?php if ($images !== FALSE): ?>
				<?php foreach ($images as $key => $value): ?>
					<?php $image = file_load($value->id_img); ?>
                    <?php if ($image !== FALSE): ?>
                        <?php $img_url = $image->uri; ?>
                        <div class="item">
                            <img src="<?= file_create_url($img_url); ?>" alt="" class="img-responsive">
                        </div>
                    <?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
        </ul>

		</div>
    </section>

    <section class="form">
        <?php
        $block_form = module_invoke('way_you_imagined', 'block_view', 'form_the_way_you_imagined');
        print render($block_form['content']);
        ?>
    </section>

    <section class="youDont">
    	<img src="<?= base_path().drupal_get_path('module', 'way_you_imagined') ?>/img/icon-married.png" alt="">
    	<h2>
    		<span>You don't need be engaged to win, but you could be.</span>
    	</h2>
    </section>
</section>
