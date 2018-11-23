
<?php
 $desktop = file_create_url($node->field_imagen_banner['und'][0]['uri']);
 $mobile = file_create_url($node->field_imagen_mobile['und'][0]['uri']);
 ?>
 <h1 class="hidden"><?php print $node->title?></h1>
<section class="bloque-banner container-fluid">
		<a href=""><img src="/<?php print drupal_get_path('theme','weddings')?>/img/logoBrand.png" alt="" class="logo-mobile"></a>
	<picture>
		<source srcset="<?php print $mobile?>" media="(max-width: 767px)">
		<source srcset="<?php print $desktop?>">
		<img srcset="<?php print $desktop?>">
	</picture>

    <?php
        $block = module_invoke('booking', 'block_view', 'weddings_booking');
        print render($block['content']);
    ?>
</section>
