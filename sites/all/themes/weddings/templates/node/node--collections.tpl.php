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

	<?php 
	/*$tid=$node->field_resort['und'][0]['tid'];
	$tax=taxonomy_term_load($tid);
	$resort=$tax->name;*/
	?>

	<section class="container-fluid bloque-collection-int1">
		<div class="container">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<img class="img-responsive" src="<?php print file_create_url($node->field_imagen['und'][0]['uri'])?>">
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 content-info">
				<?php print $node->field_descripcion_larga['und'][0]['value'] ?>
				<p><strong><?php print t('Available at: ')?></strong><?php print $node->field_descripcion_corta['und'][0]['value'] ?> </p>
				<p class="legal"><?php print t('*Can Be Customized')?></p>
				<?php 
				if (!empty($node->field_descripcion['und'][0])) {
					?>

				<p class="price"><?php print $node->field_descripcion['und'][0]['value'] ?></p>
					<?php
				}
				?>
			</div>
		</div>
	</section>


	<section class="container-fluid bloque-collection-int2">
		<div class="container">
			<h2 class="titulo_bloque"><?php print t('amenities')?></h2>
			<div class="separador"></div>
			
				<?php print $node->field_listado['und'][0]['value']?>
			
		</div>
	</section>


	<section class="container-fluid bloque-carousel bloque-carousel-box">
		<ul class="owl-carousel owl-theme">
		<?php foreach ($node->field_imagen_galeria['und'] as $imagen) {	
		?>
			<li>
				<img class="img-responsive" title="<?php print $imagen['title']?>" alt="<?php print $imagen['alt']?>" src="<?php print file_create_url($imagen['uri'])?>">
			</li>
		<?php 
		}
		?>
			
		</ul>
	</section>
	<section class="container-fluid bloque-collection-int3">
		<div class="container">
			<?php 
		foreach ($node->field_paquetes['und'] as $item) {		
		$field_collection = entity_load('field_collection_item', array($item['value']));

			foreach ($field_collection as $paquete) { 
				if (!empty($paquete->field_imagen)) {											
			?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="box-container">
					<img class="img-responsive" title="<?php print $paquete->field_imagen['und'][0]['title'] ?>" alt="<?php print $paquete->field_imagen['und'][0]['alt'] ?>" src="<?php print file_create_url($paquete->field_imagen['und'][0]['uri']) ?>">
					<div class="content-info">
						<h3 class="subtitulo"><?php print $paquete->field_titulo['und'][0]['value']?></h3>
						
							<?php print $paquete->field_listado['und'][0]['value']?>
						
						<p class="legal"><?php print t('*Can Be Customized')?></p>
						<?php 
						if (!empty($paquete->field_descripcion['und'][0])) {
							?>
							
						<div class="contet-price">
							<p class="price"> <?php print $paquete->field_descripcion['und'][0]['value']?> </p>
						</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>

			<?php 
			}
			}
		}
			?>

		</div>
	</section>


	<?php 

  	  $view = views_get_view('view_other_collections');
  	  $view->set_display('block'); 
  	  $view->set_arguments(array($node->nid));
  	  $view->execute();
  	  
	?>

			<section class="container-fluid bloque-carousel bloque-carousel-circulos">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-center">
				<h2 class="titulo_bloque"><span><?php print t('View Other')?></span><?php print t('collections')?></h2>
			</div>
			<ul class="owl-carousel owl-theme">
		<?php 
		foreach ($view->result as $item) {			

		if ($item->_field_data['nid']['entity']->field_resort['und'][0]['tid']==$node->field_resort['und'][0]['tid']) {				
		?>
				<li>
					<picture>
						<div class="rounded">
							<img src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>">
						</div>
					</picture>
					<h3><?php print $item->_field_data['nid']['entity']->title?></h3>
					<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('view more')?></a>
				</li>
			<?php 
		}
		}
			?>
		
			</ul>
		</div>
	</section>


		
	<?php 

 	  $view = views_get_view('religious_cultural_offerings');
  	  $view->set_display('block'); 
  	  $view->execute();
  	  print $view->render();	
	?>

	



	

	