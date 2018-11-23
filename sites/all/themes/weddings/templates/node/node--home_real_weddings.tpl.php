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

	<section class="container-fluid bloque-intro">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2><?php print $node->field_titulo['und'][0]['value']?></h2>
				<div class="separador"></div>
				<p><?php print $node->body['und'][0]['value']?></p>
			</div>
		</div>
	</section>

	<section class="container-fluid bloque-carousel-two bloque-photo-gallery">
		<div class="container">
			<div class="col-md-4 col-sm-4 col-xs-12 info-icon">
				<?php 
				$titulo=explode(" ", $node->field_titulo_corto['und'][0]['value']);				
				$titulo_especial=$titulo[0];
				$titulo_normal="";
				for ($i=1; $i < count($titulo) ; $i++) { 
					$titulo_normal.=" ".$titulo[$i];
				}
				?>
			<h2 class="titulo_bloque"><?php print $titulo_especial ?><span> <?php print $titulo_normal ?></span></h2>
				<p><?php print $node->field_descripcion_corta['und'][0]['value'] ?></p>
				<a class="enlace" href="<?php print $node->field_boton['und'][0]['url'] ?>"><?php print $node->field_boton['und'][0]['title'] ?></a>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12 info-carousel">
				<ul class="owl-carousel owl-theme">
					<?php 
					foreach ($node->field_imagen_galeria['und'] as $imagen) {
					?>
					<li>
						<img src="<?php print file_create_url($imagen['uri']) ?>">
					</li>

					<?php
					}
					?>
					
				</ul>
			</div>
		</div>
	</section>

	<section class="container-fluid bloque-frase">
		<div class="container">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
				<div class="col-md-8 col-sm-8 col-xs-12">
					<?php 
				$titulo=explode(" ", $node->field_booking_link['und'][0]['value']);				
				?>
					<h2 class="text-center frase"><?php print $titulo[0]?> <span><?php print $titulo[1]?></span><br> <?php print $titulo[2]." ".$titulo[3]?> <br> <?php print $titulo[4]." ".$titulo[5] ?></h2>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<h2 class="titulo_bloque"><?php print $node->field_precios['und'][0]['value'] ?></h2>	
					<P><?php print $node->field_descripcion_home['und'][0]['value'] ?></P>
					<a class="enlace" href="<?php print $node->field_destino_boton['und'][0]['url'] ?>"><?php print $node->field_destino_boton['und'][0]['title'] ?></a>
				</div>
			</div>
		</div>
	</section>


		<section class="container-fluid bloque-content2 right">
		<div class="col-md-6 col-sm-6 col-xs-12 content-slider">
			<div class="container-video">
				<iframe src="<?php print $node->field_url_interna['und'][0]['value']  ?>"></iframe>
			</div>
		</div>
		<div class="col-md-5 col-sm-6 col-xs-12 content-bloque marginTop">
			<h2 class="titulo_bloque"><?php print $node->field_descripcion['und'][0]['value']  ?></h2>
			<p><?php print $node->field_lugares['und'][0]['value']  ?></p>
			<a class="enlace" href="<?php print $node->field_boton_video['und'][0]['url'] ?>"><?php print $node->field_boton_video['und'][0]['title'] ?></a>
		</div>
	</section>
	