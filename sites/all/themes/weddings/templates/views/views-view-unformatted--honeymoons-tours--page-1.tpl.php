<section class="bloque-tabs container-fluid no-margin">
	<header>
		<ul>
			<li class="active" data-media="tab1" id="discover"><?php print t("DISCOVER ADVENTURE") ?></li>
			<li data-media="tab2" id="escape"><?php print t("ESCAPE AND RELAX"); ?></li>
			<li data-media="tab3" id="explore"><?php print t("EXPLORE CULTURE") ?></li>
		  </ul>
	</header>
	<div class="container-tabs">
		<div class="tab1 active">
	 		<?php echo views_embed_view('honeymoons_tours', $display_id = 'block'); ?>
		</div>
		<div class="tab2">
	 		<?php echo views_embed_view('honeymoons_tours', $display_id = 'block_1'); ?>
	 	</div>
	 	<div class="tab3">
	 		<?php echo views_embed_view('honeymoons_tours', $display_id = 'block_2'); ?>
	 	</div>
	</div>
</section>