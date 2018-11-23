<?php
/**
 * Available variables:
 *
 * - $account : Drupal user objetc.
 */
?>
<input type="hidden" id="url_requestform" value="<?php print $GLOBALS['base_url']; ?>/requestform/">
<div class="row" id="download">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 dl-title">
                <h1><?php print t('Call Center Service tools') ?></h1>
                <p><?php print t('On the following menu you will find easy access to key marketing and sales materials to facilitate customer support') ?></p>
                <p>
                    <span>1)</span>
                    <?php print t('Choose the topic on the menu') ?>
                    <span>2)</span>
                    <?php print t('Open the document for review') ?>
                    <span>3)</span> <?php print t('Share the url with your customer.') ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 dl-seller">
                <select id="mail_seller">
                    <option value="">Select Seller</option>
                    <?php if ($sellers !== FALSE): ?>
                      <?php foreach ($sellers as $k => $val): ?>
                        <option value="<?= $val->id_download_seller ?>"><?= $val->name ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div id="download_content" class="row">
            <div id="download-slider" class="owl-carousel">
                <?php if ($downloads !== FALSE): ?>
                  <?php foreach ($downloads as $key => $value): ?>
                    <?php $image = file_load($value->id_img); ?>
                    <?php $img_url = $image->uri; ?>
                    <?php $file = file_load($value->id_pdf); ?>
                    <?php $uri = $file->uri; ?>
                        <div class="item">
                            <img src="<?= file_create_url($img_url); ?>" alt="" class="img-responsive">
                            <p class="text"><?php print t('Copy URL for') ?> <span>PDF</span> <?php print t('Download') ?></p>
                            <input onclick="this.focus();this.select()" type="text" value="<?= file_create_url($uri); ?>">
                        </div>
              <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="dl-line"></div>
        <div class="row dl-tags">
            <?php if ($tags !== FALSE): ?>
              <?php foreach ($tags as $k_tag => $val_tag): ?>
                    <div class="dl-tag col-md-4 col-sm-6">
                      <?= l(t($val_tag->tag), 'ajax_link_callback/nojs/'.$val_tag->id_download_pdf_tag, array('attributes' => array('class' => array('use-ajax')))); ?>
                    </div>
              <?php endforeach;  ?>
            <?php endif; ?>
            <!-- <div class="dl-tag col-md-4 col-sm-6"><a href="#">FAQ</a></div> -->
            <div class="dl-tag col-md-4 col-sm-6">
                <a href="<?= url('downloadpdf/contact_agency', array('absolute' => true)); ?>"><?php print t('Contact Agency') ?></a>
            </div>
            <div class="dl-tag col-md-4 col-sm-6">
                <a id="link_rf" href="<?= url('requestform', array('absolute' => true)) ?>"><?php print t('Wedding Request Form') ?></a>
            </div>
            <!--<div class="dl-tag col-md-4 col-sm-6"><a id="link_sirf" href="siteinspectionrequestform/">Site Inspection Request Form</a></div>-->
        </div>
    </div>
</div>