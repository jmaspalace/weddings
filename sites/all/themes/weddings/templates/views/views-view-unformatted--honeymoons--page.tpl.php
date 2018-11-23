<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<section class="bloque-tabs container-fluid no-margin">
	<?php echo views_embed_view('honeymoons', $display_id = 'block_1'); ?>
	<div class="container-tabs">
		<?php foreach ($rows as $id => $row): ?>
			<?php print $row; ?>
		<?php endforeach; ?>
	</div>
</section>
<?php //echo views_embed_view('honey_moon_banners', $display_id = 'block'); ?>
<section class="container-fluid bloque-local-measure">
	<div class="container">
		<h2><?php print t('happening now'); ?></h2>
		<div id="widget-6c600c1f8ff1bd48549abd20bf02e85c2bcbf7c812dbbbd7e4bfe26a1e8b" data-lmwidget="6c600c1f8ff1bd48549abd20bf02e85c2bcbf7c812dbbbd7e4bfe26a1e8b"></div>
	</div>
</section>
<script src="https://cdn.getlocalmeasure.com/embed/widgets.js" data-cfasync="false"></script>


