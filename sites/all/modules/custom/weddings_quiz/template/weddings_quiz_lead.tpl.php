<?php
/**
 * Available variables:
 *
 * - $account : Drupal user objetc.
 */
?>
<section class="bloque-banner container-fluid">
    <a href=""><img src="../images/logoBrand.png" alt="" class="logo-mobile"></a>
    <picture>
        <source srcset="../images/banner_whats.jpg" media="(max-width: 767px)">
        <source srcset="../images/banner-quiz-form.jpg">
        <img srcset="../images/banner-quiz-form.jpg">
    </picture>
</section>

<section class="container-fluid bloque-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="">home</a></li>
            <li><a href="">Honeymoons</a></li>
        </ul>
    </div>
</section>

<section class="container-fluid bloque-intro">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="separador"></div>
            <p>Will your wedding be at fun and family friendly Moon Palace Golf & Spa Resort? Or will it be at serene and pristine Playacar Palace? Take our quiz to discover your dream Palace Resorts wedding venue.</p>
        </div>
    </div>
</section>

<section class="container-fluid bloque-quiz-preguntas">
    <section class="container-fluid bloque-form bloque-quiz-form">
        <div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-12 content-form">
            <h2 class="titulo_bloque"><?php print  t('Well, that was fun!') ?></h2>
            <form>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php print render($form['name']); ?>
                        <!-- <input class='text' type="text" placeholder="FIRST NAME" name="name" id="" required></input> -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php print render($form['name']); ?>
                        <!-- <input class='text' type="text" placeholder="LAST NAME" name="lastname" id="" required></input> -->
                    </div>
                </div>
                <p class="vino_tinto"><?php print t("We'll send you more fun quizzes and info at.") ?></p>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <?php print render($form['email']); ?>
                        <!-- <input class='text' type="email" placeholder="EMAIL" name="email" id="" required></input> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php print render($form['submit']); ?>
                        <!-- <input type="submit" value="See your results"> -->
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 container-img">
            <img src="../images/img-quiz-form.jpg" class="img-responsive">
        </div>
    </section>
</section>