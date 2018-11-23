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
						<h2><?php print $node->title?></h2>
						<div class="separador"></div>
						<p><?php print $node->body['und'][0]['value'] ?></p>
					</div>
				</div>
			</section>

			<section class="container-fluid bloque-real-gallery">
				<div class="container">
					<ul>				
						<?php 

						$vocabulary = taxonomy_vocabulary_machine_name_load('resorts');

						$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid,'language' => $language->language));
						foreach ($terms as $term) {							
							?>
							<li>
								<img src="<?php print file_create_url($term->field_imagen['und'][0]['uri']) ?>" class="img-responsive">
								<div class="content-gallery-overblack">
									<div class="content-info">
										<h2 class="titulo_bloque"><?php print $term->name ?></h2>
										<a href="<?php print $term->field_url_interna['und'][0]['value']?>" class="enlace"><?php print t('View more')?></a>
									</div>
								</div>
							</li>				



							<?php
						}

						?>

					</ul>
				</div>
			</section>
			<section class="container-fluid bloque-local-measure">
				<div class="container">
					<h2><?php print t('happening now'); ?></h2>
					<div id="widget-6c600c1f8ff1bd48549abd20bf02e85c2bcbf7c812dbbbd7e4bfe26a1e8b" data-lmwidget="6c600c1f8ff1bd48549abd20bf02e85c2bcbf7c812dbbbd7e4bfe26a1e8b"></div>
				</div>
			</section>

			<script src="https://cdn.getlocalmeasure.com/embed/widgets.js" data-cfasync="false"></script>
