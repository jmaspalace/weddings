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

	<section class="container-fluid bloque-intro">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2><?php print $node->field_titulo['und'][0]['value']?></h2>
				<div class="separador"></div>
				<p><?php print $node->body['und'][0]['value']?></p>
			</div>
		</div>
	</section>


	<?php 
	if (!isset($_GET['thanks'])) {		
	?>
<section class="container-fluid bloque-form">
		<div class="container">
					<?php
						if ($language->language=="en") {
							$block = module_invoke('webform', 'block_view', 'client-block-130');
						}else{
							$block = module_invoke('webform', 'block_view', 'client-block-297');
						}
						print render($block['content']);
					?>
		</div>
</section>
<?php
}else{
 ?>

<section class="container-fluido confirm-thanks">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;">
				<h2 class="titulo_bloque text-center"><?php print $node->field_titulo_corto['und'][0]['value'] ?></h2>
				<p class="text-center"><?php print $node->field_descripcion_larga['und'][0]['value'] ?></p>
			</div>
			<?php 

			$view = views_get_view('view_resorts_and_offers');
  	  $view->set_display('block'); 
  	  $view->execute();
  	  print $view->render();
			?>	

		</div>
	</section>
	<?php 
	
}
?>

		<script type="text/javascript" src="https://player.vimeo.com/api/player.js"></script>


	