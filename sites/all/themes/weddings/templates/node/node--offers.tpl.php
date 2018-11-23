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

			<section class="container-fluid bloque-intro">
				<div class="container">
					<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
						<h2><?php print $node->field_titulo['und'][0]['value']?></h2>
						<div class="separador"></div>
						<p><?php print $node->body['und'][0]['value']?></p>
					</div>
				</div>
			</section>


			<section class="container-fluid bloque-content2 right">
				<div class="col-md-6 col-sm-6 col-xs-12 content-slider">
					<img src="<?php print file_create_url($node->field_imagen['und'][0]['uri'])?>" class="img-responsive">
				</div>
				<div class="col-md-5 col-sm-6 col-xs-12 content-bloque">
					<p><?php print $node->field_descripcion_larga['und'][0]['value'] ?></p>
					<?php 
					if (!empty($node->field_boton['und'][0])) {
						$target="";
						if (!empty($node->field_boton['und'][0]['attributes']['target'])) {
			 				$target="target='_blank'";
			 			}
						?>
						<a <?php print $target ?> href="<?php print $node->field_boton['und'][0]['url'] ?>" class="enlace"><?php print $node->field_boton['und'][0]['title'] ?></a>
						<?php
					}
					?>
				</div>	
			</section>

			<?php 
			if (!empty($node->field_disponible['und'])) {
				?>

				<section class="container-fluid bloque-offer-terms">
					<div class="container">
						<p class="small"><strong><?php print t('Terms & Conditions:')?></strong></p>
						<p class="small"> <?php print $node->field_disponible['und'][0]['value']?></p>
					</div>
				</section>	

				<?php
			}
			?>
			

			<?php 
			$view = views_get_view('view_other_resorts');
			$view->set_display('block_3'); 
			$view->execute();
			print $view->render();

			?>
			