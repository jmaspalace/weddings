var _query = window.location.search.substring(1);
var bandVideoInicial = false;
if( _query.indexOf('videos') > -1 ) {
	bandVideoInicial = true;
}

(function($){

	var player1;
	var _heightMenu = 0;

	$(document).ready(function() { 

		//PARALLAX//
		$('.int-nrw .others-parallax #couple').mouseParallax({ moveFactor: 2 });	
		
		//$('.int-nrw #couple-mobile').mouseParallax({ moveFactor: 2 });	

		//GALLERY//
		$('.int-nrw .btn-pictures a, .int-nrw .btn-video a, .int-nrw .btn-reception a').hover(function(){
			var items = $(this).children('.gallery-animation').children('div');
			$.each(items, function(i, v){
				$(v).removeClass( $(v).attr('data-classin') );
				$(v).addClass( $(v).attr('data-classout') );
			});
		}, function(){
			var items = $(this).children('.gallery-animation').children('div');
			$.each(items, function(i, v){
				$(v).removeClass( $(v).attr('data-classout') );
				$(v).addClass( $(v).attr('data-classin') );
			});
		});

		//ELEVATOR//
		$('.int-nrw .elevator-nav a').bind('click',function(event){
			var $anchor = $(this);
			if( $('.int-nrw').length > 0 ){
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1500,'easeInOutExpo');
				event.preventDefault();
			}
		});
		
		//GALLERY DISPLAY TWO//
		$('.int-nrw #btn-show-gallery-two').click(function(e){
			e.preventDefault();
			$('.int-nrw #two .gallery').fadeIn(function() {
				// Efecto de redimencionamiento en la seccion al abrir la galeria
				var _section = $('.int-nrw #two .gallery').parent('section');
				var _slider = $('.int-nrw #two .gallery > div:visible');
				$(_section).attr('data-height-init', $(_section).height());
				$(_section).animate( {height: $(_slider).height()}, 400, 'swing');
			});
			$("html, body").stop().animate({scrollTop: $('.int-nrw #two .gallery').offset().top - _heightMenu }, '400', 'swing');
		});
		$('.int-nrw #btn-close-gallery-two').click(function(e){
			e.preventDefault();
			$('.int-nrw #two .gallery').fadeOut();

			// Efecto de redimencionamiento en la seccion al cerrar la galeria
			var _section = $('.int-nrw #two .gallery').parent('section');
			$(_section).animate( {height: $(_section).attr('data-height-init') }, 400, 'swing');
		});
		//GALLERY DISPLAY THREE//
		$('.int-nrw #btn-show-gallery-three').click(function(e){
			e.preventDefault();
			$('.int-nrw #three .gallery').fadeIn(function(){
				// Efecto de redimencionamiento en la seccion al abrir la galeria
				var _section = $('.int-nrw #three .gallery').parent('section');
				var _slider = $('.int-nrw #three .gallery > div:visible');
				$(_section).attr('data-height-init', $(_section).height());
				$(_section).animate( {height: $(_slider).height()}, 400, 'swing');
			});
			$("html, body").stop().animate({scrollTop: $('.int-nrw #three .gallery').offset().top - _heightMenu }, '400', 'swing');
		});
		$('.int-nrw #btn-close-gallery-three').click(function(e){
			e.preventDefault();
			$('.int-nrw #three .gallery').fadeOut();

			// Efecto de redimencionamiento en la seccion al cerrar la galeria
			var _section = $('.int-nrw #three .gallery').parent('section');
			$(_section).animate( {height: $(_section).attr('data-height-init') }, 400, 'swing');
		});
		//GALLERY DISPLAY FOUR//
		$('.int-nrw #btn-show-gallery-four-pictures').click(function(e){
			e.preventDefault();
			$('.int-nrw #four .gallery-pictures').fadeIn(function(){
				// Efecto de redimencionamiento en la seccion al abrir la galeria
				var _section = $('.int-nrw #four .gallery-pictures').parent('section');
				var _slider = $('.int-nrw #four .gallery-pictures > div:visible');
				$(_section).attr('data-height-init', $(_section).height());
				$(_section).animate( {height: $(_slider).height()}, 400, 'swing');
			});
			$("html, body").stop().animate({scrollTop: $('.int-nrw #four .gallery-pictures').offset().top - _heightMenu }, '400', 'swing');
		});
		$('.int-nrw #btn-close-gallery-four-pictures').click(function(e){
			e.preventDefault();
			$('.int-nrw #four .gallery-pictures').fadeOut();

			// Efecto de redimencionamiento en la seccion al cerrar la galeria
			var _section = $('.int-nrw #four .gallery-pictures').parent('section');
			$(_section).animate( {height: $(_section).attr('data-height-init') }, 400, 'swing');
		});
		$('.int-nrw #btn-show-gallery-four-video').click(function(e){
			e.preventDefault();
			$('.int-nrw #four .gallery-video').fadeIn();
			$("html, body").stop().animate({scrollTop: $('.int-nrw #four .gallery-video').offset().top - _heightMenu }, '400', 'swing');
			playVideo();
		});
		$('.int-nrw #btn-close-gallery-four-video').click(function(e){
			e.preventDefault();
			$('.int-nrw #four .gallery-video').fadeOut(function(){
				stopVideo();
			});
		});
		$('.int-nrw #btn-show-gallery-four-reception').click(function(e){
			e.preventDefault();
			$('.int-nrw #four .gallery-reception').fadeIn();
			$("html, body").stop().animate({scrollTop: $('.int-nrw #four .gallery-reception').offset().top - _heightMenu }, '400', 'swing');

			// Efecto de redimencionamiento en la seccion al abrir la galeria
			var _section = $('.int-nrw #four .gallery-reception').parent('section');
			var _slider = $('.int-nrw #four .gallery-reception > div:visible');
			$(_section).attr('data-height-init', $(_section).height());
			$(_section).animate( {height: $(_slider).height()}, 400, 'swing');
		});
		$('.int-nrw #btn-close-gallery-four-reception').click(function(e){
			e.preventDefault();
			$('.int-nrw #four .gallery-reception').fadeOut();

			// Efecto de redimencionamiento en la seccion al cerrar la galeria
			var _section = $('.int-nrw #four .gallery-reception').parent('section');
			$(_section).animate( {height: $(_section).attr('data-height-init') }, 400, 'swing');
		});

		//OWL SLIDER//
		var owlCarousel = $('.int-nrw .owl-carousel').owlCarousel({
		    /*items:1,
		    loop:true,
		    nav: true,
		    lazyLoad: true,
		    dots: true,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		        },
		        600:{
		            items:1,
		        },
		        1000:{
		            items:1,
		        }
		    }*/
		    navigation : true, // Show next and prev buttons
		    slideSpeed : 300,
		    paginationSpeed : 400,
		    singleItem: true,
		    rewindNav: false,
		    afterMove: function(){
		    	
		    	_text = $($('.int-nrw .slider-three .owl-carousel div a.item')[this.owl.currentItem]).attr('data-text');
				_image = $($('.int-nrw .slider-three .owl-carousel div a.item')[this.owl.currentItem]).attr('data-image');
				$('.int-nrw #three .gallery .gallery-info .picture-info .collection-text p').html(_text);
				$('.int-nrw #three .gallery .image-container .image-zone .collection-image img').attr('src', _image);
		    }
		});

		//COLLECTION//
		/*owlCarousel.on('translated.owl.carousel', function(event) {
			_text = $('.int-nrw .slider-three .owl-carousel div.active a.item').attr('data-text');
			_image = $('.int-nrw .slider-three .owl-carousel div.active a.item').attr('data-image');

			$('.int-nrw #three .gallery .gallery-info .picture-info .collection-text p').html(_text);
			$('.int-nrw #three .gallery .image-container .image-zone .collection-image img').attr('src', _image);
		});*/
		//HIDDEN INIT GALLERY//
		$('.int-nrw .gallery').hide();
		$('.int-nrw .gallery').css('visibility', 'visible');

		//$('.int-nrw .bxslider2').bxSlider({pager: false});

		var tag = document.createElement('script');

		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		
		function onResize() {
			if( $('body').width() >= 992 ) {
				_heightMenu = $('header#navbar').height();
			} else {
				_heightMenu = 0;
			}
		}

		function initMrw() {
			if( bandVideoInicial ) {	// validamos si debe cargar el video al inicial la pagina
				$('#btn-show-gallery-four-video').trigger( "click" );
			}
		}
		
		initMrw();
		onResize();
		$( window ).resize( onResize );

	});

})(jQuery);

	function onYouTubeIframeAPIReady() {
		player1 = new YT.Player('videoYT1', {
			height: '700',
			width: '100%',
			videoId: 'iekOD5QqAbs',
			playerVars: {
				autoplay:0, controls:0, showinfo:0
			},
			events: {
				'onReady': onPlayerReady,
				'onStateChange': onPlayerStateChange
			}
		});
	}

	function onPlayerReady(event) {
		//event.target.playVideo();
		if( bandVideoInicial ) {	// Si el video va en la carga de la pagina da play
			player1.playVideo();
		}
	}

	function onPlayerStateChange(event) {
		/*if (event.data == YT.PlayerState.PLAYING) {
		  //coding
		}*/
	}
	function stopVideo() {
		//player1.stopVideo();
		player1.pauseVideo();
		player1.seekTo(1);
	}
	function playVideo() {
		player1.playVideo();
	}