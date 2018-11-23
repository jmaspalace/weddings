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
						<?php print $node->body['und'][0]['value']?>
					</div>
				</div>
			</section>


			<section class="bloque-tabs container-fluid ">
				<header>
					<ul>
						<?php 
					$vocabulary = taxonomy_vocabulary_machine_name_load('enhancements');
					$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid,'language' => $language->language));

						$request= $_SERVER['REQUEST_URI'];
						$existe=false;
						foreach ($terms as $term) {		
							$nombre=str_replace(" ", "-", $term->name);
							//Se quitan tildes y ñs
							$nombre = replace_specials_characters($nombre);
							$detect=strpos($request, strtolower($nombre));	
							if ($detect !== false) {
								$existe=true;
							}
						}


						
						
						$request= $_SERVER['REQUEST_URI'];
						$i=1;

						foreach ($terms as $term) {
							$nombre_tab=$term->name;
							$term->name=str_replace(" ", "-", $term->name);							
							if ($existe) {
								//Se quitan tildes y ñs
								$nombre = replace_specials_characters($term->name);
								$detect=strpos($request, strtolower($nombre));

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
							$history_push=str_replace(" ","-",$term->name);	
							$history_push = htmlentities($history_push);
 							$history_push = preg_replace('/\&(.)[^;]*;/', '\\1', $history_push);
							?>
							<li <?php print $tipo_clase ?> onclick="actualizarUrl('<?php print strtolower($history_push) ?>')" data-media="tab<?php print $i?>" id="<?php print $history_push  ?>"><?php print strtolower($nombre_tab) ?></li>
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
								$term->name=str_replace(" ", "-", $term->name);						
								if ($existe) {

                                //Se quitan tildes y ñs
                                $nombre = replace_specials_characters($term->name);
								$detect=strpos($request, strtolower($nombre));

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
		<div class="<?php print $tipo_clase ?>">



			
			<?php 	
			$view = views_get_view('enhancements_by_taxonomy');
			$view->set_display('block');
			$view->set_arguments(array($term->tid));
			$view->execute();
			
			foreach ($view->result as $item) {										  	 
				$node=node_load($item->nid);
				if (!empty($node->field_descripcion['und'])) {
					?>
					<section class="container-fluid bloque-video">
						<div class="container">
							<h2 class="titulo_bloque text-center"><?php print $node->field_titulo['und'][0]['value'] ?></h2>
							<div class="container-video">
								<iframe src="<?php print $node->field_descripcion['und'][0]['value']  ?>"></iframe>
							</div>
						</div>
					</section>

					<?php
				}
				
				$j=0;
				foreach ($node->field_imagenes_ehnhancements['und'] as $item) {		
					$field_collection = entity_load('field_collection_item', array($item['value']));
					foreach ($field_collection as $multimedia) {
						if ($j%2==0) {
							$class="container-fluid bloque-content3 background_center no-margin back-white";
						}else{
							$class="container-fluid bloque-content3 right background_center no-margin";
						}
						?>
						<section class="<?php print $class?>">
							<div class="col-md-6 col-sm-6 col-xs-12 content-img" style="background-image: url(<?php print file_create_url($multimedia->field_imagen['und'][0]['uri'])?>)">
								<img class="img-background" src="<?php print file_create_url($multimedia->field_imagen['und'][0]['uri'])?>">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 content-info">
								<div class="box">
									<h2 class="titulo_bloque"><?php print $multimedia->field_titulo['und'][0]['value']?></h2>
									<p><?php print $multimedia->field_descripcion_larga['und'][0]['value']?></p>
								</div>
							</div>
						</section>

						<?php
						$j++;
					}
					
				}
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

$view = views_get_view('religious_cultural_offerings');
$view->set_display('block'); 
$view->execute();
print $view->render();


function replace_specials_characters($s)
{
	$s = mb_convert_encoding($s, 'UTF-8','');
	$s = preg_replace("/á|à|â|ã|ª/","a",$s);
	$s = preg_replace("/Á|À|Â|Ã/","A",$s);
	$s = preg_replace("/é|è|ê/","e",$s);
	$s = preg_replace("/É|È|Ê/","E",$s);
	$s = preg_replace("/í|ì|î/","i",$s);
	$s = preg_replace("/Í|Ì|Î/","I",$s);
	$s = preg_replace("/ó|ò|ô|õ|º/","o",$s);
	$s = preg_replace("/Ó|Ò|Ô|Õ/","O",$s);
	$s = preg_replace("/ú|ù|û/","u",$s);
	$s = preg_replace("/Ú|Ù|Û/","U",$s);
	$s = str_replace(" ","_",$s);
	$s = str_replace("ñ","n",$s);
	$s = str_replace("Ñ","N",$s);

	$s = preg_replace('/[^a-zA-Z0-9_.-]/', '', $s);
	return $s;
}
?>



