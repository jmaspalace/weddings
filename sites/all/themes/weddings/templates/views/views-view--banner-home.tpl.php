	<?php 
	
	?>
	<section class="container-fluid flexslider bloque-slider">
		<ul class="slides">
		<?php 
		foreach ($view->result as $item) {	
		$titulo=explode(" ", $item->_field_data['nid']['entity']->title);
		$titulo_especial=$titulo[0];
		$titulo_normal="";
		for ($i=1; $i < count($titulo) ; $i++) { 
			$titulo_normal.=" ".$titulo[$i];
		}
		?>
			<li>
				<picture>
					<img alt="<?php $item->_field_data['nid']['entity']->field_imagen_desktop['und'][0]['alt'] ?>" title="<?php $item->_field_data['nid']['entity']->field_imagen_desktop['und'][0]['title'] ?>" class="img-responsive" src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_desktop['und'][0]['uri'])?>">
				</picture>	
				<article class="box_info">
					<h2><span><?php print $titulo_especial ?></span><?php print $titulo_normal ?></h2>
					<p><?php print $item->_field_data['nid']['entity']->field_descripcion['und'][0]['value']?></p>
					<?php 
					if (!empty($item->_field_data['nid']['entity']->field_boton['und'][0]['url'])) {										
					?>
					<a href="<?php print $item->_field_data['nid']['entity']->field_boton['und'][0]['url']?>" class="enlace"><?php print $item->_field_data['nid']['entity']->field_boton['und'][0]['title']?></a>
					<?php 
					}
					?>
				</article>
			</li>
			<?php 
		}
			?>
		</ul>
	 <div class="banner-mobile">
			<img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/logoBrand.png" alt="" class="logo-mobile">
			<picture>
				<img alt="" src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_mobile['und'][0]['uri'])?>" class="img-responsive img-mobile">
			</picture>
		</div> 
	</section>