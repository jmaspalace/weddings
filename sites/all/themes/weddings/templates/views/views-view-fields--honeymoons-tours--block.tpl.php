<?php
	$img_url = strip_tags($fields['field_imagen_banner']->content);
?>

<div class="col-md-6 col-sm-6 col-xs-12 content-slider">
	<img src="<?php print $img_url?>" class="img-responsive">
</div>
<div class="col-md-5 col-sm-6 col-xs-12 content-bloque">
	<h2 class="titulo_bloque"><?php print strip_tags($fields['title']->content)?></h2>
<?php print strip_tags($fields['field_description']->content,'<p>')?>
	<hr>
	<p class="small"><span class="vino_tinto"><?php print t("Available at:")?></span><?php print strip_tags($fields['field_resorts']->content,'<a>')?></p>
</div>	