	<?php 
	$item=$view->result[0];	
	$titulo=explode(' ',$item->_field_data['nid']['entity']->field_titulo['und'][0]['value']);
	$titulo_especial=$titulo[0]." ".$titulo[1];
	$titulo_normal="";
		for ($i=2; $i < count($titulo) ; $i++) { 
			$titulo_normal.=" ".$titulo[$i];
		}
	?>
	
	<section class="container-fluid bloque-content3 right">
		<div class="col-md-6 col-sm-6 col-xs-12 content-img" style="background-image: url(<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen['und'][0]['uri'])?>);">
			<img class="img-background" src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen['und'][0]['uri'])?>">
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 content-info">
			<div class="box">
				<h2 class="titulo_bloque"><span><?php print $titulo_especial ?></span> <?php print $titulo_normal ?></h2>
				<p><?php print $item->_field_data['nid']['entity']->field_descripcion_larga['und'][0]['value'] ?></p>
				<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('VIEW MORE')?></a>
			</div>
		</div>
	</section>