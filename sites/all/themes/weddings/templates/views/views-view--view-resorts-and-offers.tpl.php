	<div class="row">
		<?php 
		foreach ($view->result as $item) {	
		$titulo=explode(" ", $item->_field_data['nid']['entity']->title);
		if (count($titulo)>1) {
			$titulo_especial='<span>'.$titulo[0].'</span>';
			for ($i=1; $i < count($titulo); $i++) { 
				$titulo_especial.=$titulo[$i]." ";
			}
		}else{
			$titulo_especial=$titulo[0];
		}
		?>

				<div class="col-md-6 col-sm-6 col-xs-12 section-info">
					<div class="col-md-7 col-sm-7 col-xs-12">
						<img src="<?php print file_create_url($item->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>" class="img-responsive">

					</div>
					<div class="col-md-5 col-sm-5 col-xs-12">
						<h2><?php print $titulo_especial ?></h2>
					<a href="<?php print url( 'node/'.$item->_field_data['nid']['entity']->nid, array('absolute' => true)); ?>" class="enlace"><?php print t('view more')?></a>

					</div>
				</div>
			<?php 
		}
			?>
	

				
			</div>