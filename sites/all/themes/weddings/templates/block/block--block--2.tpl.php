		<section class="container-fluid header-footer hidden-xs">
			<div class="container">
				<div class="col-md-12 col-xs-12">
					<div class="newsletter">

                        <?php
						global $language;
						if ($language->language=="en")
						{
                            $block = module_invoke('webform', 'block_view', 'client-block-131');
                        }
                        else
                        {
                            $block = module_invoke('webform', 'block_view', 'client-block-293');
                        }
						print render($block['content']);
                        ?>

                        <!--
                        <p id="suscribe-title"><?php print t('Subscribe to our Newsletter:') ?></p>
                        <form action="/send/newsletter" method="POST" id="newsletter-form-1">
							<input class="control-label" id="email_news" data-parsley-required-message="<?php print t('email is required.') ?>" data-parsley-errors-container="#error_form1" type="email"  required="required" name="email_newsletter">
							<span><?php print t('Please read & understand our Terms & Conditions')?></span>
							<label for="terms_conditions">
								<input data-parsley-errors-container="#error_form1" data-parsley-required-message="<?php print t('terms & conditions field is required.') ?>" required="required" type="checkbox" name="terms_conditions" id="terms_conditions"><?php print t('I accept & understand <a href="https://www.palaceresorts.com/en/terms" target="_blank">terms & conditions</a>')?>
							</label>
							<span><?php print t('Click the boxes below if you wish to receive offers and other communications from Palace Resorts.')?></span>
							<label for="sign_me_up">
								<input data-parsley-errors-container="#error_form1" data-parsley-required-message="<?php print t('sign me up field is required.') ?>" required="required" type="checkbox" name="sign_me_up" id="sign_me_up"><?php print t('Yes, I love getting deals! Sign me up!')?>
							</label>
							<input type="submit" value="<?php print t('SEND')?>">
							<span id="error_form1"> </span>
						</form>
						-->
							
                        <span id="respuesta" style="display: none;"><?php print  t('Thank you, your submission has been received.')?>
                            <button><?php print  t('Back')?></button>
                        </span>
					</div>
				</div>
			</div>
		</section>
		<section class="container-fluid bloque_search hidden-lg hidden-md hidden-sm">
			<form  action="/send/newsletter" method="POST" class="search_form" id="buscadorSiteMob">
				<input id="parametro_search_mob" data-parsley-required-message="<?php print t('email is required.') ?>" type="text" required="required" >
				<span><?php print t('Please read & understand our Terms & Conditions')?></span>
				<label for="terms_conditions">
					<input data-parsley-errors-container="#error_form1" data-parsley-required-message="<?php print t('terms & conditions field is required.') ?>" required="required" type="checkbox" name="terms_conditions" id="terms_conditions"><?php print t('I accept & understand <a href="privacy-users">terms & conditions</a>')?>
				</label>
				<span><?php print t('Click the boxes below if you wish to receive offers and other communications from Palace Resorts.')?></span>
				<label for="sign_me_up">
					<input data-parsley-errors-container="#error_form1" data-parsley-required-message="<?php print t('sign me up field is required.') ?>" required="required" type="checkbox" name="sign_me_up" id="sign_me_up"><?php print t('Yes, I love getting deals! Sign me up!')?>
				</label>
				<input type="submit" value="">
			</form>
		</section>
		<script type="text/javascript">
          jQuery('#buscadorSiteMob').submit(function( event ) {
            var valor=jQuery('#parametro_search_mob').val();
            window.location.href = '/search/node/'+valor;
            event.preventDefault();
          });

        </script>
