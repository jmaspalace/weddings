	<?php 
	$item=$view->result;	
	$i=0;
			foreach ($item as $articles) {
				if ($i%2==0) {
					$class="container-fluid bloque-content3 back-white";
				}else{
					$class="container-fluid bloque-content3 right background_center";
				}

				$article=$articles->_field_data['nid']['entity'];
				$titulo_partes=explode(' ',$articles->_field_data['nid']['entity']->title);				
				if (count($titulo_partes>3)) {
					$titulo_con_estilo=$titulo_partes[0]." ".$titulo_partes[1]." ".$titulo_partes[2];
					$titulo_normal="";
					for ($j=3; $j < count($titulo_partes) ; $j++) { 						
						$titulo_normal.=$titulo_partes[$j]." ";
					}
				}elseif (count($titulo_partes==3)) {
					$titulo_con_estilo=$titulo_partes[0]." ".$titulo_partes[1]." ".$titulo_partes[2];
					$titulo_normal="";
				}else{
					$titulo_con_estilo=$titulo_partes[0];
					$titulo_normal="";
				}
			?>
			

				<section class="<?php print $class  ?>">
		<div class="col-md-6 col-sm-6 col-xs-12 content-img">
			<img class="img-background" src="<?php print file_create_url($articles->_field_data['nid']['entity']->field_imagen_banner['und'][0]['uri'])?>">
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 content-info">
			<div class="box">
				<h2 class="titulo_bloque"><span><?php print $titulo_con_estilo ?></span><?php print $titulo_normal ?></h2>
				<p> <?php print $article->body['und'][0]['value'] ?></p>
				<a href="<?php print url( 'node/'.$article->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('learn more')?></a>
			</div>
		</div>
	</section>
			
			<?php
			$i++;
			}
			?>

	



	
			

		