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
						<h2><?php print $node->field_titulo['und'][0]['value'] ?></h2>
						<div class="separador"></div>
						<p> <?php print $node->body['und'][0]['value']?></p>
					</div>

				</div>
			</section>

			<?php 
			$vocabulary = taxonomy_vocabulary_machine_name_load('group_benefits');
			$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid,'language' => $language->language));
			$request= $_SERVER['REQUEST_URI'];
			$existe=false;
			foreach ($terms as $term) {		
				$detect=strpos($request, strtolower($term->name));	
				if ($detect !== false) {
					$existe=true;
				}
			}
			?>
			<section class="bloque-tabs container-fluid no-margin">
				<header>
					<ul>
						<?php 
						


						$i=1;

						foreach ($terms as $term) {

							if ($existe) {					
								$detect=strpos($request, strtolower($term->name));	

								if ($detect !== false) {
									$tipo_clase="class='active'";

								}else{
									$tipo_clase="";
								}
							}else{
								if ($i == 1) {
									$tipo_clase="class='active'";
								}else{
									$tipo_clase="";
								}

							}		
							?>
							<li <?php print $tipo_clase ?> data-media="tab<?php print $i?>" id="<?php print strtolower($term->name) ?>"><?php print strtolower($term->name) ?></li>
							<?php
							$i++;
						}
						?>			    
					</ul>
				</header>


				<div class="container-tabs">
					<?php 

					$request= $_SERVER['REQUEST_URI'];
					$i=1;

					foreach ($terms as $term) {

						if ($existe) {					
							$detect=strpos($request, strtolower($term->name));	

							if ($detect !== false) {
								$tipo_clase="tab".$i." active";							
							}else{
								$tipo_clase="tab".$i;
							}
						}else{
							if ($i == 1) {
								$tipo_clase="tab".$i." active";							
							}else{
								$tipo_clase="tab".$i;
							}

						}	

						?>
						
										<?php 	
										$view = views_get_view('benefits_by_tax');
										$view->set_display('block');
										$view->set_arguments(array($term->tid));
										$view->execute();

										foreach ($view->result as $item) {		
											$item=$item->_field_data['nid']['entity'];
											$titulo_partes=explode(" ", $item->title);
											?>
											<div class="<?php print $tipo_clase  ?>">

				<section class="container-fluid bloque-benefits">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12 content-info">
								<?php
								print $item->body['und'][0]['value'];
								 ?>
							</div>
							<div class="col-md-6 col-sm-6 hidden-xs">
								<div class="pictures">
									<img src="<?php print file_create_url($item->field_image['und'][0]['uri']);  ?>" class="img1">
									<div class="box_vino_tinto"></div>
									<img src="<?php print file_create_url($item->field_imagen['und'][0]['uri']);  ?>" class="img2">
								</div>
							</div>
						</div>
						<div class="row img-bottom">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<img class="img-responsive" src="<?php print file_create_url($item->field_other_collections_image['und'][0]['uri']);  ?>">
							</div>
						</div>
					</div>
				</section>

				<section class="container-fluid bloque-offer-terms">
					<div class="container">
						<p class="small"><strong><?php print t('Terms & Conditions')?></strong></p>
						<p class="small"> <?php print $item->field_disponible['und'][0]['value']?></p>
					</div>
				</section>

			</div>

										
											<?php 
										}
										?>
							
						<?php
						$i++;
					}
					?>	




				</div>
			</section>

			<section class="container-fluid bloque-benefits-bottom">
		<div class="col-md-6 col-sm-6 col-xs-12 section" style="background-image: url(<?php print file_create_url($node->field_image['und'][0]['uri']) ?>);">
			<img src="<?php print file_create_url($node->field_image['und'][0]['uri']) ?>" class="img-background">
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 section" style="background-image: url(<?php print file_create_url($node->field_imagen['und'][0]['uri']) ?>);">
			<img src="<?php print file_create_url($node->field_imagen['und'][0]['uri']) ?>" class="img-background">
			<div class="box-info">
				<?php 
				print $node->field_descripcion_corta['und'][0]['value'];
				?>
			</div>
		</div>
	</section>



