<?php
/**
 * Available variables:
 *
 * - $account : Drupal user objetc.
 */
?>
<div class="row" id="download">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 dl-title">
        <h1>FAQ</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
     </div>

    <div class="row-faq">
      <?php 
      foreach ($faqs as $k_faq => $val_faq) { 
        ?>      
        <div class="dl-question">
          <a class="question-btn">
          <?php 
             print t($val_faq['pregunta']);
           ?>
          </a>
          <div class="dl-answer">
            <p>
            <?php 
               print t($val_faq['respuesta']);
             ?>
            </p>
          </div>
        </div>
           
      <?php }  ?>
    </div>
    <div class="row">
      <div class="back-pdf">
        <?php echo l(t('<< BACK'), 'downloadpdf'); ?>
      </div>
     </div>
  </div>
</div>