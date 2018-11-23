	<?php 
	global $language;
	$home="/".$language->language;  
	?>
<h1 class="hidden"><?php print $node->title?></h1>
	<section class="bloque-banner container-fluid">
		<a href=""><img src="/sites/all/themes/weddings/images/logoBrand.png" alt="" class="logo-mobile"></a>
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

	<section class="container-fluid bloque-intro">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<h2><?php print $node->title?></h2>
				<div class="separador"></div>
				
			</div>
		</div>
	</section>

	<section class="container-fluid">
		<div class="container">
			<div class="share">
				<p><?php print t("SHARE")  ?></p>
				<div class="sharethis-inline-share-buttons"></div>				
			</div>
			<div class="grid">
				<?php 
			foreach ($node->field_imagenes_previsualizacion	['und'] as $item) {		
				$field_collection = entity_load('field_collection_item', array($item['value']));
				foreach ($field_collection as $imagenes) {
					?>
					<div class="grid-item">
										<a data-fancybox="group" href="<?php print file_create_url($imagenes->field_imagen_mobile['und'][0]['uri']) ?>" >
											<div class="play"></div>
											<img src="<?php print file_create_url($imagenes->field_imagen_desktop['und'][0]['uri']) ?>">
										</a>
					</div>

					<?php
				}
			}
					?>
									

				
			</div>
			<?php 
			$tid=$node->field_resort_wedding['und'][0]['tid'];
			$term=taxonomy_term_load($tid);

			$view = views_get_view('weddings_by_resort');
			$view->set_display('block');
			$view->set_arguments(array($tid));
			$view->execute();
			$i=0;
			
			foreach ($view->result as $item) {							
				if($item->_field_data['nid']['entity']->nid==$node->nid){
					$ubicacion=$i;					
				}
				$i++;
			}

			
			$previous=$ubicacion-1;
			$next=$ubicacion+1;
			
			//print_r($view->result[$next]);
			if (!empty($view->result[$previous])) {
				$previous=$view->result[$previous]->_field_data['nid']['entity']->nid;
			}else{
				$previous=false;
			}

			if (!empty($view->result[$next])) {
				$next=$view->result[$next]->_field_data['nid']['entity']->nid;
			}else{
				$next=false;
			}

			?>
			<ul class="botones">
				<?php 
				if ($previous!=false) {
					?>
					<li>
					<a href="<?php print url( 'node/'.$previous, array('absolute' => true)); ?>"><?php print t('Previous Story') ?></a>
				</li>
					<?php
				}
				?>
				
				<li class="center">
					<a href="<?php print $term->field_url_interna['und'][0]['value'] ?>"><?php print $term->name ?></a>
				</li>
				<?php
				if ($next!=false) {
					?>
					<li>
					<a href="<?php print url( 'node/'.$next, array('absolute' => true)); ?>"><?php print t('Next Story') ?></a>
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
