	<?php 
	global $language;
	$home="/".$language->language;  
	?>
<h1 class="hidden"><?php print $node->title?></h1>
	<section class="bloque-banner container-fluid">
		<a href=""><img src="/<?php print drupal_get_path('theme','weddings')?>/img/logoBrand.png" alt="" class="logo-mobile"></a>
		<picture>
			<source srcset="<?php print file_create_url($node->field_imagen_mobile['und'][0]['uri'])?>" media="(max-width: 767px)">
			<source srcset="<?php print file_create_url($node->field_imagen_desktop['und'][0]['uri'])?>">
			<img srcset="<?php print file_create_url($node->field_imagen_desktop['und'][0]['uri'])?>">
		</picture>
	</section>

	<section class="container-fluid bloque-breadcrumb">
		<div class="container">
			<ul>
				<li><a href="<?php print $home ?>"><?php print t('Home') ?></a></li>
				<li><a href="<?php print url( 'node/'.$node->nid, array('absolute' => true)); ?>"><?php print $node->title ?></a></li>
			</ul>
		</div>
	</section>


	<section class="container-fluid bloque-dream no-margin">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 content-info">
					<img src="<?php print  file_create_url($node->field_image['und'][0]['uri']) ?>" class="title-dream img-responsive">
					<p><?php print $node->field_descripcion_home['und'][0]['value'] ?></p>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<img src="<?php print  file_create_url($node->field_imagen_view['und'][0]['uri']) ?>" class="img-responsive">
				</div>
			</div>
			<div class="row row2">
				<?php 
				foreach ($node->field_imagenes['und'] as $imagen) {
					?>
					<div class="col-md-4 col-sm-4 col-xs-12">
					<img src="<?php print file_create_url($imagen['uri'])?>" class="img-responsive">
					</div>

					<?php
				}
				?>				
			</div>
		</div>
	</section>

	<section class="container-fluid bloque-moon no-margin">
		<img src="<?php print file_create_url($node->field_other_collections_image['und'][0]['uri'])?>" class="img-background">
		<div class="container">
			<div class="col-md-6 col-sm-6 col-xs-12 content-info">
				<img src="<?php print file_create_url($node->field_imagen_home['und'][0]['uri'])?>" class="img-responsive logo-moon">
				<p><?php print $node->field_descripcion_larga['und'][0]['value'] ?></p>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 content-gallery">
				<?php 
				foreach ($node->field_imagen_galeria['und'] as $imagen) {
					?>
						<div class="col-md-6 col-sm-6 col-xs-6">
					<img src="<?php print file_create_url($imagen['uri'])?>" class="img-responsive">
						</div>				
					<?php
				}
				?>			
			
				
			</div>
		</div>
	</section>

	<section class="container-fluid bloque-content2 null-margin">
		<div class="col-md-6 col-sm-6 col-xs-12 content-slider">
			<img src="<?php print file_create_url($node->field_imagen['und'][0]['uri'])?>" class="img-responsive">
		</div>
		<div class="col-md-5 col-sm-6 col-xs-12 content-bloque marginTop">
			<p><?php print $node->field_description['und'][0]['value'] ?></p>
			<?php 
			if (!empty($node->field_boton['und'])) {				
			?>
			<a href="<?php print $node->field_boton['und'][0]['url'] ?>" class="enlace"><?php print $node->field_boton['und'][0]['title'] ?></a>
			<?php 
			}
			?>
		</div>
	</section>



	