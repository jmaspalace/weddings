	<?php 
	global $language;
	$home="/".$language->language;  
	?>
	<h1 class="hidden"><?php print $node->title?></h1>
	<section class="bloque-banner container-fluid">
		<a href=""><img src="/<?php print drupal_get_path('theme','weddings')?>/img/logoBrand.png" alt="" class="logo-mobile"></a>
		<!-- <picture>
			<source srcset="<?php print file_create_url($node->field_imagen_mobile['und'][0]['uri'])?>" media="(max-width: 767px)">
				<source srcset="<?php print file_create_url($node->field_imagen_desktop['und'][0]['uri'])?>">
					<img srcset="<?php print file_create_url($node->field_imagen_desktop['und'][0]['uri'])?>">
				</picture>-->
				<br /><br /><br /><br /><br /><br />
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

			if ($node->nid == 5){

				$path_js = $base_url."/";
				$path_js .=  drupal_get_path('theme','weddings');
				$path_js .= "/js/iframeResizer.min.js";


				?>
				<section class="container-fluid bloque-breadcrumb">

						<!-- http://10.8.19.109/categories -->
						<iframe src="http://127.0.0.1/test/davidjbradshaw-iframe-resizer-d0e8add/example/frame.content.html" width="100%" scrolling="no"></iframe>
						<p id="callback">
						</p>
				
				</section>
				

				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
				<script type="text/javascript" src="<?php echo $path_js; ?>"></script>
				<!-- <script type="text/javascript" src="http://weddingsdiego.com/sites/all/themes/weddings/js/iframeResizer.min.js"></script> -->
				<script type="text/javascript">


					iFrameResize({
						log: true,                  
						inPageLinks: true,

						messageCallback: function (messageData) { 
							$('p#callback').html(
								'<b>Frame ID:</b> ' + messageData.iframe.id +
								' <b>Message:</b> ' + messageData.message
								);
							alert(messageData.message);
							document.getElementsByTagName('iframe')[0].iFrameResizer.sendMessage('Hello back from parent page');
						}
					});

				</script>


				<?php
			}

			?>

			<section class="container-fluid bloque-intro">
				<div class="container">
					<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
						<?php print $node->body['und'][0]['value']?>
					</div>
				</div>
			</section>

			<?php 
			$vocabulary = taxonomy_vocabulary_machine_name_load('paises');
			$terms = entity_load('taxonomy_term', FALSE, array('vid' => $vocabulary->vid,'language' => $language->language));

			$request= $_SERVER['REQUEST_URI'];
			$existe=false;
			foreach ($terms as $term) {		
				$term->name=str_replace(" ", "-", $term->name);
				//Se quitan tildes y ñs
				$nombre = replace_specials_characters($term->name);
				$detect=strpos($request, strtolower($nombre));
				if ($detect !== false) {
					$existe=true;
				}
			}
			?>
			<section class="bloque-tabs container-fluid bloque-tabs-custumizing">
				<header>
					<ul>
						<?php 						
						$i=1;

						foreach ($terms as $term) {
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
							<li <?php print $tipo_clase ?> onclick="actualizarUrl('<?php print strtolower($history_push) ?>')" data-media="tab<?php print $i?>" id="<?php print $history_push  ?>"><?php print strtolower($term->name) ?></li>
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
							<section class="bloque-container bloque-box-gallery">
								<div class="container">
									<ul>
										<?php 	
										$view = views_get_view('collections_by_country');
										$view->set_display('block');
										$view->set_arguments(array($term->tid));
										$view->execute();

										foreach ($view->result as $item) {		
											$item=$item->_field_data['nid']['entity'];
											$titulo_partes=explode(" ", $item->title);
											?>
											<li>

												<img src="<?php print file_create_url($item->field_imagen_view['und'][0]['uri'])?>" class="img-responsive">
												<h2 class="titulo_bloque">

													<span><?php print $titulo_partes[0] ?></span> 
													<?php 
													for ($j=1; $j < count($titulo_partes); $j++) { 
														print $titulo_partes[$j]." ";
													}
													?>

												</h2>

												<a class="enlace" href="<?php print url( 'node/'.$item->nid, array('absolute' => true)); ?>"><?php print t('view more')?></a>
											</li>
											<?php 
										}
										?>
									</ul>
								</div>
							</section>
						</div>	
						<?php
						$i++;
					}
					?>	




				</div>
			</section>

			<?php
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

