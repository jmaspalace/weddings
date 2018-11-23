<?php
$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:url',
		'content' => 'http://weddings.palaceresorts.com/en/share-the-love',
	),
);
drupal_add_html_head($element, 'og_url');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:type',
		'content' => 'website',
	),
);
drupal_add_html_head($element, 'og_type');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:title',
		'content' => 'Share the Love',
	),
);
drupal_add_html_head($element, 'og_title');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:description',
		'content' => 'Hey! I just referred you to take a look at your dream wedding LEARN MORE',
	),
);
drupal_add_html_head($element, 'og_description');

$element = array(
	'#tag' => 'meta',
	'#attributes' => array(
		'property' => 'og:image',
		'content' => 'https://weddings.palaceresorts.com/sites/all/themes/weddings/img/Offers/hare_the_love/FB.jpg',
	),
);
drupal_add_html_head($element, 'og_image');

?>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


  <link rel="stylesheet" href="<?= base_path().drupal_get_path('theme', 'weddings') ?>/css/Offers/hare_the_love/main.css">

   <section class="lp-offers">
    <section class="banner">
        <img class="bannerdesktop" src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/Offers/hare_the_love/Banner.jpg" alt="">
        <img class="bannermobile"src="<?= base_path().drupal_get_path('theme', 'weddings') ?>/img/Offers/hare_the_love/BannerMobile.jpg" alt="">
    </section>
    <section class="content-info">
       <div class="container">
       <div class="info-text">
        <h2><span>¡Da un poco de amor y </span>recibe a cambio, más de lo que imaginas!</h2>
        <p>Si te casaste o te vas a casar en Palace Resorts esto seguro te puede interesar.
        </p>
        <p> Cuando le recomiendas a una futura novia que realice su boda soñada en nuestros exclusivos resorts, recibes a cambio una estadía de cortesía de 3 noches o $1.000 USD para gastos extras de tu boda.    <br>
        Sí, es así de sencillo. Ella obtendrá la locación perfecta para su gran día y tú unas vacaciones completamente gratis. Aunque si estás a punto de decir “sí, acepto” en Palace Resorts también puedes optar por recibir $1.000 USD para los extras de tu boda como el entretenimiento en vivo, la fotografía profesional y mucho más. AMAMOS que nuestras novias sean felices, por eso, si ellas inspiran a sus amigas con su gran historia de amor, nosotros les damos mucho a cambio con nuestro programa de referencias. </p>
        <h2>¿Cómo funciona?<span> ¿Cuál es el paso a seguir?</span></h2>
        <ul>
            <li>
                <label for="Step1">Paso 1: </label> Haz clic en “Copiar link”, pégalo en tu plataforma favorita (email, mensaje de texto, Facebook, etc.) y dile a la novia que vas a recomendarnos que llene el formulario o presenta la pareja a tu agente de viajes preferido.

                <div class="copy_text">
                    <input type="text" readonly id="TextCopy" name="TextCopy" value="https://weddings.palaceresorts.com/es/da-el-siguiente-paso">
                    <button onclick="clipBoard()" onmouseout="overFun()">Copiar link <span class="tooltiptext" id="Tooltip">Copiar al portapapeles</span></button>
                </div>
            </li>
            <li><label for="Step2">Paso 2:</label> Una vez la novia recomendada llene el formulario uno de nuestros talentosos coordinadores de bodas la contactará para ayudarla con el proceso de reserva.  </li>
            <li><label for="Step3">Paso 3:</label> Cuando la boda referenciada esté reservada te contactaremos para darte tu merecida recompensa de una estadía de cortesía  de 3 noches o $1.000 USD para los extras de tu boda. </li>
        </ul>

       </div>
       <p class="terms"> <span>Términos y condiciones: </span>
        El plan de referidos es canjeable por un crédito de $1.000 USD para invertir en los extras de la boda o por una estadía de cortesía de 3 noches en una habitación doble, una vez confirmada la reservación de la boda referida. Los $1.000 USD no son reembolsables por dinero en efectivo. Para la estadía de cortesía de 3 noches se aplica un cargo de $ 10 USD por persona y por noche, para impuestos y propinas. En el caso de que se cancele una boda de referencia, ya no serán válidos los $1,000 USD de crédito o la estadía de cortesía. Hay un máximo de 3 referencias por boda. El período de recomendación comienza cuando se confirma la boda de la persona remitente y vence 6 meses después de la fecha de la boda. Las noches de cortesía son válidas por un (1) año después de la fecha de salida de la referencia. Solo aplicable para grupos de bodas con un mínimo de 10 habitaciones. Aplica para todas las propiedades de Palace Resorts y Le Blanc Spa Resort con restricciones de uso. Si la boda de referencia se realizó en The Grand at Moon Palace Cancún, la oferta se puede aplicar en The Grand at Moon Palace Cancún, Moon Palace Cancún, Moon Palace Jamaica, Beach Palace, Sun Palace, Isla Mujeres Palace, Playacar Palace y Cozumel Palace. Si la boda de referencia se realizó en una propiedad de Le Blanc Spa Resort, la oferta se puede aplicar en Le Blanc Spa Resort Cancún, Le Blanc Spa Resort Los Cabos, The Grand at Moon Palace Cancún, Moon Palace Cancún, Moon Palace Jamaica, Beach Palace, Sun Palace, Isla Mujeres Palace, Playacar Palace y Cozumel Palace. Contáctese con Palace Resorts Weddings para obtener más información sobre las restricciones y/o usos de los resorts. Limitado a un (1) uso de certificado de regalo por reserva. No se puede combinar con ningún otro certificado de regalo. Se aplican fechas restringidas. Sujeto a disponibilidad. No se puede combinar con ninguna otra promoción, incluido el Resort Credit. La promoción puede ser cancelada en cualquier momento sin previo aviso. Se pueden aplicar otros términos y condiciones. </p>

       </div>

    </section>
</section>
<script>
function clipBoard() {
  var copyText = document.getElementById("TextCopy");
  copyText.select();
  document.execCommand("copy");

  var tooltip = document.getElementById("Tooltip");
  tooltip.innerHTML = "Copied: " + copyText.value;
}
function overFun() {
  var tooltip = document.getElementById("Tooltip");
  tooltip.innerHTML = "Copy Link";
}
</script>
