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
				$block = module_invoke('webform', 'block_view', 'client-block-125');
			}else{
				$block = module_invoke('webform', 'block_view', 'client-block-291');
			}
						print render($block['content']);
					?>
		</div>
</section>
<?php
}else{
$pdf=file_create_url($node->field_pdf['und'][0]['uri']);
 ?>

<section class="container-fluido confirm-thanks">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;">
				<h2 class="titulo_bloque text-center"><?php print t('Thank You') ?></h2>
				<p class="text-center"><?php print $node->field_descripcion_larga['und'][0]['value'] ?></p>
				<a target="_blank" class="enlace" href="<?php print $pdf ?>">Download</a>
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
