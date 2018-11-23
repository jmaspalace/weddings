	<?php 
	$item=$view->result[0];	
	$titulo=explode(" ",$item->_field_data['nid']['entity']->field_descripcion['und'][0]['value']);
	$titulo_especial="";
	$titulo_normal="";
	for ($i=0; $i < count($titulo); $i++) { 
		if ($i<=1) {
			$titulo_especial.=" ".$titulo[$i];
		}else{
			$titulo_normal.=" ".$titulo[$i];
		}
	}

	?>
	
	<section class="container-fluid bloque-img-background no-margin" style="background-image: url(<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>);">
		<img class="img-background" src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>">
		<div class="content-info">
			<h2 class="titulo_bloque"><span><?php print $titulo_especial ?></span><?php print $titulo_normal ?></h2>
				<p><?php print $item->_field_data['nid']['entity']->field_listado['und'][0]['value'] ?></p>
				<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('VIEW MORE')?></a>
		</div>
	</section>