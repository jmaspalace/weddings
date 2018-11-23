	<?php 
	$item=$view->result[0];
	$titulo=explode(" ", $item->_field_data['nid']['entity']->title);
	?>

	<section class="container-fluid bloque-indian-weddings">
		<div class="container-img">
			<img class="img-background" src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_home['und'][0]['uri'])?>">
		</div>
		<div class="container">
			<div class="content-info">
				<h2 class="titulo_bloque"><span><?php print $titulo[0] ?></span> <?php print $titulo[1] ?></h2>
				<?php print $item->_field_data['nid']['entity']->field_descripcion_home['und'][0]['value'] ?>
				<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('learn more')?></a>

			</div>
		</div>
	</section>
