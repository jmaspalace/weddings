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

	<article>
		<section class="container-fluid bloque-intro">
			<div class="container">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
					<h2 class="titulo_bloque"><?php print $node->field_titulo['und'][0]['value'] ?></h2>
					<p class="separador"></p>
				</div>
			</div>
		</section>

		<section class="container-fluid bloque-basic">
			<div class="container">
				<div class="col-md-6 col-sm-6 col-xs-12 content-info">
					<?php
					print $node->field_descripcion_larga['und'][0]['value'];
					?>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<img src="<?php  print file_create_url($node->field_image['und'][0]['uri']) ?>" class="img-responsive">
				</div>
			</div>
		</section>



		<section class="container-fluid bloque-img-background travel-current">
			<img class="img-background" src="<?php  print file_create_url($node->field_other_collections_image['und'][0]['uri']) ?>">
			<div class="content-info">
				<p>
				<?php 
				print $node->field_listado['und'][0]['value'];
				?>
				</p>
			</div>
		</section>

		<section class="container-fluid bloque-basic">
			<div class="container">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<img src="<?php  print file_create_url($node->field_imagen['und'][0]['uri']) ?>" class="img-responsive">
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 content-info">
					<?php
					print $node->field_description['und'][0]['value'];
					?>
				</div>
			</div>
		</section>

		<section class="container-fluid bloque-basic back-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12 content-info">
						<?php
					print $node->field_descripcion_home['und'][0]['value'];
					?>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<img src="<?php  print file_create_url($node->field_imagen_home['und'][0]['uri']) ?>" class="img-responsive">
					</div>
				</div>

				<div class="row">
					<?php 
					foreach ($node->field_imagenes['und'] as $imagen) {
					?>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<img src="<?php print file_create_url($imagen['uri']) ?>" class="img-responsive">
					</div>
					<?php
					}
					?>
					
					
				</div>

			</div>
		</section>
	</article>


	<section class="container-fluid bloque-travel-current">
		<div class="container">
			<div class="container-logo">
				<img src="/<?php print drupal_get_path('theme','weddings')?>/img/logo-current.png">
			</div>
		</div>
	</section>
	
	<?php 

	
  	  $view = views_get_view('view_other_helpful_article');
  	  $view->set_display('block'); 
  	  $view->execute();
  	  print $view->render();
	?>