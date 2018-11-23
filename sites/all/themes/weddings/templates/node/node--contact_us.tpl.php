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
						<h2 class="titulo_bloque" ><?php print $node->field_titulo['und'][0]['value']?></h2>
						<p class="separador"></p>
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
					$block = module_invoke('webform', 'block_view', 'client-block-128');
				}else{
					$block = module_invoke('webform', 'block_view', 'client-block-296');
				}
				
					print render($block['content']);
					?>
			<p class="text-center" ><?php print $node->field_descripcion_corta['und'][0]['value'] ?></p>
		</div>
</section>
<?php
}else{
 ?>

<section class="container-fluido confirm-thanks">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;">
				<h2 class="titulo_bloque text-center"><?php print $node->field_titulo_corto['und'][0]['value'] ?></h2>
				<p class="text-center"><?php print $node->field_description['und'][0]['value'] ?></p>
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



			<?php 
	if (!isset($_GET['thanks-agent'])) {		
	?>
<section class="container-fluid bloque-find-specialist">
				<div class="container">
					<div class="col-md-5 col-sm-5 col-xs-12">
						<h2 class="titulo_bloque"><span><?php print t ('To find a') ?></span> <?php print t ('PRO SPECIALIST') ?></h2>
						<p><?php print $node->field_descripcion_larga['und'][0]['value'] ?></p>
					</div>
					<div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12">
						<div class="bloque-form">
							<h3><?php print t('FIND YOUR CERTIFIED PRO WEDDING SPECIALIST') ?></h3>
							<form class="form_weddings" id="search-agent" name="" novalidate="">
								<div class="row">
									<?php 

									$vocab = taxonomy_vocabulary_machine_name_load('states');
									$vid = $vocab->vid;
									$listLocations = taxonomy_get_tree($vid);
									$select_country=t('Select your Country');
									$htmlCountry = '<option value="">'.$select_country.'</option>';
									foreach ($listLocations as $item) {
									   if( $item->depth === 0 ) {   
									      $htmlCountry .= '<option value="'.$item->tid.'">'.$item->name.'</option>';
									   }
									}
									?>	

									<select id="country" onchange="traerEstados()" name="country" required="" class="" tabindex="-98">
										<?php 
											print $htmlCountry;
										?>
									</select>

									<select style="display: none;" id="state"  name="state" required="" class="" tabindex="-98">
										
									</select>



								</div>

								<div class="row">
									<input type="submit" id="searchAgent" onclick="buscarAgente()" value="<?php print t('SEND')?>" >
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
<?php
}else{
 ?>
 <section class="container-fluido confirm-thanks">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;">
				<h2 class="titulo_bloque text-center"><?php print $node->field_titulo_corto['und'][0]['value'] ?></h2>
				<p class="text-center"><?php print $node->field_description['und'][0]['value'] ?></p>
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

			<section  style="display: none;" id="agentResult" class="container-fluid bloque-specialist">
					<ul id="ulAgent">
						
					</ul>
			</section>	



			<section class="container-fluid bloque-form" style="display: none;" id="agentForm">
				<div class="container">
					<?php
					$block = module_invoke('webform', 'block_view', 'client-block-140');
					print render($block['content']);
					?>
					
				</div>
			</section>




			<script type="text/javascript">
				jQuery("#search-agent").submit(function(e){
					return false;
				});

				function upMail(mail){
					jQuery('#agentForm').css("display","block");
					jQuery('.agentmail').val(mail);
				}

				function buscarAgente(){
					var result;
					var state=jQuery('#state').val();
					jQuery.ajax({
						type: "POST",
						url: Drupal.settings.basePath+Drupal.settings.pathPrefix+'consultar/agente',
						data:{ "tid":state, "key": 'd2VkZGluZ3MtbGlzdGFyLWFnZW50ZXM='},
						success: function(data)
						{     
							jQuery('#ulAgent').html('');
							result=JSON.parse(data);			
							if (result.nombre==0) {
								
								jQuery('#ulAgent').html(result.mensaje);

								jQuery('#agentResult').css('display','block');                         
							}else{
								
								if (result.length>=1) {
									for (var i = 0; i < result.length ; i++) {
										jQuery('#ulAgent').append('<li><h2 class="titulo_bloque">'+result[i].nombre+'</h2><p><strong><?php print t('Name of Agency:')?></strong><br>'+result[i].agencia+'</p><a onclick=upMail("'+result[i].correo+'") class="enlace"><?php print t('contact')?></a></li>');
									}
								}else{
									jQuery('#ulAgent').append('<li><h2 class="titulo_bloque">'+result.nombre+'</h2><p><strong><?php print t('Name of Agency:')?></strong><br>'+result.agencia+'</p><a onclick=upMail("'+result.correo+'") class="enlace"><?php print t('contact')?></a></li>');
								}
								jQuery('#agentResult').css('display','block');                         
								

							}



						}
					});


				}

				function traerEstados(){
					var result;
					var country=jQuery('#country').val();
					jQuery.ajax({
						type: "POST",
						url: '/traer/estados', 
						data:{"tid":country},          
						success: function(data)
						{     							
							jQuery('#state').html(data);
							jQuery('form select').selectpicker('refresh');
							jQuery('button[data-id="state"]').addClass('visible');
							jQuery('#state').css("display","block");

						}
					});


				}





			</script>

		</script>

