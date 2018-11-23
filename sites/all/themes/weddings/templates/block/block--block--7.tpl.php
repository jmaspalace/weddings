<?php 
global $language;
 $home="/".$language->language;
?>
<header class='header'>
    <div class="container-header">
      <div class="col-md-1 col-sm-1 col-xs-6">
        <a href="<?php print $home ?>" class="logo-desktop"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/logoBrand.png" alt="" class="img-responsive logo-weddings"></a>
      </div>
      <div class="col-md-11 col-sm-11 col-xs-6 content-menu">
        <div class="icon-menu"></div>
        <div class="menu-superior">
          <ul>
            <li>
              <div class="dropdown dropdown-tels">
                <div data-toggle="dropdown">
                  <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-tel.png" alt=""> <?php print $phone ?>
                  <span class="caret"></span>
                </div>
                <ul class="dropdown-menu">
                  <?php 
                    $phones = menu_tree_all_data( "menu-phones");
                      foreach( $phones as $menu1 ){             
                        $child = $menu1[ "link" ];    
                        $link=explode(":", $child['link_title']);                        
                        $titulo=$link[0];
                        $numero=$link[1];
                        ?>
                        <li><span><?php print t($titulo); ?>:</span> <?php print $numero ?> </li>
                        <?php
                      }
                  ?>                
                </ul>
              </div>
            </li>
            <li>
              <div class="dropdown dropdown-idioma">
                <div data-toggle="dropdown">
                  ENG
                  <span class="caret"></span>
                </div>
                <ul class="dropdown-menu">
                  <li><a href="/en">ENG</a></li>
                  <li><a href="/es">ESP</a></li>
                </ul>
              </div>
            </li>
            <li>
              <div class="search_desktop"></div>
              <div class="search_input">
                <form class="search_form" action="/search/node/" id="buscadorSite">
                  <input id="parametro_search" type="text" name="" placeholder="<?php print t('Search')?>">
                  <input type="submit"  id="btnBuscadorMobile" value="">
                </form>
                 <script type="text/javascript">
          jQuery('#buscadorSite').submit(function( event ) {
            var valor=jQuery('#parametro_search').val();
            window.location.href = '/search/node/'+valor;
            event.preventDefault();
          });

        </script>
                <div class="close">x</div>
              </div>
            </li>
          </ul>
        </div>
        <nav>
          <div class="close-back"></div>
          <div class="container-nav">
            <div class="close" id="closeMenu">x</div>
            <ul class="menu">
               <?php 
          global $language;
           if ($language->language=="en") {
            $menu = menu_tree_all_data( "menu-menu-principal");
          }else{
            $menu = menu_tree_all_data( "menu-menu-principal-espanol");
          }
          
          foreach( $menu as $menu1 ){             
            $child = $menu1[ "link" ];              
            if (!empty($child['options']['content'])) {
            $file = file_load($child['options']['content']['image']);
            $uri = $file->uri;
            $url_image = file_create_url($uri);          
            }else{
              $url_image="";
            }
            $li="";
              if (!empty($menu1['below'])) {
                $li="class='down'";
              }
            
            ?>
            <li <?php print $li ?> >
              <a href="<?php print url(drupal_get_path_alias($child['href'])) ?>"><?php print $child['link_title']?></a>
               <?php
                      $i=1;
                      if (!empty($menu1['below'])) {
                        ?>
                <div class="submenu">
                  <div class="triangulo"></div>
                  <div class="container">
                    <?php
                    $j=1;
                       foreach ($menu1['below'] as $menu2) {
                                if (!empty($menu2['below'])) {
                              foreach ($menu2['below'] as $menu3) {
                                $j++;
                                }
                              }
                        $j++;
                       }                       

                    if ($j<=7) {
                      $columnas="col-md-3 col-md-offset-2 col-sm-3 col-sm-offset-2 col-xs-12";
                    }else{
                      $columnas="col-md-3 col-sm-3 col-xs-12";
                      if ($j%2!=0) {
                        $j++;
                      }
                    }

                    ?>
                    <div class="<?php print $columnas  ?>">
                      <ul class="bloque-submenu">
                     <?php
                        
                      
                        foreach ($menu1['below'] as $menu2) {
                          $children=$menu2['link'];     
                            if (empty($menu2['below']) && $j>7) {
                              if ($i==(($j/2)+1)) {
                                ?>
                                  </ul>
                            </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                          <ul class="bloque-submenu">
                                <?php
                              }
                            }else{


                          if ($i>7 && $j) {
                            $i=1;
                            ?>
                            </ul>
                            </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                          <ul class="bloque-submenu">
                            <?php
                          }
                          }

                          ?>
                        <li>
                        <a href="<?php print url(drupal_get_path_alias($children['href'])) ?>"><?php print $children['link_title']?></a>
                        <?php 
                        if (!empty($menu2['below'])) {
                          ?>
                          <ul>
                            <?php 
                            if (!empty($menu2['below'])) {
                            foreach ($menu2['below'] as $menu3) {
                              $children=$menu3['link'];
                              ?>
                              <li><a href="<?php print url(drupal_get_path_alias($children['href'])) ?>"><?php print $children['link_title']?></a></li>
                              <?php
                              $i++;
                            }
                              }
                            ?>
                          </ul>

                          <?php
                        }
                        ?>
                        </li>
                          <?php
                          $i++;
                        }
                      

                      ?>

                        </ul>
                    </div>
               
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <img src="<?php print $url_image ?>" class="img-responsive">
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>
              </li>
          
                
                <?php 
              }
              ?>
            </ul>
            <?php             
              $takeStep=variable_get('url-boton-'.$language->language);                        
            ?>
            <a href="<?php print $takeStep ?>" class="enlace enlace_next_step"><?php print t('Take the next step')?></a>
            <div class="menu-redes">
              <ul>
                <li><a target="_blank" href="<?php print variable_get('url-instagram') ?>"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-instagram.png"></a></li>
              <li><a target="_blank" href="<?php print variable_get('url-pinterest') ?>"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-pinterest.png"></a></li>
              <li><a target="_blank" href="<?php print variable_get('url-facebook') ?>"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-facebook.png"></a></li>
              <li><a target="_blank" href="<?php print variable_get('url-youtube') ?>"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-youtube.png"></a></li>
              <li><a target="_blank" href="<?php print variable_get('url-twitter') ?>"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-twitter.png"></a></li>
              </ul>
              <select onChange="window.location.href=this.value">
                 <option value="/en">ENG</option>
                <option value="/es">ESP</option>
                <option value="/pt">PT</option>
            </select>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>