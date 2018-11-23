<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 * <?php print_r($node); ?>
 * @ingroup themeable
 */
global $path;

drupal_add_css(drupal_get_path('theme', 'weddings') . '/css/mrw-custom.css');
drupal_add_js(drupal_get_path('theme', 'weddings') . '/js/mouse.parallax.js');
drupal_add_js(drupal_get_path('theme', 'weddings') . '/js/landing_royal.js');
?>
  <p class="landscape_message wow bounceIn">Please rotate your screen...</p>
  <div id="node-<?php print $node -> nid; ?>" class="<?php print $classes; ?> clearfix landing_my_royal_wedding int-nrw"<?php print $attributes; ?>>
  <div class="detectar"></div>
  
  <section id="one" class="slider"> 
    <!--VIDEO-->
    <div class="video-texture"></div>
    <div class="video-container">
        <video  class="hidden-xs hidden-sm hidden-md" autoplay loop poster="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/video/video.jpg" id="bgvid">
        <source src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/video/video.webm" type="video/webm">
        <source src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/video/video.mp4" type="video/mp4">
      </video>
    </div>
    <!--VIDEO END-->
    <div class="container">
      <div class="main-logo absolute wow bounceIn"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/mrw.png" class="img-responsive"></div>
      <div class="row">
        <div class="slider-caption">
          <div class="female-name wow fadeInDown">
            <h1>Destiny Kirker</h1>
          </div>
          <div class="and-text wow fadeIn">
            <div class="and-container wow fadeIn">&</div>
          </div>
          <div class="male-name wow fadeInDown">
            <h1>Dylan Hicks</h1>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="slider-info">
            <p class="wow fadeIn">Destiny and Dylan, a teacher and police officer from Massachusetts, are college sweethearts and instantly knew they were made for each other. The couple took a chance of a lifetime and entered the Palace Resorts My Royal Wedding at Moon Palace Contest, and won the destination wedding of their dreams, valued at more than $40,000. Follow their story and see what it’s like to have the perfect destination wedding in Cancun’s top resort, Moon Palace Cancun.</p>
            <div class="slider-logos wow fadeIn"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/slider-logo.png" class="img-responsive"> </div>
          </div>
        </div>
        <div class="col-lg-4 col-lg-offset-2">
          <div class="but-start wow bounceIn elevator-nav"> <a href="#two"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/start.png" class="img-responsive"></a> </div>
        </div>
      </div>
    </div>
  </section>

  <section id="two">
    <div class="gallery absolute">
      <div class="slider-two"> <a id="btn-close-gallery-two" href="#">
        <div class="close-gallery"><img img class="img-responsive" src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/gallery-close-pink.png"></div>
        </a>
        <div class="owl-carousel hidden-lg hidden-md hidden-sm">
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-01.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-02.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-03.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-04.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-05.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-06.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-07.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-08.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-09.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-10.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-11.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-12.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-13.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-14.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-15.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-16.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-17.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/mobile/img-18.jpg" class="img-responsive"></div>
        </div>
        <div class="owl-carousel hidden-xs">
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-01.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-02.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-03.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-04.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-05.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-06.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-07.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-08.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-09.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-10.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-11.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-12.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-13.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-14.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-15.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-16.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-17.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/antes/img-18.jpg" class="img-responsive"></div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
      <!--NORMAL PARALLAX-->
        <div class="others-parallax col-lg-5 col-md-6 col-sm-6 hidden-md hidden-sm hidden-xs parallax ">
          <div id="arc" class="wow fadeIn "></div>
          <div id="couple" class="wow fadeIn "></div>
          <div id="flowersLeft" class="wow fadeIn"></div>
          <div id="flowersRight" class="wow fadeIn"></div>
        </div>

        <div id="light" class="wow fadeInRight hidden-md hidden-sm hidden-xs"></div>
        <div id="chair" class="wow fadeInRight hidden-md hidden-sm hidden-xs"></div>
        <div id="stones" class="wow fadeIn hidden-md hidden-sm hidden-xs"></div>



        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="info">
            <div class="title">
              <h3 class="title01 pink wow bounceInRight">Getting ready</h3>
              <h3 class="title02 green wow bounceInRight">for the <span class="strong-text">big day</span></h3>
            </div>
            <p class="wow fadeIn">Compared to the contest, planning their destination wedding was a piece of cake. Before arriving to Cancun, the future Mr. and Mrs. Hicks had several calls with Ana, their wedding coordinator. They discussed every aspect of the wedding from the linens to the guest list, the flowers to the photography package – every detail was carefully planned to fit their taste.<br/>
              Once they checked-in at Moon Palace, they met with Lucy, their onsite wedding planner to go over the logistics of their special day. They stopped by their ceremony location, met with the florists, and finalized all aspects of their wedding. With Lucy in charge of all the preparations, their dream wedding was sure to come true.</p>
            <div class="but-animation wow fadeIn"><a id="btn-show-gallery-two" class="but">View More</a></div>
          </div>
        </div>
         <!--MOBILE PARALLAX-->
        <div class="mobile-parallax col-md-6 col-sm-6 col-xs-12 hidden-lg parallax">
          <div id="arc" class="wow fadeIn"></div>
          <div id="couple" class="wow fadeIn"></div>
          <div id="stones" class="wow bounceInRight"></div>
          <div id="flowersLeft" class="wow fadeIn"></div>
          <div id="flowersRight" class="wow fadeIn"></div>
        </div>
      </div>
      <div class="site-navigation elevator-nav">
        <div class="nav-up wow fadeIn">
          <div class="nav-animation wow bounce"><a href="#one"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/arrow-up.png"></a></div>
        </div>
        <div class="nav-down wow fadeIn">
          <div class="nav-animation wow bounce"><a href="#three"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/arrow-down.png"></a></div>
        </div>
      </div>
    </div>
    <div id="background" class="absolute"></div>
  </section>
  <section id="three">
    <div class="gallery absolute">
      <div class="small-gallery col-lg-2 col-md-8 col-sm-8 col-lg-offset-3 col-md-offset-2 col-sm-offset-2 ">
        <div class="chandeleer hidden-xs hidden-sm"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/four-parallax-lamp.png" class="img-responsive"></div>
        <div class="gallery-info">
          <div class="picture-info"> <a id="btn-close-gallery-three" href="#" class="hidden-lg">
            <div class="close-gallery"><img class="img-responsive" src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/gallery-close-green.png"></div>
            </a>
            <div class="picture-slider">
              <div class="slider-three">
                <div class="owl-carousel">
                <a class="item" data-text="We coated the edge of the aisle runner in bright seasonal flowers, and place coordinating pomander balls on the chairs." data-image="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-11.jpg"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-11.jpg"> </a>
                <a class="item" data-text="Transition from elegant ceremony to chic reception without losing the magical moment." data-image="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-05.jpg"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-05.jpg"> </a>
                <a class="item" data-text="Every detail embodies a romantic timelessness." data-image="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-06.jpg"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-06.jpg"> </a>
                <a class="item" data-text="A dreamy looking table in a white linen tablecloth with a hint of a pink overlay. The centerpiece included varieties of pink blooms, such as roses, orchids and lilies." data-image="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-07.jpg"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-07.jpg"> </a> <a class="item active" data-text="Our excited couple enjoyed the un-parallel beauty of the ocean has their backdrop." data-image="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-01.jpg"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-01.jpg"> </a>
                <a class="item" data-text="Guest took in the natural romantic scenery while the couple exchanged their vows." data-image="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-03.jpg"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-03.jpg"> </a>
                <a class="item" data-text="Sleek lines and a soft and elegant color palette create the perfect aisle for a modern wedding in an exotic destination." data-image="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-04.jpg"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-04.jpg"> </a>
                <a class="item" data-text="There is so much sophistication in simplistic glassware." data-image="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-08.jpg"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-08.jpg"> </a>
                <a class="item" data-text="Seasonal flowers create a luscious and intimate ambiance." data-image="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-09.jpg"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-09.jpg"> </a>
                <a class="item" data-text="No celebration is complete without champagne for the perfect toast." data-image="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-10.jpg"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-10.jpg"> </a></div>
              </div>
            </div>
            <h3>Moon Palace Cancun</h3>
            <div class="collection-text">
              <p>We coated the edge of the aisle runner in bright seasonal flowers, and place coordinating pomander balls on the chairs.</p>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="col-lg-7 col-md-7 image-container hidden-xs hidden-sm hidden-md">
        <div class="image-zone"> <a id="btn-close-gallery-three" href="#">
          <div class="close-gallery"><img img class="img-responsive" src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/gallery-close-green.png"></div>
          </a>
          <div class="collection-image"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/colecciones/img-11.jpg"></div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="info">
            <div class="title">
              <h3 class="title01 green wow bounceInRight"><span class="pink">A</span> wedding dream</h3>
              <h3 class="title02 pink wow bounceInLeft"><span class="strong-text">come true</span></h3>
            </div>
            <p class="wow fadeIn">Destiny and Dylan fully customize their wedding. The couple went for a contemporary shabby chic yet minimal look, with white, coral and navy blue accents. Beachside chandeliers, a lit dance floor and spectacular fireworks show completed the night.</p>
            <div class="featured">
              <div class="featured-image wow fadeIn hidden-xs"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/square-bg.png" class="img-responsive wow swing"> </div>
              <div class="featured-title hidden-xs">
                <div class="wow fadeIn featured-name-container">
                  <div class="featured-name wow fadeIn">Moon Palace Cancun</div>
                </div>
                <div class="wow fadeIn">
                  <div class="featured-seal wow bounceIn"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/title-seal.png" class="img-responsive"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wall-gallery-container col-lg-6 col-md-6 col-sm-6 ">
          <div class="wall-gallery">
            <div class="row">
              <div class="square-image col-lg-5 col-xs-5 square01 wow fadeIn"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/square01.png" class="img-responsive wow bounceIn"> </div>
              <div class="square-image col-lg-7 col-xs-7 square02 wow fadeIn"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/square02.png" class="img-responsive wow bounceIn"> <a id="btn-show-gallery-three" class="but hidden-xs ">View Gallery</a> </div>
            </div>
            <div class="row">
              <div class="square-image col-lg-7 col-xs-7 square04 wow fadeIn"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/square04.png" class="img-responsive wow bounceIn"> </div>
              <div class="square-image col-lg-5 col-xs-5 square-fix square03 wow fadeIn"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/square03.png" class="img-responsive wow bounceIn"> </div>
            </div>
            <div class=""><a class="but aid" id="btn-show-gallery-three">View Gallery</a></div>
          </div>
        </div>
      </div>
      <div class="site-navigation elevator-nav">
        <div class="nav-up wow fadeIn">
          <div class="nav-animation wow bounce"><a href="#two"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/arrow-up.png"></a></div>
        </div>
        <div class="nav-down wow fadeIn">
          <div class="nav-animation wow bounce"><a href="#four"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/arrow-down.png"></a></div>
        </div>
      </div>
    </div>
  </section>
  <section id="four">
    <div class="gallery absolute gallery-pictures">
      <div class="slider-four"> <a id="btn-close-gallery-four-pictures" href="#">
        <div class="close-gallery"><img img class="img-responsive" src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/gallery-close-pink.png"></div>
        </a>
        <div class="owl-carousel hidden-lg hidden-md hidden-sm">
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-10.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-02.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-03.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-04.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-06.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-07.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-08.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-09.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-01.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-11.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-12.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-13.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-14.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-16.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-18.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-19.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/mobile/img-20.jpg" class="img-responsive"></div>
        </div>
        <div class="owl-carousel hidden-xs">
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-10.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-02.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-03.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-04.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-06.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-07.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-08.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-09.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-01.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-11.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-12.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-13.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-14.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-16.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-18.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-19.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/boda/img-20.jpg" class="img-responsive"></div>
        </div>
      </div>
    </div>
    <div class="gallery absolute gallery-video">
      <div class="slider-four"> <a id="btn-close-gallery-four-video" href="#">
        <div class="close-gallery"><img img class="img-responsive" src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/gallery-close-pink.png"></div>
        </a> 
        <div id="videoYT1"></div>
      </div>
    </div>
    <div class="gallery absolute gallery-reception">
      <div class="slider-four"> <a id="btn-close-gallery-four-reception" href="#">
        <div class="close-gallery"><img img class="img-responsive" src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/gallery-close-pink.png"></div>
        </a>
        <div class="owl-carousel hidden-lg hidden-md hidden-sm">
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-01.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-02.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-07.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-09.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-11.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-12.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-13.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-14.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-15.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-16.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-17.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-18.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-19.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/mobile/img-20.jpg" class="img-responsive"></div>
        </div>
        <div class="owl-carousel hidden-xs">
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-01.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-02.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-06.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-09.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-11.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-12.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-13.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-14.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-15.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-16.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-17.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-18.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-19.jpg" class="img-responsive"></div>
          <div class="item"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/galleries/recepcion/img-20.jpg" class="img-responsive"></div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row four-fix">
        <div class="info">
          <div class="col-lg-5 col-md-4 col-sm-5 col-lg-offset-0 col-md-offset-4" >
            <div class="title">
              <h3 class="title01 pink wow bounceInLeft">The<span class="hearts heartsOne hidden-xs"><i class="fa fa-heart heart01 wow bounceIn"></i><i class="fa fa-heart heart02 wow bounceIn fa-2x"></i><i class="fa fa-heart wow bounceIn heart03"></i></span></h3>
              <h3 class="title02 green wow bounceInLeft"><span class="strong-text">Wedding</span><span class="hearts heartsTwo hidden-xs"><i class="fa fa-heart heart01 wow bounceIn"></i><i class="fa fa-heart heart02 wow bounceIn fa-2x"></i><i class="fa fa-heart wow bounceIn heart03"></i></span></h3>
            </div>
          </div>
          <div class="col-lg-5 col-md-6 col-sm-5 col-lg-offset-0 col-md-offset-3">
            <p class="wow fadeIn">Check out the beautiful photos and videos of the ceremony and reception below. All courtesy of DreamArt Photography.</p>
          </div>
        </div>
      </div>
      <div class="row icons-row">
        <div class="categories-row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-btn btn-pictures wow bounceInUp"> <a id="btn-show-gallery-four-pictures" href="">
            <div class="gallery-image"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/icon-01.png" class="img-responsive"> </div>
            <div class="gallery-animation hidden-md hidden-xs hidden-sm">
              <div class="testMini01" data-classin="testPararelIn1" data-classout="testPararelOut1"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/img-01-02.jpg" class="img-responsive"></div>
              <div class="testMini02" data-classin="testPararelIn2" data-classout="testPararelOut2"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/img-01-01.jpg" class="img-responsive"></div>
              <div class="testMini03" data-classin="testPararelIn3" data-classout="testPararelOut3"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/img-01-03.jpg" class="img-responsive"></div>
            </div>
            </a>
            <div class="gallery-title wow fadeInUp">pictures</div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-btn btn-video wow bounceInUp"> <a id="btn-show-gallery-four-video" href="">
            <div class="gallery-image"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/icon-02.png" class="img-responsive"> </div>
            <div class="gallery-animation hidden-md hidden-xs hidden-sm">
              <div class="testMini02" data-classin="testPararelIn4" data-classout="testPararelOut4"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/img-02-01.png" class="img-responsive"></div>
            </div>
            </a>
            <div class="gallery-title wow fadeInUp">videos</div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 gallery-btn btn-reception wow bounceInUp"> <a id="btn-show-gallery-four-reception" href="">
            <div class="gallery-image"> <img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/icon-03.png" class="img-responsive"> </div>
            <div class="gallery-animation hidden-md hidden-xs hidden-sm">
              <div class="testMini01" data-classin="testPararelIn1" data-classout="testPararelOut1"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/img-03-02.jpg" class="img-responsive"></div>
              <div class="testMini02" data-classin="testPararelIn2" data-classout="testPararelOut2"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/img-03-01.jpg" class="img-responsive"></div>
              <div class="testMini03" data-classin="testPararelIn3" data-classout="testPararelOut3"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/img-03-03.jpg" class="img-responsive"></div>
            </div>
            </a>
            <div class="gallery-title wow fadeInUp">reception</div>
          </div>
        </div>
      </div>
      <div class="site-navigation elevator-nav">
        <div class="nav-up wow fadeIn">
          <div class="nav-animation wow bounce"><a href="#three"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/arrow-up.png"></a></div>
        </div>
        <div class="nav-down wow fadeIn">
          <div class="nav-animation wow bounce"><a href="#five"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/arrow-down.png"></a></div>
        </div>
      </div>
      <!--PARALLAX-->
      <div id="lamp" class="hidden-xs hidden-sm absolute wow bounceInDown"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/four-parallax-lamp.png" class="img-responsive"></div>
      <div id="bigchair" class="hidden-xs hidden-sm absolute wow bounceInLeft"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/four-parallax-chair.png" class="img-responsive"></div>
      <div id="table" class="hidden-xs hidden-sm absolute wow bounceInRight"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/four-parallax-table.png" class="img-responsive"></div>
    </div>
    <div id="floor" class="absolute hidden-xs"></div>
  </section>
  <section id="five">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-5">
          <div class="info">
            <div class="title">
              <h3 class="title01 pink">More<span class="hearts heartsThree hidden-xs"><i class="fa fa-heart heart01 wow bounceIn"></i><i class="fa fa-heart heart02 wow bounceIn fa-2x"></i><i class="fa fa-heart wow bounceIn heart03"></i></span></h3>
              <h3 class="title02 green">information</h3>
            </div>
            <p>You too, can have a dream wedding at Palace Resorts, like Destiny and Dylan. Let’s get started! Click below to get in touch with your very own wedding coordinator and find out how you can receive $27,000 in value added perks.</p>
            <a id="btn-take-next-step" href="/en/take-next-step" class="but">Click Here</a>
            <div class="clear"></div>
          </div>
        </div>
        <div class="wow bounceInUp car-container">
          <div id="" class="animated-car"></div>
        </div>
        <div class="site-navigation elevator-nav">
          <div class="nav-up wow fadeIn">
            <div class="nav-animation wow bounce"><a href="#four"><img src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/landing-mrw/arrow-up.png"></a></div>
          </div>
        </div>
      </div>
    </div>
    <div id="landscape" class="absolute"></div>
  </section>
    <footer class="container-fluid bloque_footer">
     <?php 
      $block = block_load('block', '2');
      $output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
      print $output;

      $block = block_load('block', '1');
      $output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
      print $output;

     ?>
  </foooter>
</div>
