<h1 class="hidden"><?php print $node->title?></h1>
<section class="container-fluid bloque-intro">
	<div class="container">
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
			<h2 class="titulo_bloque"><?php print $node->title?></h2>
			<div class="separador"></div>
			<p><?php print $node->field_description['und'][0]['value'] ?></p>
		</div>
	</div>
</section>