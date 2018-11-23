		<section class="container-fluid bloque-carousel bloque-carousel-circulos">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-center">
				<h2 class="titulo_bloque"><span><?php print t('View Other')?></span><?php print t('collections')?></h2>
			</div>
			<ul class="owl-carousel owl-theme">
		<?php 
		foreach ($view->result as $item) {	
		?>
				<li>
					<picture>
						<div class="rounded">
							<img src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>">
						</div>
					</picture>
					<h3><?php print $item->_field_data['nid']['entity']->title?></h3>
					<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('view more')?></a>
				</li>
			<?php 
		}
			?>
		
			</ul>
		</div>
	</section>

