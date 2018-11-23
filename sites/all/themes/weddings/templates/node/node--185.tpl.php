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
	

<section class="container-fluid bloque-text">
		<div class="container">
			<?php 
			$elements = drupal_get_form("user_login"); 
			$form = drupal_render($elements);
			echo $form;
			?>
		</div>
	</section>


	