<section class="container-fluid bloque-carousel bloque-carousel-box">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-center">
				<h2 class="titulo_bloque"><span><?php print t('Our') ?></span><?php print t('Resorts') ?></h2>
				<?php 
				$header_item = $view->display_handler->get_option('header');
				?>
				<p><?php print t($header_item['area_text_custom']['content']);?></p>
			</div>
		</div>
		<ul class="owl-carousel owl-theme">
		<?php 
		foreach ($view->result as $item) {	
			?>
			<li>
				<div class="hover-box">
					<div class="info">
						<p><?php print $item->_field_data['nid']['entity']->title?></p>
						<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('learn more')?></a>
					</div>
				</div>
				<img class="img-responsive" src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>">
			</li>	
			
			<?php 
		}
		?>
		
	</ul>
</section>


