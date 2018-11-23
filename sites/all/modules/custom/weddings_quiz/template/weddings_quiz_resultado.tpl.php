<?php
/**
 * Available variables:
 *
 * - $account : Drupal user objetc.
 */

global $base_url, $language;

/*Toma la imagen representativa de los banner del resultado*/
$image_fondopreg_quiz = file_load($data_resultado[0]['id_img_banner_respuesta']);
$img_fondopreg_quiz_url = $image_fondopreg_quiz->uri;

$image_fondopreg_mobile_quiz = file_load($data_resultado[0]['id_img_banner_mobile_respuesta']);
$img_fondopreg_mobile_quiz_url = $image_fondopreg_mobile_quiz->uri;

/*Toma la imagen representativa del resultado*/
$image_titulopreg_quiz = file_load($data_resultado[0]['id_img_pregunta']);
$img_titulopreg_quiz_url = $image_titulopreg_quiz->uri;

$img = explode('public://', $img_titulopreg_quiz_url);
$urlimg = $base_url.'/sites/default/files/'. $img[1];

$res = preg_match("/quiz\/result\/(\d)/", $_GET["q"], $mth);

/*$pos = strpos($data_resultado[0]['titulo'], 'You are');
if($pos === FALSE){*/
if($mth[1] >= 5){
  $arrHotel = array();
  $arrHotel[5] = "Moon Palace";
  $arrHotel[6] = "Playacar Palace";
  $arrHotel[7] = "Beach Palace";
  $arrHotel[8] = "Moon Palace Jamaica Grande";
  $arrHotel[9] = "Cozumel Palace";
  $titleQuiz = "My Dream Destination Wedding is:".$arrHotel[$mth[1]]."....What´s Yours?";
} else  {
  $titleExplode = explode('You are', $data_resultado[0]['titulo']);
  if (isset($titleExplode[1]))
    $titleQuiz = 'I am '.$titleExplode[1].' Take the Palace Resorts Quiz to find out your Bridal Style!';
  else
    $titleQuiz = $data_resultado[0]['titulo'];
}


$title=urlencode($titleQuiz);
$nameQuiz = $title;
$url=urlencode(url('quiz'));
$summary=drupal_html_to_text($data_resultado[0]['descripcion'], $allowed_tags = NULL);

$shorturl = $base_url.'/quiz/result/'.$data_resultado[0]['id_respuesta'];

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
    'content' => $titleQuiz,
  ),
);
drupal_add_html_head($tw_title, 'twitter:title');

$tw_image = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:image:src',
    'content' => $urlimg,
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

$og_url = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'property' => 'og:url',
    'content' => $base_url.'/quiz/result/'.$data_resultado[0]['id_respuesta'].'/'.$nameQuiz,
  ),
);
drupal_add_html_head($og_url, 'og:url');

$og_title = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'property' => 'og:title',
    'content' => $titleQuiz,
  ),
);
drupal_add_html_head($og_title, 'og:title');

$og_descripcion = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'property' => 'og:description',
    'content' => $summary,
  ),
);
drupal_add_html_head($og_descripcion, 'og:description');

$og_image = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'property' => 'og:image',
    'content' => $urlimg,
  ),
);
drupal_add_html_head($og_image, 'og:image');

?>

<section class="bloque-banner container-fluid">
    <a href=""><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/logoBrand.png" alt="" class="logo-mobile"></a>
    <picture>
        <source srcset="<?= file_create_url($img_fondopreg_mobile_quiz_url) ?>" media="(max-width: 767px)">
        <source srcset="<?= file_create_url($img_fondopreg_quiz_url); ?>">
        <img srcset="<?= file_create_url($img_fondopreg_quiz_url); ?>">
    </picture>
</section>

<section class="container-fluid bloque-breadcrumb">
    <div class="container">
        <ul>
            <li><?= l(t('Home'), '<front>') ?></li>
            <li><?= l(t('Quiz'), 'quiz') ?></li>
            <li><?= l(strip_tags($name_quiz), 'quiz/ini/'.$data_resultado[0]['id_quiz']) ?></li>
        </ul>
    </div>
</section>

<section class="container-fluid bloque-quiz-resultado">
    <div class="container">
        <div class="row content-info">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <img src="<?= file_create_url($img_titulopreg_quiz_url); ?>" class="img-responsive">
                <ul class="social-media">
                    <li>
                        <a href="javascript: void(0);" onclick="window.open('http://twitter.com/share?url=<?php print $shorturl; ?>&text=<?php print $title; ?>&image-src=<?php print $urlimg; ?>','sharer','toolbar=0,status=0,width=548,height=325');">
                            <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-resultado-twitter.png">
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" onclick="window.open('https://www.facebook.com/sharer.php?u=<?php echo urlencode($base_url.'/quiz/result/'.$data_resultado[0]['id_respuesta'].'/'.$nameQuiz); ?>&amp;t=<?php echo $title;?>','sharer','toolbar=0,status=0,width=548,height=325');">
                            <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-resultado-facebook.png">
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php print $base_url.'/quiz'; ?>&media=<?php  print $urlimg; ?>&description=<?php print $titleQuiz; ?>','sharer','toolbar=0,status=0,width=548,height=325');">
                            <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/icon-resultado-pinterest.png">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 marginTop">
                <p class="vino_tinto"><?php print $data_resultado[0]['subtitulo']; ?></p>
                <h2 class="titulo_bloque"><?php print $data_resultado[0]['titulo']; ?></h2>
                <?php print $data_resultado[0]['descripcion']; ?>
                <?php if (!isset($_SESSION['quiz'])): ?>
                    <a href="<?= url('quiz', array('absolute' => TRUE)); ?>" class="enlace"><?php print  t("Discover what's your bridal style") ?></a>
                <?php else: ?>
                    <a target="_blank" href="<?= $data_resultado[0]['link'] ?>" class="enlace"><?= $data_resultado[0]['title_link']; ?></a>
                    <?php
                    if(isset($_SESSION['quiz']))
                        unset($_SESSION['quiz']);
                    ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row images">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <?php $image_galery = file_load($data_resultado[0]['id_img_galeria_1']); ?>
                <img src="<?= file_create_url($image_galery->uri) ?>" class="img-responsive">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <?php $image_galery = file_load($data_resultado[0]['id_img_galeria_2']); ?>
                <img src="<?= file_create_url($image_galery->uri) ?>" class="img-responsive">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <?php $image_galery = file_load($data_resultado[0]['id_img_galeria_3']); ?>
                <img src="<?= file_create_url($image_galery->uri) ?>" class="img-responsive">
            </div>
        </div>
    </div>
</section>