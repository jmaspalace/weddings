<?php
/**
 * Available variables:
 *
 * - $account : Drupal user objetc.
 */
?>
<?php
global $base_url, $language;

$shorturl = $base_url.'/quiz';

$tw_card = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:card',
    'content' => 'photo',
  ),
);
drupal_add_html_head($tw_card, 'twitter:card');

$tw_creator = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:creator',
    'content' => '@prweddings',
  ),
);
drupal_add_html_head($tw_creator, 'twitter:creator');

$tw_creatorid = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:creator:id',
    'content' => '175842611',
  ),
);
drupal_add_html_head($tw_creatorid, 'twitter:creator:id');

$tw_url = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:url',
    'content' => $shorturl,
  ),
);
drupal_add_html_head($tw_url, 'twitter:url');

$tw_title = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:title',
    'content' => 'quiz',
  ),
);
drupal_add_html_head($tw_title, 'twitter:title');
//
$meta_title = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'title',
    'content' => 'Wedding Quizzes and Tests | Palace Resorts Weddings ®',
  ),
);
drupal_add_html_head($meta_title, 'title');
//
$meta_description = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'description',
    'content' => 'Take our quiz to discover your dream wedding style, because it’s never too early to start planning your big day.',
  ),
);
drupal_add_html_head($meta_description, 'description');
//

$tw_image = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:image:src',
    'content' => $base_url.'/sites/all/modules/custom/weddings_quiz/images/bg_01.jpg',
  ),
);
drupal_add_html_head($tw_image, 'twitter:image:src');

$tw_image_width = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:image:width',
    'content' => '960',
  ),
);
drupal_add_html_head($tw_image_width, 'twitter:image:width');

$tw_image_height = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:image:height',
    'content' => '535',
  ),
);
drupal_add_html_head($tw_image_height, 'twitter:image:height');
?>
<section class="bloque-banner container-fluid">
    <a href=""><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/logoBrand.png" alt="" class="logo-mobile"></a>
    <picture>
        <source srcset="<?= base_path().drupal_get_path('module', 'weddings_quiz') ?>/img/banner_whats.jpg" media="(max-width: 767px)">
        <source srcset="<?= base_path().drupal_get_path('module', 'weddings_quiz') ?>/img/banner-quiz.jpg">
        <img srcset="<?= base_path().drupal_get_path('module', 'weddings_quiz') ?>/img/banner-quiz.jpg">
    </picture>
</section>

<section class="container-fluid bloque-breadcrumb">
    <div class="container">
        <ul>
            <li><?= l(t('Home'), '<front>') ?></li>
            <li><?= l(t('Quiz'), 'quiz') ?></li>
        </ul>
    </div>
</section>

<section class="container-fluid bloque-intro">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
            <p><strong><?php print  t('IT’S THE BIGGEST DAY OF YOUR LIFE, AND YOU WANT IT TO BE JUST RIGHT.') ?></strong> <br><br>
                <?php print t('But you don’t know where to start! At Palace Resorts, we’re happy to lend a hand. Want to know your bridal style or what destination might best suit your event?') ?>
                <br><br>
                <?php print t('(We\'re working on more fun quizzes. Check back soon)'); ?>
            </p>
        </div>
    </div>
</section>
<?php if (isset($home_quizzes)): ?>
<?php foreach ($home_quizzes AS $key => $quiz): ?>
  <?php $image = file_load($quiz['id_img_quiz']); ?>
  <?php $img_url = $image->uri; ?>
    <section class="container-fluid bloque-quiz">
        <div class="container">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="container-image">
                    <img src="<?= file_create_url($img_url); ?>" class="img-background">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 content-info">
                <div class="box">
                    <h2 class="titulo_bloque"><?= $quiz['nombre_quiz']; ?></h2>
                    <a class="enlace" href="<?= url('quiz/ini/'.$quiz['id_quiz'], array('absolute' => TRUE)) ?>"><?php print t('start quiz') ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>
<?php else: ?>
    <section class="container-fluid bloque-quiz">
        <div class="container">
            <div class="col-md-6 col-sm-6 col-xs-12 content-info">
                <div class="box">
                    <h2><?php print t('No quizzes were created'); ?></h2>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>