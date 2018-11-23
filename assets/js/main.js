/*!
	Author: Jehison Perez
	Creation date: september of 2017
	Project name: weddings
	File name: main.js
*/
'use strict';
(function ($) {

	var LB = '',
		ROOM = '',
		iframe = '',
		player = '',
		checkIn = '',
		checkOut = '',
		activado = false,
		anchoDesktopMax = 1920,
		formHeaderReady = true,
		anchoDesktop = 1200,
		anchoTablet = 992,
		nights = 0,
		flight = false,
		anchoMobile = 767,
		modifier = '',
		teenagers = 0,
		childrens = 0,
		urlBooking = '',
		selector = '',
		infants = 0,
		p = '',
		rc = '?rc=',
		number = 0,
		items = [],
		seccionesQuiz = '',
		lan = '';

	LB = LB || {};
	ROOM = ROOM || {};

	LB.fn = {
		init: function init() {

			LB.fn.submenu();
			LB.fn.buscador();
			LB.fn.slider();
			LB.fn.booking();
			LB.fn.header();
			LB.fn.imagenesFondo();
			LB.fn.galerias();
			LB.fn.tabs();
			LB.fn.globalEvents();
			LB.fn.formsValidation();
			LB.fn.downloadpdf();
		},

		submenu: function submenu() {

			if ($(window).width() > anchoMobile) {
				$('.menu > li').hover(function () {
					$(this).find('.submenu').show();

					var areaActiva = '<div class="area-activa"></div>';
					$(areaActiva).appendTo(this);

					if ($(this).find('.triangulo').is(":visible")) {
						$(this).find('.triangulo').css({
							left: $(this).find('.triangulo').parent().parent().offset().left + $(this).find('.triangulo').parent().parent().find('> a').width() / 2 - 14
						})
					}

				}, function () {
					$('.submenu').hide();
					$('.area-activa').remove();
				})
			}

			if ($(window).width() <= anchoMobile) {
				$('li.down').on('click', function () {
					if ($(this).hasClass('open')) {
						$(this).removeClass('open');
					} else {
						$('li.down').removeClass('open');
						$(this).addClass('open');
					}
				})
			}
		},

		buscador: function buscador() {
			if ($('.search-results').is(':visible')) {
				$('.search-results').addClass('container');
			}

			$('.page-search #edit-keys').addClass('text');
		},

		downloadpdf: function downloadpdf() {
			$('.page-downloadpdf #download').addClass('container-fluid bloque-downloadpdf');
			$('.page-downloadpdf #dwlspdf').addClass('bloque-form bloque-downloadpdf');
			$('.page-downloadpdf #dwlspdf input.form-text').addClass('text');

			$('.page-requestform #wr-form').addClass('bloque-form bloque-downloadpdf');
			$('.page-requestform #wr-form input.form-text').addClass('text');

			$($('.node-type-home-weddings-vow-renewals.i18n-es .container-fluid')[7]).hide();
		},

		formsValidation: function formsValidation() {

			Parsley.addMessages('es', {
				defaultMessage: "Este valor parece ser inválido.",
				type: {
					email: "Este valor debe ser un correo válido.",
					url: "Este valor debe ser una URL válida.",
					number: "Este valor debe ser un número válido.",
					integer: "Este valor debe ser un número válido.",
					digits: "Este valor debe ser un dígito válido.",
					alphanum: "Este valor debe ser alfanumérico."
				},
				notblank: "Este valor no debe estar en blanco.",
				required: "Este valor es requerido.",
				pattern: "Este valor es incorrecto.",
				min: "Este valor no debe ser menor que %s.",
				max: "Este valor no debe ser mayor que %s.",
				range: "Este valor debe estar entre %s y %s.",
				minlength: "Este valor es muy corto. La longitud mínima es de %s caracteres.",
				maxlength: "Este valor es muy largo. La longitud máxima es de %s caracteres.",
				length: "La longitud de este valor debe estar entre %s y %s caracteres.",
				mincheck: "Debe seleccionar al menos %s opciones.",
				maxcheck: "Debe seleccionar %s opciones o menos.",
				check: "Debe seleccionar entre %s y %s opciones.",
				equalto: "Este valor debe ser idéntico."
			});

			if ($('body').hasClass('i18n-en')) {
				Parsley.setLocale('en');
                var $form = $('#webform-client-form-131');
			} else {
				Parsley.setLocale('es');
                var $form = $('#webform-client-form-293');
			}

			$('.node-type-download-brochure #webform-client-form-125').addClass('form_weddings');
			$('.node-type-take-next-step #webform-client-form-129').addClass('form_weddings');

			$('footer form').addClass('form_weddings');

			$('#newsletter-form-1').parsley();
			$('#newsletter-form-2').parsley();
			$('#webform-client-form-125').parsley();

            jQuery("<label class='masck'></label>" ).insertBefore(jQuery('footer .newsletter .form-actions button'));

             jQuery(document).on('click','footer .newsletter .masck',function(){
                     if ( $form.parsley().validate() ){
                         $("<div id='cargando'></div>").appendTo("footer .header-footer");
                         $form.submit();
                     }else{

                     }
              });

            var URLhash = window.location.hash;
            if(URLhash == "#confirmation"){
                $('#respuesta').css('display', 'block');
                $("footer .newsletter form").hide();
                var alto = $("footer .newsletter").offset().top;
                    $('html, body').animate({
                         scrollTop: alto
                    }, 800);
            }else{
               $('#respuesta').css('display', 'none');
               $("footer .newsletter form").show();
            }

            jQuery(document).on('click','footer .newsletter #respuesta button',function(){
                    $("footer .newsletter form").show();
                    $('#respuesta').css('display', 'none');
              });


            //var instance = $('#webform-client-form-131').parsley();




			// Formulario Contacto
			$('#webform-client-form-128 #edit-submitted-lastname').attr('required', 'required');
			$('#webform-client-form-128 #edit-submitted-phone').attr('data-parsley-type', 'number');
			//$('#webform-client-form-128').parsley();

			$('#webform-client-form-128 .form-submit').on('click', function (e) {
				e.preventDefault();
				$('#webform-client-form-128').parsley().validate();
				if ($('#webform-client-form-128').parsley().isValid() === true) {
					if (grecaptcha.getResponse() == "") {
						console.log('recaptcha sin marcar');
						$('.g-recaptcha iframe').addClass('captcha-no');
					} else {
						console.log('recaptcha marcado');
						$('.g-recaptcha iframe').removeClass('captcha-no');
						$('#webform-client-form-128 .form-submit').attr('disabled', 'disabled');
						$("<div id='cargando'></div>").appendTo("body");
						$('#webform-client-form-128').submit();
					}
				} else {
					console.log('no valido')
					var selects = $('.form_weddings select');
					for (var i = 0; i <= selects.length; i++) {
						var select = selects[i];
						if ($(select).hasClass('parsley-error')) {
							$(select).siblings('button').addClass('parsley-error');
						} else {
							$(select).siblings('button').removeClass('parsley-error');
						}
					}
				}
			});

			$('#webform-client-form-296 #edit-submitted-lastname').attr('required', 'required');
			$('#webform-client-form-296 #edit-submitted-phone').attr('data-parsley-type', 'number');
			//$('#webform-client-form-296').parsley();

			$('#webform-client-form-296 .form-submit').on('click', function (e) {
				e.preventDefault();
				$('#webform-client-form-296').parsley().validate();
				if ($('#webform-client-form-296').parsley().isValid() === true) {
					console.log('form good')
					if (grecaptcha.getResponse() == "") {
						console.log('recaptcha sin marcar');
						$('.g-recaptcha iframe').addClass('captcha-no');
					} else {
						console.log('recaptcha marcado');
						$('.g-recaptcha iframe').removeClass('captcha-no');
						$('#webform-client-form-296 .form-submit').attr('disabled', 'disabled');
                        $("<div id='cargando'></div>").appendTo("body");
						$('#webform-client-form-296').submit();
					}
				} else {
					console.log('no valido')
					var selects = $('.form_weddings select');
					for (var i = 0; i <= selects.length; i++) {
						var select = selects[i];
						if ($(select).hasClass('parsley-error')) {
							$(select).siblings('button').addClass('parsley-error');
						} else {
							$(select).siblings('button').removeClass('parsley-error');
						}
					}
				}
			});

			//Ofertas
			$('#webform-client-form-186 #edit-submitted-f3-phone').attr('data-parsley-type', 'number');
			$('#webform-client-form-186').parsley();

			$('#webform-client-form-295 #edit-submitted-f3-phone').attr('data-parsley-type', 'number');
			$('#webform-client-form-295').parsley();

			$('#webform-client-form-183 #edit-submitted-f3-phone').attr('data-parsley-type', 'number');
			$('#webform-client-form-183').parsley();

			/*if($('#webform-client-form-129').is(':visible')){
				$('#webform-client-form-129').parsley().on('field:success', function() {
					var selects = $('.form_weddings select');
					for(var i = 0; i <= selects.length; i++) {
						var select = selects[i];
						if ($(select).hasClass('parsley-error')) {
							$(select).siblings('button').addClass('parsley-error');
						} else {
							$(select).siblings('button').removeClass('parsley-error');
						}
					}
				});
			}*/

			$('#edit-submitted-phone-number-area-code-phone-number').attr('data-parsley-type', 'number');
			$('#edit-submitted-phone-number-area-code-phone-number').attr('data-parsley-maxlength', '3');
			$('#edit-submitted-phone-number-area-code-phone-number').removeAttr('maxlength');

			$('#edit-submitted-phone-number-phone').attr('data-parsley-type', 'number');
			$('#edit-submitted-phone-number-phone').attr('data-parsley-maxlength', '7');
			$('#edit-submitted-phone-number-phone').removeAttr('maxlength');

			$('#edit-submitted-phone-number-country-code-phone-number').on('change', function () {
				if ($('#edit-submitted-phone-number-country-code-phone-number').val().length <= 4) {
					$('#edit-submitted-phone-number-area-code-phone-number').removeAttr('readonly');
					$('#edit-submitted-phone-number-area-code-phone-number').attr('required', 'required');
					$('#edit-submitted-phone-number-area-code-phone-number').addClass('required');
				} else {
					$('#edit-submitted-phone-number-area-code-phone-number').attr('readonly', 'readonly');
					$('#edit-submitted-phone-number-area-code-phone-number').removeAttr('required');
					$('#edit-submitted-phone-number-area-code-phone-number').removeClass('required');
				}

				var country_phone = $(this).val();
				if (country_phone.indexOf('-') > 0) {
					country_phone = country_phone.split("-");
					$('#edit-submitted-phone-number-area-code-phone-number').val(country_phone[1]);
				} else {
					$('#edit-submitted-phone-number-area-code-phone-number').val('');
				}
			});

			$('#webform-client-form-129 .form-submit').on('click', function (e) {
				e.preventDefault();
				$('#webform-client-form-129').parsley().validate();
				if ($('#webform-client-form-129').parsley().isValid() === true) {
					console.log('form good')
					if (grecaptcha.getResponse() == "") {
						console.log('recaptcha sin marcar');
						$('.g-recaptcha iframe').addClass('captcha-no');
					} else {
						console.log('recaptcha marcado');
						$('.g-recaptcha iframe').removeClass('captcha-no');
						$('#webform-client-form-129 #btn-tns-en').attr('disabled', 'disabled');
						$('#webform-client-form-129').submit();
					}
				} else {
					console.log('no valido')
					var selects = $('.form_weddings select');
					for (var i = 0; i <= selects.length; i++) {
						var select = selects[i];
						if ($(select).hasClass('parsley-error')) {
							$(select).siblings('button').addClass('parsley-error');
						} else {
							$(select).siblings('button').removeClass('parsley-error');
						}
					}
				}
			});

			//form clear
			$('#webform-client-form-381 .form-submit, #webform-client-form-372 .form-submit').on('click', function (e) {
				e.preventDefault();
				$('#webform-client-form-381, #webform-client-form-372').parsley().validate();
				if ($('#webform-client-form-381, #webform-client-form-372').parsley().isValid() === true) {
					console.log('form good')
					if (grecaptcha.getResponse() == "") {
						console.log('recaptcha sin marcar');
						$('.g-recaptcha iframe').addClass('captcha-no');
					} else {
						console.log('recaptcha marcado');
						$('.g-recaptcha iframe').removeClass('captcha-no');
						$('#webform-client-form-381 #btn-tns-en, #webform-client-form-372 #btn-tns-en').attr('disabled', 'disabled');
						$('#webform-client-form-381, #webform-client-form-372').submit();
					}
				} else {
					console.log('no valido')
					var selects = $('.form_weddings select');
					for (var i = 0; i <= selects.length; i++) {
						var select = selects[i];
						if ($(select).hasClass('parsley-error')) {
							$(select).siblings('button').addClass('parsley-error');
						} else {
							$(select).siblings('button').removeClass('parsley-error');
						}
					}
				}
			});
			$('#webform-client-form-380 .form-submit, #webform-client-form-373 .form-submit').on('click', function (e) {
				e.preventDefault();
				$('#webform-client-form-380, #webform-client-form-373').parsley().validate();
				if ($('#webform-client-form-380, #webform-client-form-373').parsley().isValid() === true) {
					console.log('form good')
					if (grecaptcha.getResponse() == "") {
						console.log('recaptcha sin marcar');
						$('.g-recaptcha iframe').addClass('captcha-no');
					} else {
						console.log('recaptcha marcado');
						$('.g-recaptcha iframe').removeClass('captcha-no');
						$('#webform-client-form-380 #btn-tns-en, #webform-client-form-373 #btn-tns-en').attr('disabled', 'disabled');
						$('#webform-client-form-380, #webform-client-form-373').submit();
					}
				} else {
					console.log('no valido')
					var selects = $('.form_weddings select');
					for (var i = 0; i <= selects.length; i++) {
						var select = selects[i];
						if ($(select).hasClass('parsley-error')) {
							$(select).siblings('button').addClass('parsley-error');
						} else {
							$(select).siblings('button').removeClass('parsley-error');
						}
					}
				}
			});

			$('#webform-client-form-290 .form-submit').on('click', function (e) {
				e.preventDefault();
				$('#webform-client-form-290').parsley().validate();
				if ($('#webform-client-form-290').parsley().isValid() === true) {
					console.log('form good')
					if (grecaptcha.getResponse() == "") {
						console.log('recaptcha sin marcar');
						$('.g-recaptcha iframe').addClass('captcha-no');
					} else {
						console.log('recaptcha marcado');
						$('.g-recaptcha iframe').removeClass('captcha-no');
						$('#webform-client-form-290 #btn-tns-es').attr('disabled', 'disabled');
						$('#webform-client-form-290').submit();
					}
				} else {
					console.log('no valido')
					var selects = $('.form_weddings select');
					for (var i = 0; i <= selects.length; i++) {
						var select = selects[i];
						if ($(select).hasClass('parsley-error')) {
							$(select).siblings('button').addClass('parsley-error');
						} else {
							$(select).siblings('button').removeClass('parsley-error');
						}
					}
				}
			});


			if ($('#webform-client-form-142').is(':visible')) {
				$('#webform-client-form-142').parsley().on('field:success', function () {
					var selects = $('#webform-client-form-142 select');
					for (var i = 0; i <= selects.length; i++) {
						var select = selects[i];
						if ($(select).hasClass('parsley-error')) {
							$(select).siblings('button').addClass('parsley-error');
						} else {
							$(select).siblings('button').removeClass('parsley-error');
						}
					}
				});
			}

			$('#webform-client-form-372 .form-submit').on('click', function (e) {
				e.preventDefault();
				$('#webform-client-form-372').parsley().validate();
				if ($('#webform-client-form-372').parsley().isValid() === true) {
					console.log('form good')
					if (grecaptcha.getResponse() == "") {
						console.log('recaptcha sin marcar');
						$('.g-recaptcha iframe').addClass('captcha-no');
					} else {
						console.log('recaptcha marcado');
						$('.g-recaptcha iframe').removeClass('captcha-no');
						$('#webform-client-form-372 #btn-tns-es').attr('disabled', 'disabled');
						$('#webform-client-form-372').submit();
					}
				} else {
					console.log('no valido')
					var selects = $('.form_weddings select');
					for (var i = 0; i <= selects.length; i++) {
						var select = selects[i];
						if ($(select).hasClass('parsley-error')) {
							$(select).siblings('button').addClass('parsley-error');
						} else {
							$(select).siblings('button').removeClass('parsley-error');
						}
					}
				}
			});

			$('.node-type-take-next-step form .captcha').addClass('col-md-6 col-sm-6 col-xs-12');
			$('.node-type-take-next-step form .form-actions').addClass('col-md-6 col-sm-6 col-xs-12');

			/*for(var i = 0; i < 10; i++){
				var row = '<div class="row row' + i + '"></div>';
				$(row).appendTo('.node-type-take-next-step .bloque-form form > div');
			}*/

			for (var i = 0; i < 13; i++) {
				var row = '<div class="row row' + i + '"></div>';
				$(row).appendTo('.node-type-take-next-step .bloque-form form > div');
				$(row).appendTo('.page-take-next-step .bloque-form form > div');
			}
			$('.bloque-form .webform-component--test').appendTo('.row0');
			$('.bloque-form .webform-component--groom-').appendTo('.row1');
			$('.bloque-form .webform-component--email-fd').appendTo('.row2');
			$('.bloque-form .webform-component--country-').appendTo('.row2');
			$('.bloque-form .webform-component--phone-number-').appendTo('.row3');
			$('.bloque-form .webform-component--test-as').appendTo('.row3');
			$('.bloque-form .webform-component--fieldset-2').appendTo('.row4');
			$('.bloque-form .webform-component--fieldset-4').appendTo('.row4');
			$('.bloque-form .webform-component--fieldset-3').appendTo('.row5');
			$('.bloque-form .webform-component--fieldset-7').appendTo('.row5');
			$('.bloque-form .webform-component--fieldset-5').appendTo('.row6');
			$('.bloque-form .webform-component--fieldset-6').appendTo('.row6');
			$('.bloque-form .webform-component--fieldset-8').appendTo('.row7');
			$('.bloque-form .webform-component--fieldset-10').appendTo('.row8');
			$('.bloque-form .webform-component--fieldset-9').appendTo('.row9');

			$('.bloque-form .captcha').appendTo('.row10');
			$('.bloque-form .form-actions').appendTo('.row11');

			$('#newsletter-form-1').submit(function (event) {
				var mail = $('#email_news').val();
				var terms_conditions = $('#terms_conditions').is(':checked') ? 1 : 0;
				var sign_me_up = $('#sign_me_up').is(':checked') ? 1 : 0;
				jQuery.ajax({
					type: "POST",
					url: '/send/newsletter',
					data: {
						"email_newsletter": mail,
						"terms_conditions": terms_conditions,
						"sign_me_up": sign_me_up
					},
					success: function (data) {
						if (data == 1) {
							$('#respuesta').css('display', 'block');
							$('#newsletter-form-1').css('display', 'none');
							$('#suscribe-title').css('display', 'none');
						}

					}
				});
				event.preventDefault();
			});

			$('#newsletter-form-2').submit(function (event) {
				var mail = $('#email_news').val();
				var mail = $('#email_news').val();
				var terms_conditions = $('#terms_conditions').is(':checked') ? 1 : 0;
				var sign_me_up = $('#sign_me_up').is(':checked') ? 1 : 0;
				jQuery.ajax({
					type: "POST",
					url: '/send/newsletter',
					data: {
						"email_newsletter": mail,
						"terms_conditions": terms_conditions,
						"sign_me_up": sign_me_up
					},
					success: function (data) {
						if (data == 1) {
							$('#respuesta2').css('display', 'block');
							$('#newsletter-form-2').css('display', 'none');
							$('#suscribe-title2').css('display', 'none');
						}

					}
				});
				event.preventDefault();
			});

			$('#weddings-quiz-lead-form #edit-name').attr('required');
			$('#weddings-quiz-lead-form #edit-lastname').attr('required');
			$('#weddings-quiz-lead-form #edit-email').attr('required');

			$('#weddings-quiz-lead-form').parsley();
		},

		slider: function slider() {
			var sonido = '<div class="volumenVideo" id="volumenVideo"></div>';
			$('.bloque-slider.flexslider').append(sonido);

			//Slider Principal
			$('.flexslider.bloque-slider').flexslider({
				controlNav: false,
				animation: 'fade',
				prevText: '',
				nextText: '',
				touch: true,
				slideshow: false,
				start: function () {
					if ($('.bloque-slider.flexslider iframe').is(":visible")) {
						iframe = document.querySelector('.container-video iframe');
						player = new Vimeo.Player(iframe);
						player.setVolume(0);

						$('.volumenVideo').click(function () {
							if (activado == false) {
								$(this).addClass('activado');
								player.setVolume(1)
								activado = true;
							} else {
								$(this).removeClass('activado');
								player.setVolume(0)
								activado = false;
							}
						})

						if ($('.flex-active-slide .container-video').is(":visible")) {
							player.play();
							$('.volumenVideo').fadeIn();

							player.on('ended', function (data) {
								$('.bloque-slider.flexslider').flexslider('next');
								$('.volumenVideo').fadeOut();
							});

						}
					}
				},
				before: function () {
					if ($('.flex-active-slide .container-video').length >= 1) {
						player.pause();
						$('.volumenVideo').fadeOut();
					}
				},
				after: function () {
					if ($('.flex-active-slide .container-video').is(":visible")) {
						player.play();
						$('.volumenVideo').fadeIn();

						player.on('ended', function (data) {
							$('.bloque-slider.flexslider').flexslider('next');
							$('.volumenVideo').fadeOut();
						});
					}
				}
			});

			// Sliders

			$('.bloque-slider-interna.flexslider').flexslider({
				controlNav: true,
				animation: 'fade',
				prevText: '',
				nextText: '',
				touch: true,
				slideshow: false
			});

			$('.bloque-content3.flexslider').flexslider({
				controlNav: true,
				animation: 'fade',
				prevText: '',
				nextText: '',
				touch: true,
				slideshow: false
			});

			$('.bloque-content2 .flexslider').flexslider({
				controlNav: true,
				animation: 'fade',
				prevText: '',
				nextText: '',
				touch: true,
				slideshow: false
			});

			$('.bloque-resort .flexslider').flexslider({
				controlNav: true,
				animation: 'fade',
				prevText: '',
				nextText: '',
				touch: true,
				slideshow: false
			});

			$('.bloque-weddings.flexslider').flexslider({
				controlNav: true,
				animation: 'slide',
				prevText: '',
				nextText: '',
				touch: true,
				smoothHeight: true,
				slideshow: false
			});

			$('.bloque-tripadvisor .flexslider').flexslider({
				controlNav: true,
				animation: 'slide',
				prevText: '',
				nextText: '',
				touch: true,
				slideshow: false
			});

			$('.bloque-testimonials-video .flexslider').flexslider({
				controlNav: false,
				animation: 'slide',
				prevText: '',
				nextText: '',
				touch: true,
				slideshow: false
			});

			$('.flexslider').flexslider();

			$('.bloque-carousel-circulos .owl-carousel').owlCarousel({
				loop: true,
				margin: 100,
				nav: true,
				navText: '',
				dots: false,
				responsive: {
					0: {
						items: 1,
						margin: 20
					},
					767: {
						items: 2,
						margin: 40
					},
					1000: {
						items: 3
					}
				}
			})

			$('.bloque-carousel-box .owl-carousel').owlCarousel({
				loop: true,
				margin: 6,
				nav: true,
				navText: '',
				dots: false,
				responsive: {
					0: {
						items: 1,
						margin: 0
					},
					767: {
						items: 3
					}
				}
			})

			$('.bloque-over.only_mobile .owl-carousel').owlCarousel({
				loop: true,
				margin: 0,
				navText: '',
				dots: true,
				items: 1
			})

			$('.bloque-carousel-two .owl-carousel').owlCarousel({
				loop: true,
				margin: 20,
				navText: '',
				responsive: {
					0: {
						items: 1,
						margin: 0,
						dots: true,
						nav: false
					},
					767: {
						items: 2,
						dots: false,
						nav: true
					}
				}
			})

			$('.bloque-stories .owl-carousel').owlCarousel({
				loop: true,
				margin: 20,
				navText: '',
				responsive: {
					0: {
						items: 1,
						margin: 0,
						dots: true,
						nav: false
					},
					767: {
						items: 2,
						dots: false,
						nav: true,
						margin: 150
					}
				}
			})

			$('.bloque-mach .owl-carousel').owlCarousel({
				loop: false,
				margin: 20,
				navText: '',
				responsive: {
					0: {
						items: 3,
						margin: 0,
						dots: false,
						nav: false,
						mouseDrag: true,
						touchDrag: true
					},
					767: {
						items: 10,
						dots: false,
						nav: false,
						margin: 10,
						mouseDrag: false,
						touchDrag: false
					}
				}
			})

			$('.box-answer .owl-carousel').owlCarousel({
				loop: true,
				margin: 0,
				navText: '',
				items: 1,
				dots: false,
				nav: true
			})

			$('.box-answer').removeClass('active');
			$('.box-answer[data-id="tab1"]').addClass('active');

			if ($(window).width() <= anchoMobile) {
				$('.bloque-boxes .boxes-images').addClass('owl-carousel').addClass('owl-theme');
				$('.bloque-boxes .boxes-images').owlCarousel({
					items: 1,
					margin: 0,
					nav: false,
					dots: true,
					loop: true
				});
			} else {
				$('.bloque-boxes .boxes-images').removeClass('owl-carousel').removeClass('owl-theme');
				$('.bloque-boxes .boxes-images').owlCarousel('destroy');
			}

			//$('.owl-carousel:not(".page-downloadpdf .owl-carousel")').owlCarousel()
		},

		// Get url by hotel
		getUrlByHotel: function getUrlByHotel() {
			LB.fn.getBookUrl();
		},
		// end Get url by hotel

		// Call booking bar on header
		booking: function booking() {

			if ($('body').hasClass('i18n-es')) {
				lan = 'es'
			} else {
				lan = 'en'
			}

			// Booking bar dates
			$('.date_inputs').datepicker({
				autoclose: true,
				language: lan,
				disableTouchKeyboard: true,
				format: 'yyyy-mm-dd',
				immediateUpdates: true,
				startDate: 'today',
				endDate: '+2y'
			}).on('changeDate', function (event) {
				if (event.currentTarget.id === 'check_in_input') {
					LB.fn.checkInDate(event);
					LB.fn.checkOutDate(event);
				} else if (event.currentTarget.id === 'check_out_input') {
					checkOut = event.format('yyyy-mm-dd');
				}
			}).on('hide', function () {
				if ($('.check_in_input').val() == '') {
					$('.check_out_input').val('');
				}
			});

			$('.check_in_input').datepicker('setDate', '+15d');
			$('.check_out_input').datepicker('setDate', '+20d');
			// end Booking bar dates


			//Botones Booking
			$('.icons_form_booking:first-child').addClass('active');

			$('.icons_form_booking').click(function (event) {
				event.preventDefault();
				$('.icons_form_booking').removeClass('active');
				$(this).addClass('active');
				$('.bloque-booking form .date_inputs, .bloque-booking form button').removeClass('ancho');
				$('.booking-mobile form .date_inputs, .booking-mobile form button').removeClass('ancho');

				$('.bloque-booking .dv_booking_form_only_us form .form-select-resort button:not(#btn_book_now)').removeClass('ancho8');

				$('.bloque-booking').removeClass('active');
				$('.booking-mobile').removeClass('active');
			})

			$('.icons_form_booking.icon_form_flying').click(function (event) {
				event.preventDefault();
				$('.icons_form_booking').removeClass('active');
				$(this).addClass('active');
				$('.bloque-booking form .date_inputs, .bloque-booking form button').addClass('ancho');
				$('.booking-mobile form .date_inputs, .booking-mobile form button').addClass('ancho');

				$('.bloque-booking .dv_booking_form_only_us form .form-select-resort button:not(#btn_book_now)').addClass('ancho8');

				$('.bloque-booking').addClass('active');
				$('.booking-mobile').addClass('active');
			})

			$('#btn_book_now2').click(function () {
				$('.bloque-booking').addClass('vertical');
			})

			$('.cerrar_booking').click(function () {
				$('.bloque-booking').removeClass('vertical');
			})

			$('.bloque-booking p.close').click(function () {
				$('.dv_years_kids').hide();
			})

			//Posicion Booking
			if (jQuery('.bloque-slider').height() >= jQuery(window).height()) {
				jQuery('.bloque-booking').addClass('booking-position');
			} else {
				jQuery('.bloque-booking').removeClass('booking-position');
			}


			LB.fn.bookingHeaderVendor();
			LB.fn.getUrlByHotel();

		},
		// end Call booking bar on header

		// Check in date
		checkInDate: function checkInDate(e) {

			var dateIn = '';

			checkIn = e.format('yyyy-mm-dd');
			dateIn = $(e.currentTarget).datepicker('getDate', '+1d');

			$('.check_in_input').each(function (i) {
				$('.check_in_input').eq(i).val(' ').datepicker('update', ('startDate', dateIn));
			});
		},
		// end Check in date

		// Check out date
		checkOutDate: function checkOutDate(e) {
			var dateOut = '',
				minDate = '';

			dateOut = $(e.currentTarget).datepicker('getDate', '+1d');

			if ($('.book__form').hasClass('is--flight')) {
				dateOut.setDate(dateOut.getDate() + 7);
			} else {
				dateOut.setDate(dateOut.getDate() + 5);
			}

			minDate = new Date(e.date.valueOf());
			minDate.setDate(minDate.getDate() + 1);

			$('.check_out_input').each(function (i) {
				$('.check_out_input').eq(i).val(' ').datepicker('setStartDate', minDate).datepicker('update', ('startDate', dateOut));
			});

			checkOut = $('.check_out_input').eq(0).val();
		},
		// end Check out date

		bookingHeaderVendor: function bookingHeaderVendor() {
			$('.dv_booking_form form').addClass('book__form');
			$('.book__form #select_resort, .book__form #check_in_input, .book__form #check_out_input').attr({
				autocomplete: 'off',
				required: ''
			});
			$('.book__form').parsley();

			$.getJSON("/json_airports.json", function (data) {
				$.each(data, function (key, val) {
					items.push(val);
				});
			});


			function autocomplete($ctl, items, cb, freeInput) {
				$ctl.autocomplete({
					minLength: 3,
					autoFocus: true,
					messages: {
						noResults: '',
						results: function () {}
					},
					source: items,
					select: function (e, ui) {
						cb(e, ui)
						$("#data_flight").val(ui.item.data);
					},
					change: function (e, ui) {

						if (!(freeInput || ui.item)) e.target.value = "";
					}
				});
			}

			autocomplete($('.origin'), items, function () {});

			$('form select').selectpicker();
		},

		// Get url address
		getBookUrl: function getBookUrl() {
			var dataSite = {
				resort: $('select#select_resort').val(),
				lang: $('#lang').val(),
				country: $('#country').val(),
				continent: $('#continent').val()
			};

			formHeaderReady = false;
			$('#btn_book_now').prop('disabled', true);
			$('#btn_book_now').addClass('is--consulting');

			$.ajax({
				data: dataSite,
				url: '/booking/ajax/geturl',
				type: 'GET',
				error: function error(xhr, ajaxOptions, thrownError) {
					//console.log('Booking ajax error: ' + xhr.status + ', ' + thrownError + ', ' + ajaxOptions);
				}
			}).done(function (data) {
				urlBooking = data;

				formHeaderReady = true;
				$('#btn_book_now').prop('disabled', false);
				$('#btn_book_now').removeClass('is--consulting');

				if ($('.btn_book_resort_acco').length > 0) {
					var urlBookingAccommodations = urlBooking;

					urlBookingAccommodations = LB.fn.decode(urlBookingAccommodations);
					for (number = 0; number < $('.btn_book_resort_acco').length; number += 1) {
						$('.btn_book_resort_acco').eq(number).attr({
							href: urlBookingAccommodations,
							target: '_blank'
						});
					}
				}
			}).fail(function () {
				console.log('Booking ajax fail');
			});

		},
		// end Get url address

		// Encode function
		encode: function encode(str) {
			return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function (match, p1) {
				return String.fromCharCode('0x' + p1);
			}));
		},
		// end Encode function

		// Decode function
		decode: function decode(str) {
			return decodeURIComponent(Array.prototype.map.call(atob(str), function (c) {
				return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
			}).join(''));
		},
		// end Decode function

		// Header 
		header: function header() {
			if ($(document).scrollTop() >= 30) {
				$('header.header').addClass('transform');
			} else {
				$('header.header').removeClass('transform');
			}
		},
		// Fin Header 

		// Imagenes Fondo
		imagenesFondo: function imagenesFondo() {
			var images = $('.img-background');
			for (var i = 0; i < images.length; i++) {
				var image = images[i];
				$(image).parent().css({
					'background-image': 'url(' + $(image).attr('src') + ')'
				})
			}
		},
		// Fin Imagenes Fondo

		// Galerías
		galerias: function galerias() {
			$('.grid').masonry({
				itemSelector: '.grid-item',
				percentPosition: true
			});

			$("[data-fancybox]").fancybox({
				loop: true,
				buttons: [
					'close'
				]
			});
		},
		// Fin Galerías

		// Tabs
		tabs: function tabs() {
			if ($('.bloque-tabs').is(':visible')) {
				$('.bloque-tabs header ul li').click(function () {
					$(this).parent().find('li').removeClass('active');
					$(this).addClass('active');

					$(this).parent().parent().parent().find('.container-tabs > div').removeClass('active');
					$(this).parent().parent().parent().find('.container-tabs').find('.' + $(this).attr('data-media')).addClass('active');

					var alto = $(this).parent().parent().parent().find('.container-tabs').find('.' + $(this).attr('data-media')).offset().top;

					if ($(window).width() < anchoMobile) {
						$('html, body').animate({
							scrollTop: alto
						}, 800);
					}

					$('.grid').masonry({
						itemSelector: '.grid-item',
						percentPosition: true
					});

					$(".fancybox").fancybox();

					$('.fancybox-media').fancybox({
						helpers: {
							media: {}
						}
					});
				})
			}

			if ($('.bloque-mach').is(':visible')) {
				$('.bloque-mach ul li').click(function () {
					$('.bloque-mach ul li').removeClass('active');
					$(this).addClass('active');

					$('.box-answer .triangulo').css({
						left: $(this).offset().left + $(this).width() / 2 - 31
					})

					$('.box-answer').removeClass('active');
					$('section[data-id="' + $(this).attr('id') + '"]').addClass('active');
				})
			}
		},
		// Fin Tabs

		// Global click events
		clickEvents: function clickEvents() {

			// Booking bar tab buttons
			$(document).on('click', '.icons_form_booking', function (e) {
				e.preventDefault();
				$('.icons_form_booking').removeClass('is--active');
				$('.book__form').removeClass('is--flight');
				flight = false;
				$('#select_Rooms').selectpicker('val', '1');
				$('#select_Rooms').selectpicker('refresh');

				var option = $("#select_Rooms option[value='4']");
				var option2 = $("#select_Rooms option[value='5']");

				if ($(e.currentTarget).hasClass('icon_form_flying')) {
					$('.icon_form_flying').siblings('.icons_form_booking').removeClass('is--active');
					$('.icon_form_flying').addClass('is--active');
					$('.book__form').addClass('is--flight');
					$('.edit-text-flight').addClass('active');
					$('.origin').attr('required', 'required');

					$('.check_in_input').datepicker('setDate', '+15d');
					$('.check_out_input').datepicker('setDate', '+22d');

					option.attr('disabled', 'disabled');
					option2.attr('disabled', 'disabled');
					$('#select_Rooms').selectpicker('refresh');

					flight = true;
				} else {
					$('.icon_form_flying').removeClass('is--active').prev().addClass('is--active');
					$('.edit-text-flight').removeClass('active');
					$('.origin').removeAttr('required')

					$('.check_in_input').datepicker('setDate', '+15d');
					$('.check_out_input').datepicker('setDate', '+20d');
					option.removeAttr('disabled');
					option2.removeAttr('disabled');
					$('#select_Rooms').selectpicker('refresh');

				}
			});
			// end Booking bar tab buttons
			$('#btn_book_now3').on('click', function () {
				$('.bloque-booking').addClass('visible');
			})

			if ($(window).width() < anchoMobile) {
				$('.cerrar_booking').on('click', function () {
					$('.bloque-booking').removeClass('visible');
				})
			}

			$('.icon-menu').on('click', function () {
				$('.container-header nav').addClass('right');
			})

			$('#closeMenu').on('click', function () {
				$('.container-header nav').removeClass('right');
			})

			$('.close-back').on('click', function () {
				$('.container-header nav').removeClass('right');
			})

			// Submit booking bar form
			$('#btn_book_now').on('click', function (e) {
				e.preventDefault();
				$('#form_book_now').parsley().validate();
				if ($('#form_book_now').parsley().isValid() === true) {
					LB.fn.sendForm();
				} else {
					if ($('select#select_resort').hasClass('parsley-error')) {
						$('button[data-id=select_resort]').addClass('parsley-error');
					} else {
						$('button[data-id=select_resort]').removeClass('parsley-error');
					}
				}
			});
			// end Submit booking bar form

			$(".collapse").on("hide.bs.collapse", function () {
				$('.read_more .more').show();
				$('.read_more .less').hide();
			});

			$(".collapse").on("show.bs.collapse", function () {
				$('.read_more .more').hide();
				$('.read_more .less').show();
			});

			//Search
			$('.search_desktop').on('click', function () {
				$('.search_input').addClass('visible');
			});

			$('.search_input .close').on('click', function () {
				$('.search_input').removeClass('visible');
			});

			//Quiz

			seccionesQuiz = $('.bloque-quiz-preguntas section');

			for (var i = 0; i <= seccionesQuiz.length; i++) {
				var seccionQuiz = seccionesQuiz[i];

				$(seccionQuiz).find('figure').click(function (e) {
					//$(seccionesQuiz).removeClass('visible')
					$(this).parent().parent().find('input').prop('checked', false)
					$(this).siblings('input').prop('checked', true)
						.parent().addClass('active')
						.parent().parent().next().addClass('visible')
				});
			}

		},
		// end Global click events

		// Calculate total nights
		calculateNights: function calculateNights(enter, leave) {
			var date1 = new Date(enter),
				date2 = new Date(leave);

			var timeDiff = 0;

			timeDiff = Math.abs(date2.getTime() - date1.getTime());
			nights = Math.ceil(timeDiff / (1000 * 3600 * 24));
			return nights;
		},
		// end Calculate total nights

		// Get basic data from booking
		getBasicData: function getBasicData() {
			LB.fn.calculateNights(checkIn, checkOut);
		},
		// end Get basic data from booking

		// Get city flight
		getCityFlight: function getCityFlight() {
			var flightCity = 'Out of USA';

			flightCity = $('#data_flight').val();
			return flightCity;
		},
		// end Get city flight

		// Get destination
		getDestinationAndCode: function getDestinationAndCode() {
			var destination = '',
				hotelCode = '';

			return [destination, hotelCode];
		},
		// end Get destination

		// Send form only room
		sendFormSingle: function sendFormSingle() {
			//debugger;

			ROOM.roomConfiguration = {
				'room_config': [{
					'idx': 1,
					'adults': $('select#select_adults').val(),
					'teenagers': teenagers,
					'childrens': childrens,
					'infants': infants
				}],
				'nights': nights,
				'check_in_date': checkIn,
				'currency': $('input#currency').val()
			};
			selector = LB.fn.decode(urlBooking);
			modifier = LB.fn.encode(JSON.stringify(ROOM.roomConfiguration));

			var url = document.URL;
			if (url.indexOf("utm") != "-1") {
				var utm = url.split("?");
				utm = utm[1];
				modifier += "&" + utm;
			}

			LB.fn.openExternalBook(selector, rc, modifier);
		},

		// end Send form only room

		// Send form only room+flight
		sendFormDouble: function sendFormDouble() {
			var child1 = '',
				child2 = '',
				child3 = '',
				child4 = '',
				child5 = '',
				destination = LB.fn.getDestinationAndCode()[0],
				hotelCode = LB.fn.getDestinationAndCode()[1];

			var edades = [child1, child2, child3, child4];
			var stringedades = "";
			var aux = 0;
			var hote_id = 0;

			edades.forEach(function (element) {
				if (aux == 0) {
					if (element != '') {
						stringedades += element;
					}
				} else {
					if (element != '') {
						stringedades += '&childages=' + element;
					}
				}
				aux++;
			})

			hote_id = 10447;

			switch ($('select#select_resort').val()) {
				case "65":
					hote_id = 10444
					break;
				case "66":
					hote_id = 10445
					break;
				case "67":
					hote_id = 10446
					break;
				case "111":
					hote_id = 10447
					break;
				case "112":
					hote_id = 10443
					break;
				case "113":
					hote_id = 10448
					break;
				case "74":
					hote_id = 10449
					break;
				case "75":
					hote_id = 10450
					break;
				case "114":
					hote_id = 10451
					break;
				case "150":
					hote_id = 10458
					break;
				case "248":
					hote_id = 10457
				case "249":
					hote_id = 10457
					break;
			}

			selector = $('input#code_vuelo').val();

			ROOM.roomConfiguration = {
				hotel: hote_id,
				airport: LB.fn.getCityFlight(),
				adults: parseInt($('select#select_adults').val(), 0),
				aDate: checkIn,
				dDate: checkOut,
				date_format: 'YYYY-MM-DD',
			};
			modifier = $.map(ROOM.roomConfiguration, function (value, index) {
				return [index + '=' + value];
			});
			modifier = modifier.join('&');

			var url = document.URL;
			if (url.indexOf("utm") != "-1") {
				var utm = url.split("?");
				utm = utm[1];
				modifier += "#" + utm;
			}

			LB.fn.openExternalBook(selector, '?', modifier);
		},
		// end Send form room+flight

		// Send data form
		sendForm: function sendForm() {
			LB.fn.getBasicData();
			if (flight === false) {
				LB.fn.sendFormSingle();
			}
			if (flight === true) {
				LB.fn.sendFormDouble();
			}
			/*dataLayer.push({
				'paso': 'cero',
				'fromCity': LB.fn.getCityFlight(),
				'resort': LB.fn.getDestinationAndCode()[0],
				'arrivalDate': checkIn,
				'departureDate': checkOut,
				'adults': $('select#select_adults').val(),
				'kids': $('select#select_kids').val(),
				'rooms': $('select#select_Rooms').val(),
				'event': 'impressions'
			});*/
		},
		// end Send data form

		// Booking selects events
		bookingSelects: function bookingSelects() {
			$('select#select_adults').on('change', function (e) {
				$('select#select_adults').val($(e.currentTarget).val()).selectpicker('refresh');
			});

			$('select#select_Rooms').on('change', function (e) {
				$('select#select_Rooms').val($(e.currentTarget).val()).selectpicker('refresh');
			});
			$('select#select_resort').on('change', function (e) {
				//if ($(e.currentTarget).val() === '249')
				//{
				// var startminDate = new Date('2018/03/01');
				//  $(".check_in_input").datepicker("setStartDate", startminDate);
				//  $('.check_in_input').datepicker('setDate', startminDate);
				//}else{
				$(".check_in_input").datepicker("setStartDate", new Date());
				$('.check_in_input').datepicker('setDate', '+15d');
				//}
				LB.fn.getBookUrl();
			});

		},
		// end Booking selects events

		// Open booking external url
		openExternalBook: function openExternalBook(url, split, room) {
			var fullUrl = '';
			var lang = "&lang=1";
			if ($('#lang').val() === 'es') {
				lang = "&lang=2";
			}
			fullUrl = url + split + room + lang;
			window.open(fullUrl, '_blank');
		},
		// end Open booking external url

		// Global events
		globalEvents: function globalEvents() {
			LB.fn.clickEvents();
			LB.fn.bookingSelects();
		}
		// end Global events
	}

	LB.documentOnReady = {
		init: function init() {
			LB.fn.init();

			setTimeout(function () {
				var url = document.URL;
				if (url.indexOf("utm") != "-1") {
					var utm = url.split("?");
					utm = utm[1];

					jQuery.each(jQuery("a"), function (index, value) {
						if (!jQuery(value).hasClass('faq-acordeon')) {
							if (jQuery(value).attr("href")) {
								jQuery(value).attr("href", jQuery(value).attr("href") + "?" + utm);
							}
						}
					})
				}

			}, 500)

		}
	};

	LB.documentOnLoad = {
		init: function init() {
			if ($('.box-answer .triangulo').is(":visible")) {
				$('.box-answer .triangulo').css({
					left: $('.bloque-mach ul li.active').offset().left + $('.bloque-mach ul li.active').width() / 2 - 31
				})
			}
			/*Seleccion de pais*/
			if($('#edit-submitted-country').length =! 0){
				$('#edit-submitted-country').selectpicker('val', 'US');
				$('#edit-submitted-country').selectpicker('refresh');
			}

			if($('#edit-submitted-country-country').length =! 0){
				$('#edit-submitted-country-country').selectpicker('val', '249');
				$('#edit-submitted-country-country').selectpicker('refresh');
			}

			if($('#edit-submitted-f2-country').length =! 0){
				$('#edit-submitted-f2-country').selectpicker('val', 'US');
				$('#edit-submitted-f2-country').selectpicker('refresh');
			}

			if($('#country').length =! 0){
				$('#country').selectpicker('val', '34');
				$('#country').selectpicker('refresh');

				$('#country').trigger('change');
			}

			$('.grid').masonry({
				itemSelector: '.grid-item',
				percentPosition: true
			});

			$("[data-fancybox]").fancybox({
				loop: true,
				buttons: [
					'close'
				]
			});

			var URLsearch = window.location.search;
			var pathname = window.location.pathname;
			if(URLsearch == "?thanks="){
                if(pathname =="/en/contact-us" || pathname == "/es/contacto"){
                    var scroll=$('.confirm-thanks').offset().top;
				    $('body,html').animate({scrollTop:scroll-120},'1200');
                }


			}
		}
	};

	LB.documentOnResize = {
		init: function init() {
			if ($(window).width() <= anchoMobile) {
				$('.bloque-booking').removeClass('vertical');
				$('.bloque-booking').removeClass('visible');
			}

			if ($(window).width() <= anchoMobile) {
				$('.bloque-boxes .boxes-images').addClass('owl-carousel').addClass('owl-theme');
				$('.bloque-boxes .boxes-images').owlCarousel({
					items: 1,
					margin: 0,
					nav: false,
					dots: true
				});
			} else {
				$('.bloque-boxes .boxes-images').removeClass('owl-carousel').removeClass('owl-theme');
				$('.bloque-boxes .boxes-images').owlCarousel('destroy');
			}

			if ($('.box-answer .triangulo').is(":visible")) {
				$('.box-answer .triangulo').css({
					left: $('.bloque-mach ul li.active').offset().left + $('.bloque-mach ul li.active').width() / 2 - 31
				})
			}

			//Posicion Booking
			if (jQuery('.bloque-slider').height() >= jQuery(window).height()) {
				jQuery('.bloque-booking').addClass('booking-position');
			} else {
				jQuery('.bloque-booking').removeClass('booking-position');
			}
		}
	};

	LB.documentOnScroll = {
		init: function init() {

			if ($(document).scrollTop() >= 30) {
				$('header.header').addClass('transform');
			} else {
				$('header.header').removeClass('transform');
			}

			/*if( $(window).width() > anchoMobile ){
				if($(document).scrollTop() >= $(window).height()){
					$('#btn_book_now2').addClass('visible');
					$('.bloque-booking').addClass('vertical');

					if ($('.bloque-booking').hasClass('visible')) {
						$('#btn_book_now2').removeClass('visible');
					} else {
						$('#btn_book_now2').addClass('visible');
					}
				} else {
					$('#btn_book_now2').removeClass('visible');
					$('.bloque-booking').removeClass('vertical');
					$('.bloque-booking').removeClass('visible');
				}
			}*/

			if ($(document).scrollTop() >= $(window).height()) {
				$('#btn_book_now2').addClass('visible');
				$('.bloque-booking').addClass('derecha');
			} else {
				$('#btn_book_now2').removeClass('visible');
				$('.bloque-booking').removeClass('vertical');
				$('.bloque-booking').removeClass('derecha');
			}

		}
	};

	LB.run = {
		init: function init() {
			$(document).on('ready', LB.documentOnReady.init);
			$(window).on('load', LB.documentOnLoad.init);
			$(window).on('resize', LB.documentOnResize.init);
			$(window).on('scroll', LB.documentOnScroll.init);
		}
	};

	LB.run.init();

})($);

function actualizarUrl(data) {
	history.replaceState(null, null, data);
	history.pushState(null, null, data);
}
