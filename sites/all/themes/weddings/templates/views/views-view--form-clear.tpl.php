	<?php 
	global $language;
	if($language->language=="es"){
	$title="EL MEJOR DÍA DE TU VIDA EMPIEZA AQUÍ";		
	$msg_desc="Nuestro equipo experto en bodas está disponible de lunes a viernes de 9:00 a.m. a 8:00 p.m., y los sábados 9:00 a.m. a 2:00 p.m. EST. weddings@palaceresorts.com";

	$title2= "FELICITACIONES!";
	$msg_desc2 = "Gracias por tu interes en realizar tu boda en Palace Resorts. Uno de nuestros coordinadores de bodas te estará contactando en un tiempo de 48 horas.";


	}else{
	$title="THE BEST DAY OF YOUR LIFE STARTS HERE";		
	$msg_desc="Mon. - Fri. 9am - 8pm, Sat. 9am - 2pm EST | weddings@palaceresorts.com | US 1-877-725-4933 | Mexico & LATAM 01-800 841 6641| UK 0-808-258-0083";

	$title2= "THANKS";
	$msg_desc2 = "THANK YOU FOR YOUR INTEREST IN PALACE RESORTS
     Please check and confirm your email and one of our bridal consultants will be with you shortly.";
	
	}
	?>


	


	<?php 
	if (!isset($_GET['gracias'])) {		
	?>


	<section class="container-fluid bloque-form">
		<div class="container">
			<?php
				if ($language->language=="en") {
					$block = module_invoke('webform', 'block_view', 'client-block-381');
				}else{
					$block = module_invoke('webform', 'block_view', 'client-block-380');
				}
						
						print render($block['content']);
					?>
		</div>
</section>


<?php
}else{
 ?>

 <section class="container-fluido confirm-thanks">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;">
				<h2 class="titulo_bloque text-center"><?php print $title ?></h2>
				<center><div class="separador"></div></center>
				<p class="text-center"><?php print $msg_desc ?> </p>
			</div>
	

		</div>
	</section>

 <section class="container-fluido confirm-thanks">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;">
				<h2 class="titulo_bloque text-center"><?php print $title2 ?></h2>
				<p class="text-center"><?php print $msg_desc2 ?> </p>
			</div>
	

		</div>
	</section>
	<?php 
	
}
?>


	
