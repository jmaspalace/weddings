	<?php 
	$item=$view->result;	
	?>

	<section class="container-fluid bloque-content2">
		<ul class="items">
			<?php 
			foreach ($item as $offer) {
				$offer_array=$offer->_field_data['nid']['entity'];
				$titulo_partes=explode(' ',$offer->_field_data['nid']['entity']->title);				
				if (count($titulo_partes>2)) {
					$titulo_con_estilo=$titulo_partes[0]." ".$titulo_partes[1];
					$titulo_normal="";
					for ($i=2; $i < count($titulo_partes) ; $i++) { 						
						$titulo_normal.=$titulo_partes[$i]." ";
					}
				}elseif (count($titulo_partes==2)) {
					$titulo_con_estilo=$titulo_partes[0]." ".$titulo_partes[1];
					$titulo_normal="";
				}else{
					$titulo_con_estilo=$titulo_partes[0];
					$titulo_normal="";
				}
			?>
			<li>
				<div class="col-md-6 col-sm-6 col-xs-12 content-slider">
					<img src="<?php print file_create_url($offer->_field_data['nid']['entity']->field_imagen['und'][0]['uri'])?>" class="img-responsive">
				</div>
				<div class="col-md-5 col-sm-6 col-xs-12 content-bloque">
					<h2 class="titulo_bloque"><span><?php print $titulo_con_estilo ?></span><?php print $titulo_normal ?></h2>
					<p> <?php print $offer_array->body['und'][0]['value'] ?></p>
				<a href="<?php print url( 'node/'.$offer_array->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('learn more')?></a>
				</div>	
			</li>
			
			<?php
			}
			?>

		</ul>
	</section>
	

	
			

		