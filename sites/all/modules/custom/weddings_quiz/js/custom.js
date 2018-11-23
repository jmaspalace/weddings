
(function($){
    $(document).ready(function(){
       if ($('#img_fondo_resultado').length){
            $('.page-quiz').css('background-image','url('+$('#img_fondo_resultado').val()+')');      
        }
        if ($('#img_fondo_preguntas').length){
            $('.page-quiz-question').css('background-image','url('+$('#img_fondo_preguntas').val()+')');      
        }
        if ($('#img_fondo_preguntas').length){
            $('.page-quiz-ini').css('background-image','url('+$('#img_fondo_preguntas').val()+')'); 
        } 
    });
})(jQuery);