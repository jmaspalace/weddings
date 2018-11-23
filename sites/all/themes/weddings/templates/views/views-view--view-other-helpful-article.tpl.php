	<section class="container-fluid bloque-article-related">
		<div class="container">
			<h2 class="titulo_bloque"><?php print t('RECENT ARTICLES')?></h2>
			<div class="row">
		<?php 
		foreach ($view->result as $item) {	
		?>
			<div class="col-md-4 col-sm-4 col-xs-12 article">
					<div class="col-md-7 col-sm-7 col-xs-12">
						<img src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>" class="img-responsive">
					</div>
					<div class="col-md-5 col-sm-5 col-xs-12">
					<h3><?php print $item->_field_data['nid']['entity']->title?></h3>
					<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('view more')?></a>
					</div>
				</div>				
			<?php 
		}
			?>
		
			</div>
		</div>
	</section>

