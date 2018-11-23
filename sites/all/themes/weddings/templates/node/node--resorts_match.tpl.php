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
			</div>
		</div>
	</section>
	<section class="bloque-mach container-fluid">
		<div class="container-mach">
			<ul class="owl-carousel owl-theme">
				<?php 
						$vocabulary = taxonomy_vocabulary_machine_name_load('resorts_match');
						$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid, 'language' => $language->language));		
						$i=1;				
						foreach ($terms as $term) {
							$resort=taxonomy_term_load($term->tid);
						?>
						<li <?php if ($i==1){ ?> class="active" <?php } ?> id="tab<?php print $i ?>" >
							<img src="<?php print file_create_url($resort->field_image['und'][0]['uri'])   ?>">
							<p><?php print $resort->name ?></p>
						</li>

						<?php	
						$i++;						
						}
							?>
				
				
			</ul>
		</div>
	</section>

	
				<?php 
						$vocabulary = taxonomy_vocabulary_machine_name_load('resorts_match');
						$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid, 'language' => $language->language));		
						$i=1;				
						foreach ($terms as $term) {
							$resort=taxonomy_term_load($term->tid);
							
						?>

	<section class="container-fluid box-answer active <?php if ($i==0){ ?> active <?php } ?>" data-id="tab<?php print $i ?>">
		<div class="triangulo"></div>
		<div class="container">
			<div class="col-md-5 col-sm-5 col-xs-12">
				<h2 class="titulo_bloque"><?php print $resort->name ?></h2>
				<p><?php print $resort->description  ?></p>
				<a href="<?php print $resort->field_boton['und'][0]['url']  ?>" class="enlace"><?php print $resort->field_boton['und'][0]['title']  ?></a>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-12"> 
				<ul class="owl-carousel owl-theme">
					<?php 
					foreach ($resort->field_imagen_galeria['und'] as $imagen) {							
					?>
					<li>
						<img src="<?php print file_create_url($imagen['uri']) ?>" class="img-responsive">
					</li>
					<?php 
					}
					?>
					
				</ul>
			</div>
		</div>
	</section>		

						<?php	
						$i++;						
						}
							?>
				
				
			






	<?php 
	 $view = views_get_view('view_other_resorts');
  	  $view->set_display('block_3'); 
  	  $view->execute();
  	  print $view->render();

	?>