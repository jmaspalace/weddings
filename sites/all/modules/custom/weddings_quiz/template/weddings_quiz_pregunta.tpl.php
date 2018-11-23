<?php
/**
 * Available variables:
 *
 * - $account : Drupal user objetc.
 */

global $base_url, $language;

$apuntador = $apuntador_preg + 1;

$image_fondopreg_quiz = file_load($data_quiz[0]['id_img_banner_preg']);
$img_fondopreg_quiz_url = $image_fondopreg_quiz->uri;

$image_fondopreg_mobile_quiz = file_load($data_quiz[0]['id_img_banner_mobile_preg']);
$img_fondopreg_mobile_quiz_url = $image_fondopreg_mobile_quiz->uri;

$num = $apuntador_preg + 1;
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
            <li><?= l(strip_tags($data_quiz[0]['nombre_quiz']), 'quiz/ini/'.$data_quiz[0]['id_quiz']) ?></li>
        </ul>
    </div>
</section>

<section class="container-fluid bloque-intro">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="separador"></div>
            <?php print $data_quiz[0]['descripcion']; ?>
        </div>
    </div>
</section>

<section class="container-fluid bloque-quiz-preguntas">
    <section class="container visible">
            <p class="pregunta"><span><?php print $num; ?>.</span> <?= $data_pregunta[$apuntador_preg]['pregunta']; ?></p>
            <ul>
                <?php foreach ($data_opcion AS $key => $opcion): ?>
                  <?php $image_opcion = file_load($opcion['id_img_opcion']); ?>
                  <?php $img_opc_url = $image_opcion->uri; ?>
                  <?php if ($num_preguntas == $apuntador): ?>
                    <a href="<?= url('quiz/lead/'.$data_quiz[0]['id_quiz'].'/'.$opcion['id_respuesta']); ?>">
                  <?php else: ?>
                    <a href="<?= url('quiz/question/'.$data_quiz[0]['id_quiz'].'/'.$apuntador.'/'.$opcion['id_respuesta']); ?>">
                  <?php endif; ?>
                        <li>
                            <figure>
                                <img src="<?= file_create_url($img_opc_url); ?>">
                                <figcaption><?= $opcion['titulo']; ?></figcaption>
                            </figure>
                            <input type="checkbox" class="hidden" name="question1" value="a">
                        </li>
                    </a>
                <?php endforeach; ?>
            </ul>
        </section>
</section>

