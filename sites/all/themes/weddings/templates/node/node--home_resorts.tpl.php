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

	<section class="container-fluid bloque-resorts">
		<div class="container">
			<ul>

			<?php 
			 $view = views_get_view('view_other_resorts');
		  	  $view->set_display('block_1'); 
		  	  $view->execute();
		  	  foreach ($view->result as $item) {
		  	  	?>
		  	  	<li>
					<picture>
						<img src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>" class="img-responsive">
					</picture>
					<h2><?php print $item->_field_data['nid']['entity']->title?></h2>
					<div class="container-enlace">
						<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('View more')?></a>
					</div>
				</li>

		  	  	<?php
		  	  }
			?>
				
				
				<li>
					<?php print $node->field_descripcion['und'][0]['value']?>
				</li>
			</ul>
		</div>
	</section>

			
	<?php 

 	  $view = views_get_view('religious_cultural_offerings');
  	  $view->set_display('block'); 
  	  $view->execute();
  	  print $view->render();	
	?>

	

