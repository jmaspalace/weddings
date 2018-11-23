<?php
global $language;
if ($language->language == "es") {
  $home = "/es";
  $url = "/es/ofertas/conoce-el-paraiso";
} else {
  $home = "/en";
  $url = "/en/offers/preview-paradise";
}

/*$translations = translation_node_get_translations(82);
$node = node_load($translations[$language->language]->nid);
$view = node_view($node, 'teaser');
print drupal_render($view);*/
print views_embed_view('preview_paradise', 'block_banner');
?>
 <section class="container-fluid bloque-breadcrumb">
        <div class="container">
          <ul>
            <li><a href="<?php print $home ?>"><?php print t('Home') ?></a></li>
            <li><a href="<?php print $url ?>"><?php print t('Preview Paradise') ?></a></li>
          </ul>
        </div>
     </section>

  <?php print render($title_prefix); ?>
  <?php if ($title) : ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header) : ?>
    <?php print $header; ?>
  <?php endif; ?>

  <?php if ($exposed) : ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before) : ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows) : ?>

      <?php print $rows; ?>

  <?php elseif ($empty) : ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager) : ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after) : ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more) : ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer) : ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon) : ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

<?php /* class view */ ?>