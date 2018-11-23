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
	$img_url = strip_tags($fields['field_image']->content);
	$counter = strip_tags($fields['counter']->content);
	$resort_prices = explode('_',strip_tags($fields['field_resort_price']->content));
?>
<?php if($counter==1):?>
<div class="tab<?php print $counter ?> active">
<?php endif;?>
<?php if($counter!=1):?>
<div class="tab<?php print $counter ?>">
<?php endif;?>
	<section class="container-fluid bloque-content2 no-margin">
		<div class="col-md-6 col-sm-6 col-xs-12 content-slider">
			<img src="<?php print $img_url ?>" class="img-responsive">
		</div>
		<div class="col-md-5 col-sm-6 col-xs-12 content-bloque">
			<?php echo ($fields['field_includes']->content); ?>
			<hr>
			<?php echo ($fields['field_description']->content); ?>
			<?php foreach($resort_prices as $resort_price):?>
				<?php
					$detect=strpos($resort_price, '$');	
				if ($detect !== false) {
					$resort = explode('$',$resort_price);
					$before="$";
				}else{
					$resort = explode('Min.', $resort_price);
					$before="Min. ";
				}
				?>
				<p class="price small vino_tinto"><span><?php print $resort[0]; ?></span><?php print $before.$resort[1]; ?></p>	
			<?php endforeach;?>
			<br>
			<a class="enlace" target="_blank" href="<?php print strip_tags($fields['field_link_book']->content)?>"><?php print t('Book Now')?></a>
		</div>
	</section>
</div>
