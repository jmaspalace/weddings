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




<section class="container-fluid bloque-accordion">
		<div class="container">
			<div class="panel-group" id="accordion">

				<?php
				$i=1;
				
	foreach ($node->field_tabs['und'] as $item) {		
				$field_collection = entity_load('field_collection_item', array($item['value']));
				foreach ($field_collection as $steps) {
					$aria=false;
					$collapse='class="collapsed"';
					$collapse_div="";
					if ($i==1) {
						$aria=true;
						$collapse="";
						$collapse_div="in";
					}
					?>
					 <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a class="faq-acordeon" data-toggle="collapse" data-parent="#accordion" <?php print $collapse ?> href="#collapse<?php print $i?>" aria-expanded="<?php print $aria?>">
					<?php print $steps->field_titulo['und'][0]['value'] ?> </a>
				  </h4>
				</div>
				<div id="collapse<?php print $i?>" class="panel-collapse collapse <?php print $collapse_div ?>">
				  <div class="panel-body">
				  		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
					  		<?php print $steps->field_listado['und'][0]['value'] ?>
				  		</div>
				  </div>
				</div>
			  </div>

					<?php
				}
$i++;
}
?>			 
				 

			</div>

			
		</div>
	</section>
