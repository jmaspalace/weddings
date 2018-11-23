	<?php
global $language;
$home = "/" . $language->language;
?>
<h1 class="hidden"><?php print $node->title ?></h1>
	<section class="bloque-banner container-fluid">
		<a href=""><img src="/<?php print drupal_get_path('theme', 'weddings') ?>/img/logoBrand.png" alt="" class="logo-mobile"></a>
		<picture>
			<source srcset="<?php print file_create_url($node->field_imagen_mobile['und'][0]['uri']) ?>" media="(max-width: 767px)">
			<source srcset="<?php print file_create_url($node->field_imagen_desktop['und'][0]['uri']) ?>">
			<img srcset="<?php print file_create_url($node->field_imagen_desktop['und'][0]['uri']) ?>">
		</picture>
	</section>

	<section class="container-fluid bloque-breadcrumb">
		<div class="container">
			<ul>
				<li><a href="<?php print $home ?>"><?php print t('Home') ?></a></li>
				<li><a href="<?php print url('node/' . $node->nid, array('absolute' => true)); ?>"><?php print $node->title ?></a></li>
			</ul>
		</div>
	</section>


	<section class="container-fluid bloque-intro">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<?php print $node->body['und'][0]['value'] ?>
			</div>
		</div>
	</section>

		<section class="container-fluid bloque-content2">
		<div class="col-md-6 col-sm-6 col-xs-12 content-slider">
		<img src="<?php print file_create_url($node->field_imagen['und'][0]['uri']) ?>" class="img-responsive">
		</div>
		<div class="col-md-5 col-sm-6 col-xs-12 content-bloque">
			<?php
		$titulo_intro = explode(" ", $node->field_titulo['und'][0]['value']);
		?>
			<h2 class="titulo_bloque"><span><?php print $titulo_intro[0] . " " . $titulo_intro[1] ?></span> <?php print $titulo_intro[2] . " " . $titulo_intro[3] ?></h2>
			<?php print $node->field_descripcion_larga['und'][0]['value'] ?>
		</div>
	</section>


	<section class="container-fluid bloque-img-background bloque-cuisine">
		<img class="img-background" src="<?php print file_create_url($node->field_imagen_view['und'][0]['uri']) ?>">
		<div class="content-info container">
			<div class="col-md-6 col-sm-6 col-xs-12">
			<?php
		$titulo_fondo = explode(" ", $node->field_descripcion['und'][0]['value']);
		?>
				<h2><span><?php print $titulo_fondo[0] ?></span><?php print $titulo_fondo[1] . " " . $titulo_fondo[2] ?></h2>
				<p><?php print $node->field_descripcion_corta['und'][0]['value'] ?></p>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 list">
				<?php
			print $node->field_listado['und'][0]['value'];
			?>
			</div>
		</div>
	</section>

	<?php
if (!empty($node->field_other_collections_image['und'][0]['uri']) && !empty($node->field_titulo_corto['und'][0]['value']) && !empty($node->field_disponible['und'][0]['value'])) {
	?>

	<section class="container-fluid bloque-content2 right">
		<div class="col-md-6 col-sm-6 col-xs-12 content-slider">
			<img src="<?php print file_create_url($node->field_other_collections_image['und'][0]['uri']) ?>" class="img-responsive">
		</div>
		<div class="col-md-5 col-sm-6 col-xs-12 content-bloque">
			<?php
		$titulo = explode(" ", $node->field_titulo_corto['und'][0]['value']);
		$titulo_especial = $titulo[0] . " " . $titulo[1];
		$titulo_normal = "";
		for ($i = 2; $i < count($titulo); $i++) {
			$titulo_normal .= " " . $titulo[$i];
		}
		?>
			<h2 class="titulo_bloque"><span><?php print $titulo_especial ?></span> <?php print $titulo_normal ?></h2>

			<?php print $node->field_disponible['und'][0]['value'] ?>
			<?php
		if (!empty($node->field_precios['und'][0]['value'])) {

			$precios = explode("-", $node->field_precios['und'][0]['value']);
			$lugares = explode("-", $node->field_lugares['und'][0]['value']);
			for ($i = 0; $i < count($precios); $i++) {
				?>
			<p class="price small"><span><?php print $lugares[$i] ?></span><?php print $precios[$i] ?></p>
				<?php

		}
	}
	?>
		</div>
	</section>
	<?php

} ?>

	<section class="container-fluid bloque-indian-gallery null-margin">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<img src="<?php print file_create_url($node->field_image['und'][0]['uri']) ?>" class="img-responsive">
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="grid">
						<?php
					foreach ($node->field_imagenes_previsualizacion['und'] as $item) {
						$field_collection = entity_load('field_collection_item', array($item['value']));
						foreach ($field_collection as $imagenes) {
							?>
					<div class="grid-item">
										<a data-fancybox="group" href="<?php print file_create_url($imagenes->field_imagen_desktop['und'][0]['uri']) ?>" >
											<div class="play"></div>
											<img src="<?php print file_create_url($imagenes->field_imagen_mobile['und'][0]['uri']) ?>">
										</a>
					</div>

					<?php

			}
		}
		?>

			</div>
		</div>
	</section>
	<?php
$view = views_get_view('view_other_resorts');
$view->set_display('block_3');
$view->execute();
print $view->render();

?>