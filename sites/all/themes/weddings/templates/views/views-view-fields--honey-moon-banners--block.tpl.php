<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
	$img_url = strip_tags($fields['field_imagen_banner']->content);
	$counter = strip_tags($fields['counter']->content);
	$class = "right";
?>
<?php if($counter%2==0):?>
	<?php $class = ""?>
<?php endif;?>


<section class="container-fluid bloque-content3 <?php print $class?> background_center no-margin">
	<div class="col-md-6 col-sm-6 col-xs-12 content-img" style="background-image: url(<?php print $img_url;?>);">
		<img class="img-background" src="<?php print $img_url;?>">
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12 content-info">
		<div class="box">
			<h2 class="titulo_bloque"><span><?php print strip_tags($fields['title']->content)?></span><?php print strip_tags($fields['field_subtitle']->content)?></h2>
			<p> <?php print strip_tags($fields['field_description']->content)?></p>
			<a href = "<?php print strip_tags($fields['field_link']->content)?>" class="enlace"><?php print t('learn more') ?></a>
		</div>
	</div>
</section>