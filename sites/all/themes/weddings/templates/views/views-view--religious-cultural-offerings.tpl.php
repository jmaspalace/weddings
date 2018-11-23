
<section class="container-fluid bloque-over only_desktop">
		<h2 class="titulo_bloque"><span><?php print t('religious &') ?></span> <?php print t('cultural offerings') ?></h2>
		<div class="container">
			<div class="col-md-8 col-sm-8 col-xs-12 section1">

				<div class="col-md-12 col-sm-12 col-xs-12 section section2">
					<div class="fondo-gallery">
					<img src="<?php print file_create_url($view->result[0]->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>" class="img-responsive">
					</div>
					<div class='content-gallery-overblack'>
						<div class="content-info">
							<?php 
							$titulo_completo=$view->result[0]->_field_data['nid']['entity']->title;
							$titulo_partes=explode(" ",$titulo_completo);
							$titulo_especial=$titulo_partes[0];
							$titulo_normal="";
							for ($i=1; $i < count($titulo_partes) ; $i++) { 
								$titulo_normal.=" ".$titulo_partes[$i];
							}
							?>
							<h2 class="titulo_bloque"><span><?php print $titulo_especial ?></span> <?php print $titulo_normal ?></h2>
						<a href="<?php print $view->result[0]->_field_data['nid']['entity']->field_destino_boton['und'][0]['url'] ?>" class='enlace'><?php print $view->result[0]->_field_data['nid']['entity']->field_destino_boton['und'][0]['title'] ?></a>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-sm-6 col-xs-12 section section2">
					<div class="fondo-gallery">
					<img src="<?php print file_create_url($view->result[1]->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>" class="img-responsive">
					</div>
					<div class='content-gallery-overblack'>
						<div class="content-info">
							<?php 
							$titulo_completo=$view->result[1]->_field_data['nid']['entity']->title;
							$titulo_partes=explode(" ",$titulo_completo);
							$titulo_especial=$titulo_partes[0];
							$titulo_normal="";
							for ($i=1; $i < count($titulo_partes) ; $i++) { 
								$titulo_normal.=" ".$titulo_partes[$i];
							}
							?>
							<h2 class="titulo_bloque"><span><?php print $titulo_especial ?></span> <?php print $titulo_normal ?></h2>
						<a href="<?php print $view->result[1]->_field_data['nid']['entity']->field_destino_boton['und'][0]['url'] ?>" class='enlace'><?php print $view->result[1]->_field_data['nid']['entity']->field_destino_boton['und'][0]['title'] ?></a>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-sm-6 col-xs-12 section section2">
					<div class="fondo-gallery">
					<img src="<?php print file_create_url($view->result[2]->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>" class="img-responsive">
					</div>
					<div class='content-gallery-overblack'>
						<div class="content-info">
							<?php 
							$titulo_completo=$view->result[2]->_field_data['nid']['entity']->title;
							$titulo_partes=explode(" ",$titulo_completo);
							$titulo_especial=$titulo_partes[0];
							$titulo_normal="";
							for ($i=1; $i < count($titulo_partes) ; $i++) { 
								$titulo_normal.=" ".$titulo_partes[$i];
							}
							?>
							<h2 class="titulo_bloque"><span><?php print $titulo_especial ?></span> <?php print $titulo_normal ?></h2>
						<a href="<?php print $view->result[2]->_field_data['nid']['entity']->field_destino_boton['und'][0]['url'] ?>" class='enlace'><?php print $view->result[2]->_field_data['nid']['entity']->field_destino_boton['und'][0]['title'] ?></a>
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 section section1">
				<div class="fondo-gallery">
					<img src="<?php print file_create_url($view->result[3]->_field_data['nid']['entity']->field_imagen_view['und'][0]['uri'])?>" class="img-responsive">
				</div>
				<div class='content-gallery-overblack'>
					<div class="content-info">
						<?php 
							$titulo_completo=$view->result[3]->_field_data['nid']['entity']->title;
							$titulo_partes=explode(" ",$titulo_completo);
							$titulo_especial=$titulo_partes[0];
							$titulo_normal="";
							for ($i=1; $i < count($titulo_partes) ; $i++) { 
								$titulo_normal.=" ".$titulo_partes[$i];
							}
							?>
							<h2 class="titulo_bloque"><span><?php print $titulo_especial ?></span> <?php print $titulo_normal ?></h2>
						<a href="<?php print $view->result[3]->_field_data['nid']['entity']->field_destino_boton['und'][0]['url'] ?>" class='enlace'><?php print $view->result[3]->_field_data['nid']['entity']->field_destino_boton['und'][0]['title'] ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container-fluid bloque-over only_mobile">
		<h2 class="titulo_bloque"><span><?php print t('religious &') ?></span> <?php print t('cultural offerings') ?></h2>
		<div class="container">
			<ul class="owl-carousel owl-theme">								
		<?php 
		foreach ($view->result as $item) {	
			?>
				<li>
					<div class="content-info">
						<h2 class="titulo_bloque"><?php print $item->_field_data['nid']['entity']->title?></h2>
						<a href="<?php print $item->_field_data['nid']['entity']->field_destino_boton['und'][0]['url'] ?>" class='enlace'><?php print $item->_field_data['nid']['entity']->field_destino_boton['und'][0]['title'] ?></a>
					</div>
					<img src="<?php print file_create_url($item->_field_data['nid']['entity']->field_image['und'][0]['uri'])?>" class="img-responsive">
				</li>
			
			<?php 
		}
		?>
</ul>

		</div>
	</section>


	