
  <?php
  global $language; 
  $home="/".$language->language;  
  ?>
  <h1 class="hidden"><?php print $node->title?></h1>
<section class="bloque-404 container-fluid" style="background-image: url(/<?= drupal_get_path('theme', 'weddings') ?>/img/fondo-404.jpg);">
		<img src="/<?= drupal_get_path('theme', 'weddings') ?>/img/fondo-404.jpg" class="img-background">
		<div class="box">
			<div class="text">
				<h2 class="titulo_bloque">404</h2>
				<p> <?php print t('Oops! Seems like the page you’re looking for went for a long romantic walk on the beach.
					') ?>
					<br>
					<?php print t('Let’s get back to planning your dream destination wedding.') ?>
				</p>

				<a href="<?php print $home ?>" class="enlace"><?php print t('KEEP PLANNING')?></a>

					<img src="/<?= drupal_get_path('theme', 'weddings') ?>/img/cuadro.png" class="img-responsive">
			</div>

		</div>
</section>

<?php 
	 $view = views_get_view('view_other_resorts');
  	  $view->set_display('block_3'); 
  	  $view->execute();
  	  print $view->render();
?>
