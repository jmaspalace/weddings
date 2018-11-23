	<?php 
	$item=$view->result;	
	?>

	<section class="container-fluid bloque-real-gallery">
		<div class="container">
			<ul>
			<?php 
			foreach ($item as $wedding) {
			$wedding_item=$wedding->_field_data['nid']['entity'];

			?>

			<li>
					<a href="<?php print url( 'node/'.$wedding_item->nid, array('absolute' => true)); ?>">
						<img src="<?php print file_create_url($wedding_item->field_imagen_view['und'][0]['uri']) ?>" class="img-responsive">
						<h3 class="name-gallery"><?php print $wedding_item->title ?></h3>
					</a>
				</li>	
			
			<?php
			}
			?>

		</ul>
	</div>
</section>
	

	
			

		