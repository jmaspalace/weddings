	<?php 
	$item=$view->result[0];	
	?>
	<section class="container-fluid bloque-boxes no-margin background_center">
		<div class="boxes-images">
			<?php 
			foreach ($item->_field_data['nid']['entity']->field_imagenes['und'] as $imagen ) {			
			?>
			<div class="col-md-4 col-sm-4 col-xs-12 content-img" style="background-image: url(<?php print file_create_url($imagen['uri'])?>);">
					<img src="<?php print file_create_url($imagen['uri'])?>" class="img-background">
			</div>
			<?php 
			}
			?>
		
		</div>
		<div class="content-info">
			<h2 class="titulo_bloque"><?php print $item->_field_data['nid']['entity']->field_titulo['und'][0]['value']    ?></h2>
			<p><?php print $item->_field_data['nid']['entity']->field_descripcion_larga['und'][0]['value'] ?></p>
				<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('VIEW MORE')?></a>
		</div>
	</section>