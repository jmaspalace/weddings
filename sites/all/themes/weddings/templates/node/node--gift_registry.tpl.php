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
			</div>
		</div>
	</section>

	<section class="container-fluid bloque-content2 right">
		<div class="col-md-6 col-sm-6 col-xs-12 content-slider">
			<img src="<?php print file_create_url($node->field_imagen['und'][0]['uri'])?>" class="img-responsive">
		</div>
		<div class="col-md-5 col-sm-6 col-xs-12 content-bloque">
			<?php print $node->body['und'][0]['value']?>
			<?php 
			$target="";
			 if (!empty($node->field_boton['und'][0]['attributes']['target'])) {
			 	$target="target='_blank'";
			 }
			?>
			<a <?php print $target ?> class="enlace" href="<?php print $node->field_boton['und'][0]['url']?>"><?php print $node->field_boton['und'][0]['title']?></a>
		</div>
	</section>



