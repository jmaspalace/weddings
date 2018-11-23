	<?php 
	$item=$view->result[0];
	$titulo=explode(" ", $item->_field_data['nid']['entity']->field_titulo_corto['und'][0]['value']);
	$titulo_estilo=$titulo[0];
	$titulo_normal="";

	for ($i=1; $i < count($titulo) ; $i++) { 
		$titulo_normal.=" ".$titulo[$i];
	}

	?>
	<section class="container-fluid bloque-content3 background_center">
		<div class="col-md-6 col-sm-6 col-xs-12 content-img" style="background-image: url(<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>);">
			<img class="img-background" src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>">
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 content-info">
			<div class="box">
				<h2 class="titulo_bloque"><span><?php print $titulo_estilo ?></span> <?php print $titulo_normal ?></h2>
				<p><?php print $item->_field_data['nid']['entity']->field_descripcion_home['und'][0]['value']  ?></p>
				<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('view more')?></a>
			</div>
		</div>
	</section>

	