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
				<?php 			
				$request= $_SERVER['REQUEST_URI'];
				$libera_idioma=explode("/".$language->language."/",$request);
			        $pos = strpos($libera_idioma[1], "?");
			        if ($pos !== false) {
			          $libera_idioma=explode("?", $libera_idioma[1]);
			          $path=explode("/", $libera_idioma[0]);
			        }else{          
			        $path=explode("/", $libera_idioma[1]);
			        }
			        $path_aumentado="/".$language->language;

				foreach ($path as $item) {
					if (!empty($item)) {
						$path_aumentado.="/".$item;				
						$name=str_replace("-", " ", $item);
					?>

					<li><a href="<?php print $path_aumentado ?>"><?php print $name  ?></a></li>
					<?php
					}
				}
				?>
			</ul>
		</div>
	</section>

	<section class='bloque-tripadvisor container-fluid'>
		<div class="container">
			<div class="flexslider">
				<ul class='slider-tripadvisor slides'>
					<?php 
			foreach ($node->field_testimonios['und'] as $item) {		
				$field_collection = entity_load('field_collection_item', array($item['value']));
				foreach ($field_collection as $imagenes) {
					?>
					<li class="item_advisor">
						<div class="col-md-4 col-xs-12 info-user">
							<div class="rounded">
								<img class="img-responsive" src="<?php print file_create_url($imagenes->field_image['und'][0]['uri']) ?>" alt="">
							</div>
						</div>
						<div class="col-md-8 col-xs-12">
							<p class="item_advisor_text"><?php print $imagenes->field_descripcion_larga['und'][0]['value'] ?></p>
							<p class="item_advisor_names"><?php print $imagenes->field_descripcion['und'][0]['value'] ?></p>
						</div>
					</li>


					<?php
				}
			}
					?>						
					
				</ul>
			</div>
		</div>
	</section>

	<section class="container-fluid bloque-stories">
		<div class="container">
			<div class="row header-bloque">
				<img src="/sites/all/themes/weddings/img/logo_tripadvisor_stories.png">
				<h2 class="titulo_bloque"><?php print t('stories') ?></h2>
			</div>
			<div class="row">
				<ul class="owl-carousel owl-theme">
					<?php 
			foreach ($node->field_testimonios_tripadvisor	['und'] as $item) {		
				$field_collection = entity_load('field_collection_item', array($item['value']));
				foreach ($field_collection as $trip) {
					?>
					<li>
						<h3><?php print $trip->field_titulo['und'][0]['value'] ?></h3>
						<h2 class="titulo_bloque"><?php print $trip->field_titulo_corto['und'][0]['value'] ?></h2>
						<p class="verified"><?php print t('VERIFIED REVIEW') ?></p>
						<p><?php print $trip->field_descripcion_corta['und'][0]['value'] ?></p>
						<?php 
						if (!empty($trip->field_boton['und'][0])) {						
						?>
						<a class="enlace" target="_blank" href="<?php print $trip->field_boton['und'][0]['url'] ?>"><?php print $trip->field_boton['und'][0]['title'] ?></a>
						<?php 
						}
						?>

					</li>					
					<?php
				}
			}
					?>
					
				</ul>
			</div>
		</div>
	</section>


	<section class="container-fluid bloque-testimonials-video">
		<div class="container">
			<div class="flexslider">
				<ul class="slides">
					<?php 
			foreach ($node->field_videos_testimonios['und'] as $item) {		
				$field_collection = entity_load('field_collection_item', array($item['value']));
				foreach ($field_collection as $imagenes) {
					?>

					<li>
						<a data-fancybox="group" href="<?php print $imagenes->field_url_interna['und'][0]['value']?>">
							<div class="play"></div>
							<img src="<?php print file_create_url($imagenes->field_image['und'][0]['uri']) ?>">
						</a>
						<h2 class="titulo_bloque"><?php print $imagenes->field_titulo['und'][0]['value'] ?></h2>
						<?php 
						if (!empty($imagenes->field_titulo_corto['und'][0])) {
							?>
						<p class="date"><?php print $imagenes->field_titulo_corto['und'][0]['value']; ?></p>	
							<?php
						}
						?>
					</li>
					


					<?php
				}
			}
					?>
				
				</ul>
			</div>
		</div>
	</section>




	
	<section class="container-fluid bloque-testimonials-video">
		<div class="container">
			<div class="flexslider">
				<ul class="slides">
					<?php 
			foreach ($node->field_videos_imagen['und'] as $item) {		
				$field_collection = entity_load('field_collection_item', array($item['value']));
				foreach ($field_collection as $imagenes) {
					?>
					<li>
						<a data-fancybox="group" href="<?php print $imagenes->field_url_interna['und'][0]['value']?>">
							<div class="play"></div>
							<img src="<?php print file_create_url($imagenes->field_imagen['und'][0]['uri']) ?>">
						</a>
					</li>


					<?php
				}
			}
					?>

				
				
				
				</ul>
			</div>
		</div>
	</section>

	<section class="container-fluid bloque-stories no-margin">
		<div class="container">
			<div class="row header-bloque">
				<img src="/sites/all/themes/weddings/img/facebook-logo-preview.png">
				<h2 class="titulo_bloque"><?PHP print t('stories')  ?></h2>
			</div>
			<div class="row">
				<ul class="owl-carousel owl-theme">
					<?php 
			foreach ($node->field_testimonios_facebook['und'] as $item) {		
				$field_collection = entity_load('field_collection_item', array($item['value']));
				foreach ($field_collection as $face) {
					?>
					<li>
						<?php print $face->field_descripcion_corta['und'][0]['value'] ?>
						<a href="<?php print $face->field_link['und'][0]['value'] ?>" class="leer-mas"><?php print t('Read more')?></a>
						<img class="img-responsive" src="<?php print file_create_url($face->field_imagen['und'][0]['uri']) ?>">
					</li>									
					<?php
				}
			}
					?>
					
					
				</ul>
			</div>
		</div>
	</section>

		<section class="container-fluid bloque-local-measure">
		<div class="container">
			<h2><?php print t('happening now'); ?></h2>
			<div id="widget-6c600c1f8ff1bd48549abd20bf02e85c2bcbf7c812dbbbd7e4bfe26a1e8b" data-lmwidget="6c600c1f8ff1bd48549abd20bf02e85c2bcbf7c812dbbbd7e4bfe26a1e8b"></div>
		</div>
	</section>

		<script src="https://cdn.getlocalmeasure.com/embed/widgets.js" data-cfasync="false"></script>


			<script type="text/javascript" src="https://player.vimeo.com/api/player.js"></script>
