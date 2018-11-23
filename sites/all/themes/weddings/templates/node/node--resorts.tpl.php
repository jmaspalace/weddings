	<?php 
	global $language;
	$home="/".$language->language;  
	?>
	<h1 class="hidden"><?php print $node->title?></h1>
	<section class="container-fluid flexslider bloque-slider bloque-slider-banner">

		<ul class="slides">
			<?php 
			foreach ($node->field_video_url['und'] as $video) {
				?>
				<li>
					<div class="container-video">
						<iframe src="<?php print $video['value']?>"></iframe>
					</div>
				</li>
				<?php
			}
			?>

			<?php 
			foreach ($node->field_imagenes['und'] as $imagen) {
				?>
				<li>
					<picture>
						<img alt="" class="img-responsive" src="<?php print file_create_url($imagen['uri'])?>">
					</picture>
				</li>
				<?php
			}
			?>
			
			
		</ul>

		<div class="banner-mobile">
			<img src="/<?= drupal_get_path('theme', 'weddings') ?>/img/logoBrand.png" alt="" class="logo-mobile">
			<picture>
				<img alt="" src="<?php print file_create_url($node->field_image['und'][0]['uri']) ?>" class="img-responsive img-mobile">
			</picture>
		</div>
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

	<section class="container-fluid bloque-intro">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2 class="titulo_bloque"><?php print $node->title ?></h2>
				<div class="separador"></div>
				<?php print $node->body['und'][0]['value'] ?>
				<?php 
				foreach ($node->field_botones['und'] as $boton) {
					?>
					<a class="enlace" href="<?php print $boton['url']?>">
						<?php print $boton['title']?>
					</a>
					<?php
				}
				?>
				
			</div>
		</div>
	</section>

	<section class="container-fluid bloque-resort-int no-margin">
		<div class="container">
			<div class="col-md-4 col-sm-4 col-xs-12 info-icon">
				<img src="<?php print file_create_url($node->field_imagen['und'][0]['uri'])?>">
				<h3><?php print $node->field_imagen['und'][0]['image_field_caption']['value'] ?></h3>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<?php print $node->field_descripcion_larga['und'][0]['value']?>
			</div>
		</div>
	</section>

	<section class="container-fluid flexslider bloque-slider-interna">
		<ul class="slides">
			<?php 
			foreach ($node->field_imagenes_ehnhancements['und'] as $item) {		
				$field_collection = entity_load('field_collection_item', array($item['value']));
				foreach ($field_collection as $multimedia) {
					?>
					<li>
						<picture>
						<source srcset="<?php print file_create_url($multimedia->field_imagen['und'][0]['uri'])?>" media="(max-width: 767px)">
							<source srcset="<?php print file_create_url($multimedia->field_imagen['und'][0]['uri'])?>">
							<img srcset="<?php print file_create_url($multimedia->field_imagen['und'][0]['uri'])?>">
						</picture>
						<?php if($multimedia->field_titulo['und'][0]['value']!="" || $multimedia->field_descripcion_larga['und'][0]['value']!="") : ?>
								<div class="box-info">
									<h3><?php print $multimedia->field_titulo['und'][0]['value'] ?></h3>
									<?php print $multimedia->field_descripcion_larga['und'][0]['value'] ?>
								</div>
                        <?php endif; ?>
					</li>

							<?php
						}
					}
					?>


				</ul>
	</section>

	<section class="container-fluid bloque-carousel-two">
		<div class="container">
			<div class="col-md-4 col-sm-4 col-xs-12 info-icon">
				<?php print $node->field_disponible['und'][0]['value'] ?>
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


	<?php 
	 $view = views_get_view('view_other_resorts');
  	  $view->set_display('block'); 
  	  $view->execute();
  	  print $view->render();
		
	?>



	<script type="text/javascript" src="https://player.vimeo.com/api/player.js"></script>

