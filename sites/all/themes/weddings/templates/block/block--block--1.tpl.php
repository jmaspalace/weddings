		<section class="container-fluid body-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-12">
						<img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/logo.png" title="" alt="" class="logo-footer">
						<ul class="social-media">
							<li><a target="_blank" href="<?php print variable_get('url-instagram') ?>"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-instagram.png"></a></li>
							<li><a target="_blank" href="<?php print variable_get('url-pinterest') ?>"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-pinterest.png"></a></li>
							<li><a target="_blank" href="<?php print variable_get('url-facebook') ?>"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-facebook.png"></a></li>
							<li><a target="_blank" href="<?php print variable_get('url-youtube') ?>"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-youtube.png"></a></li>
							<li><a target="_blank" href="<?php print variable_get('url-twitter') ?>"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-twitter.png"></a></li>
						</ul>
					</div>
					<div class="hidden-lg hidden-md hidden-sm col-xs-12">
						<div class="newsletter-mobile">
							<p id="suscribe-title2"><?php print t('Subscribe to our Newsletter:') ?></p>
							<form id="newsletter-form-2" action="/send/newsletter" method="POST" >
								<input data-parsley-errors-container="#error_form2" data-parsley-required-message="<?php print t('email is required.') ?>" type="email" required="required"  name="email_newsletter">
								<span><?php print t('Please read & understand our Terms & Conditions')?></span>
								<label for="terms_conditions">
									<input data-parsley-errors-container="#error_form1" data-parsley-required-message="<?php print t('terms & conditions field is required.') ?>" required="required" type="checkbox" name="terms_conditions" id="terms_conditions"><?php print t('I accept & understand <a href="https://www.palaceresorts.com/en/terms" target="_blank">terms & conditions</a>')?>
								</label>
								<span><?php print t('Click the boxes below if you wish to receive offers and other communications from Palace Resorts.')?></span>
								<label for="sign_me_up">
									<input data-parsley-errors-container="#error_form1" data-parsley-required-message="<?php print t('sign me up field is required.') ?>" required="required" type="checkbox" name="sign_me_up" id="sign_me_up"><?php print t('Yes, I love getting deals! Sign me up!')?>
								</label>
								<input type="submit" value="Send">
								<span id="error_form2"> </span>
							</form>
                            <span id="respuesta2" style="display: none;"><?php print  t('Thank you, your submission has been received.')?></span>
						</div>
					</div>
					<?php 
					global $language;
					  if ($language->language=="en") {
            $menu = menu_tree_all_data( "menu-footer-english");
          }else{
            $menu = menu_tree_all_data( "menu-menu-footer-spanish");
          }     
					
          $i=0;
          foreach( $menu as $menu1 ){             
            $child = $menu1[ "link" ];   
            if (!empty($menu1['below'])){

            if (count($menu1['below'])<=5) {
            	$columnas_padre="col-md-3 col-sm-3 col-xs-12 hidden-xs";    
            	$ul_hijo='';        	
            }else{
            	$columnas_padre="col-md-3 col-sm-3 col-xs-12 hidden-xs";
            	$ul_hijo='class="our-resorts"';       	
            }
            
            	
            }
            
            ?>
            <div class="<?php print $columnas_padre ?>">
						<h5><?php print $child['link_title'] ?></h5>	
						<ul <?php print $ul_hijo ?> >
							<?php 
							foreach ($menu1['below'] as $submenu) {
								   $child = $submenu[ "link" ];   
								?>
								<li>
									<a href="<?php print $child['href'] ?>">
										<?php print $child['link_title'] ?>
									</a>
								</li>

								<?php
							}
							?>
							
						</ul>
			</div>
            <?php
            $i++;
        	}
			?>
					<div class="col-md-12 col-xs-12">
						<?php 
						print $content;
						?>
					</div>
				</div>
			</div>
		</section>
