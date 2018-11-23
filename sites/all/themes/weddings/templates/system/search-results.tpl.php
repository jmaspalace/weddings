<?php

/**
 * @file
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependent to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 *
 * @ingroup themeable
 */
?>
<?php 
$node=node_load(133);
?>
	<?php 
	global $language;
	if($language->language=="es"){
		$home="/es";
	}else{
		$home="/en";
	}

	?>

	<section class="bloque-banner container-fluid">
		<a href=""><img src="<?php print base_path().drupal_get_path('theme','weddings')?>/img/logoBrand.png" alt="" class="logo-mobile"></a>
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
<section class="container-fluid bloque-form">
<?php if ($search_results): ?>
		<section id="search-block">
			
		</section>
  <h2><?php print t('Search results');?></h2>
  <ol class="search-results <?php print $module; ?>-results">
  	<?php 
  	$search_results=html_entity_decode($search_results);
  	print str_replace("<br>", "", $search_results);
  	?>
  	<hr>

    
  </ol>
  <?php print $pager; ?>
<?php else : ?>
  <h2><?php print t('Your search yielded no results');?></h2>
  <?php print search_help('search#noresults', drupal_help_arg()); ?>
<?php endif; ?>
  </section>

<script type="text/javascript">
	jQuery('#search-form').appendTo('#search-block');
</script>
