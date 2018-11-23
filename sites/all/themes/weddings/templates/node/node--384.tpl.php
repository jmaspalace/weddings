
	<?php 
	global $language;
	$home="/".$language->language;  
	?>	
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


<section class="container-fluid bloque-mapa">
		<div class="container">
			<h1><?php print $node->title ?></h1>
			<?php 
			global $language;
          if ($language->language=="en") {
            $menu = menu_tree_all_data( "menu-menu-principal");
          }else{
            $menu = menu_tree_all_data( "menu-menu-principal-espanol");
          }     
          foreach( $menu as $menu1 ){             
            $child = $menu1[ "link" ];                                          
            ?>
            <div class="row">
				<div class="col-12">
					<h2><a href="<?php print url(drupal_get_path_alias($child['href'])) ?>"><?php print $child['link_title']?></a></h2>

               <?php
                      $i=1;
                      if (!empty($menu1['below'])) {                        
                        foreach ($menu1['below'] as $menu2) {
                          $children=$menu2['link'];                                 
                          ?>
                          <ul class="subtitulo">
                        	<li>
                        	<a href="<?php print url(drupal_get_path_alias($children['href'])) ?>"><?php print $children['link_title']?></a>
                        <?php 
                        if (!empty($menu2['below'])) {
                          ?>
                          
                            <?php 
                            if (!empty($menu2['below'])) {
                            	?>
                            	<ul class="items">
                            	<?php
                            foreach ($menu2['below'] as $menu3) {
                              $children=$menu3['link'];
                              ?>
                              <li><a href="<?php print url(drupal_get_path_alias($children['href'])) ?>"><?php print $children['link_title']?></a></li>
                              <?php
                            }
                            ?>
                            	</ul>
                            <?php
                              }
                            ?>
                          

                          <?php
                        }
                        ?>
                        </li>
                        </ul>
                          <?php
                        }
                      

                      ?>


                    

                <?php
              }
              ?>
              </div>
          	  </div>
          
                
                <?php 
              }
			?>
			
		</div>
	</section>

	