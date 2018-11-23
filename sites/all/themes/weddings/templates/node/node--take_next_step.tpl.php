<?php

global $language;
$home="/".$language->language;

if($language->language=='en')
{
    $meta_url = 'http://weddings.palaceresorts.com/en/share-the-love';
    $meta_title = 'Share the Love';
    $meta_desc = 'Hey! I just referred you to take a look at your dream wedding LEARN MORE';
    $meta_image = 'https://weddings.palaceresorts.com/sites/all/themes/weddings/img/Offers/hare_the_love/FB.jpg';
}
else
{
	$meta_url = 'http://weddings.palaceresorts.com/es/share-the-love-es';
	$meta_title = 'Share the Love';
	$meta_desc = 'Hey! I just referred you to take a look at your dream wedding LEARN MORE';
	$meta_image = 'https://weddings.palaceresorts.com/sites/all/themes/weddings/img/Offers/hare_the_love/FB.jpg';
}

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:url',
		'content' => $meta_url,
	),
);
drupal_add_html_head($element, 'og_url');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:type',
		'content' => 'website',
	),
);
drupal_add_html_head($element, 'og_type');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:title',
		'content' => $meta_title,
	),
);
drupal_add_html_head($element, 'og_title');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:description',
		'content' => $meta_desc,
	),
);
drupal_add_html_head($element, 'og_description');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:image',
		'content' => $meta_image,
	),
);
drupal_add_html_head($element, 'og_image');

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
				<h2><?php print $node->field_titulo['und'][0]['value']?></h2>
				<div class="separador"></div>
				<p><?php print $node->body['und'][0]['value']?></p>
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
					$block = module_invoke('webform', 'block_view', 'client-block-129');
				}else{
					$block = module_invoke('webform', 'block_view', 'client-block-290');
				}
						
						print render($block['content']);
					?>
		</div>
</section>
<?php
}else{
 ?>

<section class="container-fluido confirm-thanks">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;">
				<h2 class="titulo_bloque text-center"><?php print $node->field_titulo_corto['und'][0]['value'] ?></h2>
				<p class="text-center"><?php print $node->field_descripcion_larga['und'][0]['value'] ?></p>
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


	
