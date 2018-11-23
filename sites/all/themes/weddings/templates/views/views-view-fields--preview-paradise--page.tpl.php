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

$img_url1 = strip_tags($fields['field_imagen']->content);
$img_url2 = strip_tags($fields['field_image']->content);
$counter = strip_tags($fields['counter']->content);

// $resort_prices = explode('_',strip_tags($fields['field_resort_price']->content));

$class = "";
if ($counter == 1) {
  $class = " active";
}

if (isset($_GET["thanks"])) {
  $class = "";
  if ((strtolower($_GET["thanks"]) == 'mexico' &&
    strip_tags($fields['field_resort']->content) == 1) || (strtolower($_GET["thanks"]) == 'jamaica' &&
    strip_tags($fields['field_resort']->content) == 2)) {
    $class = " active";
  }
}
?>
<div class="tab<?php print($counter . $class) ?>">
  <section class="container-fluid bloque-content2 right">
    <div class="col-md-6 col-sm-6 col-xs-12 content-slider">
      <img src="<?php print $img_url1 ?>" class="img-responsive">
    </div>
    <div class="col-md-5 col-sm-6 col-xs-12 content-bloque">
      <p><?php print $fields['field_descripcion_larga']->content ?></p>
    </div>
  </section>

  <section class="container-fluid bloque-content2">
    <div class="col-md-6 col-sm-6 col-xs-12 content-slider">
      <img src="<?php print $img_url2 ?>" class="img-responsive">
    </div>
    <div class="col-md-5 col-sm-6 col-xs-12 content-bloque">
      <h2 class="titulo_bloque"><?php print $fields['field_titulo']->content ?></h2>
      <?php
      print $fields['field_listado']->content;
      ?>
    </div>
  </section>
  <br>
  <section class="bloque-terminos">
    <div class="container">
      <h4 class="titulo_terms"><?php print t('Terms & Conditions:') ?></h4>
      <p><small>
      <?php
      print $fields['field_disponible']->content;
      ?>
      </small></p>
    </div>
  </section>
  <br><br>
    <?php
    global $language;
    if ($fields['field_resort']->content == 1 || $fields['field_resort']->content == 133) {
      if (isset($_GET['thanks']) && $_GET['thanks'] == 'mexico') {
        ?>
          <section class="container-fluido confirm-thanks">
            <div class="container">
              <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;">
                <h2 class="titulo_bloque text-center"><?php print $fields['field_titulo_corto']->content ?></h2>
                <p class="text-center"><?php print $fields['field_description']->content ?></p>
              </div>
    <?php
    $view = views_get_view('view_resorts_and_offers');
    $view->set_display('block');
    $view->execute();
    print $view->render();
    ?>
            </div>
          </section>
    <?php

  } else {
    ?>
          <section class="container-fluid bloque-form">
            <div class="container">
              <h2 class="titulo_bloque text-center"><?php print $fields['field_descripcion_corta']->content ?></h2>
    <?php
    if ($language->language == "en") {
      $block = module_invoke('webform', 'block_view', 'client-block-183');
    } else {
      $block = module_invoke('webform', 'block_view', 'client-block-294');
    }
    print render($block['content']);
    ?>
            </div>
          </section>
    <?php

  }
} else {
  if (isset($_GET['thanks']) && $_GET['thanks'] === 'jamaica') {
    ?>
          <section class="container-fluido confirm-thanks">
            <div class="container">
              <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;">
                <h2 class="titulo_bloque text-center"><?php print $fields['field_titulo_corto']->content ?></h2>
                <p class="text-center"><?php print $fields['field_description']->content ?></p>
              </div>
    <?php
    $view = views_get_view('view_resorts_and_offers');
    $view->set_display('block');
    $view->execute();
    print $view->render();
    ?>
            </div>
          </section>
    <?php

  } else {
    ?>
          <section class="container-fluid bloque-form">
            <div class="container">
              <h2 class="titulo_bloque text-center"><?php print $fields['field_descripcion_corta']->content ?></h2>
    <?php
    if ($language->language == "en") {
      $block = module_invoke('webform', 'block_view', 'client-block-186');
    } else {
      $block = module_invoke('webform', 'block_view', 'client-block-295');
    }
    print render($block['content']);
    ?>
            </div>
          </section>
    <?php

  }
}
?>
</div>
