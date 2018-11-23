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

	<?php 
	$i=0;
	foreach ($node->field_multimedia['und'] as $item) {		
		$field_collection = entity_load('field_collection_item', array($item['value']));
		foreach ($field_collection as $multimedia) {
			if ($i%2==0) {
				$alineacion="right";
			}else{
				$alineacion="";
			}

			if ($multimedia->field_es_bloque_grande['und'][0]['value']!=1) {
						
			?>

		<section class="container-fluid bloque-content2 <?php print $alineacion ?>">
		<div class="col-md-6 col-sm-6 col-xs-12 content-slider">
			<img src="<?php print file_create_url($multimedia->field_imagen['und'][0]['uri'])?>" class="img-responsive">
		</div>
		<div class="col-md-5 col-sm-6 col-xs-12 content-bloque">
		<?php if (!empty($multimedia->field_titulo['und'])) {	?>
			<h2 class="titulo_bloque lineBottom"><?php print $multimedia->field_titulo['und'][0]['value'] ?></h2>
		<?php }?>
			<p><?php print $multimedia->field_descripcion_larga['und'][0]['value'] ?></p>
		</div>
		</section>

			<?php
		}else{
			?>

			<section class="container-fluid bloque-img-background" style="background-image: url(<?php print file_create_url($multimedia->field_imagen['und'][0]['uri'])?>);">
		<img class="img-background" src="<?php print file_create_url($multimedia->field_imagen['und'][0]['uri'])?>">
		<div class="content-info left">
			<h2 class="titulo_bloque lineBottom"><?php print $multimedia->field_titulo['und'][0]['value'] ?></h2>
			<p><?php print $multimedia->field_descripcion_larga['und'][0]['value'] ?></p>
		</div>
	</section>


			<?php
		}
			

			}	
		$i++;	
	}
	?>


	<section class="container-fluid bloque-whats">
		<div class="container">		
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<img src="<?php print file_create_url($node->field_imagen['und'][0]['uri'])?>" class="img-responsive">
					<div class="need-more">
						<h2><?php print $node->field_titulo['und'][0]['value']?></h2>
						<a href="<?php print $node->field_boton['und'][0]['url']?>" class="enlace"><?php print $node->field_boton['und'][0]['title']?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	

	