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
$request= $_SERVER['REQUEST_URI'];
$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'taxonomy_term')
->fieldCondition('field_url_interna', 'value',$request , '=');
$result = $query->execute();

foreach ($result['taxonomy_term'] as $key) {
  $tid=$key->tid;
}

$resort=taxonomy_term_load($tid);

	?>	

	<section class="container-fluid bloque-intro">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2><?php print $resort->name ?></h2>
				<div class="separador"></div>
				
			</div>
		</div>
	</section>

	<?php
	
	$view = views_get_view('weddings_by_resort');
	$view->set_display('block');
	$view->set_arguments(array($resort->tid));
	$view->execute();
	print $view->render();

?>

<section class="container-fluid bloque-local-measure">
				<div class="container">
					<h2><?php print t('happening now'); ?></h2>
					<div id="widget-6c600c1f8ff1bd48549abd20bf02e85c2bcbf7c812dbbbd7e4bfe26a1e8b" data-lmwidget="6c600c1f8ff1bd48549abd20bf02e85c2bcbf7c812dbbbd7e4bfe26a1e8b"></div>
				</div>
			</section>

			<script src="https://cdn.getlocalmeasure.com/embed/widgets.js" data-cfasync="false"></script>

	
