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
						<p><?php print $node->field_descripcion_larga['und'][0]['value']?></p>
					</div>
				</div>
			</section>


			<section class="bloque-tabs container-fluid ">
				<header>
					<ul>
						<?php 
					$vocabulary = taxonomy_vocabulary_machine_name_load('religious_cultural_offerings');
					$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid,'language' => $language->language));




						$request= $_SERVER['REQUEST_URI'];
						$i=1;

						foreach ($terms as $term) {

							$detect=strpos($request, strtolower($term->name));	

							if ($i ==1) {
								$tipo_clase="class='active'";

							}else{
								$tipo_clase="";
							}
							?>
							<li <?php print $tipo_clase ?> data-media="tab<?php print $i?>" id="<?php print str_replace(" ", "-", strtolower($term->name))  ?>"><?php print strtolower($term->name) ?></li>
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

						$detect=strpos($request, strtolower($term->name));	

						if ($i ==1 ) {
							$tipo_clase="tab".$i." active";

						}else{
							$tipo_clase="tab".$i;
						}
						?>
						<div class="<?php print $tipo_clase ?>">

							<?php 	
							$view = views_get_view('religions_by_category');
							$view->set_display('block');
							$view->set_arguments(array($term->tid));
							$view->execute();

							foreach ($view->result as $item) {		
								$item=$item->_field_data['nid']['entity'];
								?>

								<section class="container-fluid bloque-intro no-margin">
									<div class="container">
										<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
											<p> <?php print $item->field_descripcion_larga['und'][0]['value'] ?> </p>
										</div>
									</div>
								</section>

								<section class="container-fluid bloque-boxes no-margin background_center">
									<div class="boxes-images">		
									<?php
										foreach ($item->field_imagenes['und'] as $imagen) {																				
									 ?>																	
										<div class="col-md-4 col-sm-4 col-xs-12 content-img" style="background-image: url(<?php print file_create_url($imagen['uri']) ?> );">
											<img src="<?php print file_create_url($imagen['uri']) ?>" class="img-background">
										</div>
										<?php 
									}
										?>
									</div>
									<div class="content-info">
										<p><?php print $item->field_listado['und'][0]['value']?></p>
											<p class="small"> <strong> <?php print t('Available at:')?> </strong> <br>
										<?php print $item->field_disponible['und'][0]['value']?></p>
											
											<?php if (!empty($item->field_boton['und'])) {
												?>
													<a  href="<?php print $item->field_boton['und'][0]['url']?>" class="enlace"><?php print $item->field_boton['und'][0]['title']?></a>
												<?php
												} 
											?>
											</div>
								</section>

										<?php 
									}
									?>

								</div>	
								<?php
								$i++;
							}
							?>	




						</div>
					</section>



<?php 
	 $view = views_get_view('view_other_resorts');
  	  $view->set_display('block_3'); 
  	  $view->execute();
  	  print $view->render();

	?>
