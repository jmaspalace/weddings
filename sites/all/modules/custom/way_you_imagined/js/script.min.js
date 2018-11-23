// JavaScript Document
(function($){
  $(window).load(function(){

	  $('.form-item-send-promotion label')

	  $( "<span></span>" ).insertAfter( ".form-item-send-promotion label input[type=checkbox]" );

 $( document ).ajaxComplete(function( event,response, settings ) {

	 if(response.responseJSON[2].data == ''){
		 if( $('#way-you-imagined-form-info').length != 0 ){
			 $('#way-you-imagined-form-info').find("input[type=text]").val('');
		 }

	 }
});



});

})(jQuery);
