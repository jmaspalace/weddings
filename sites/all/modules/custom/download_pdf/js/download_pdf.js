(function($){
  $(document).ready(function(){
    var lang = $('html').attr('lang');
    if( typeof(lang) === 'undefined' || $.trim(lang) == '' )
      lang = 'en';

    $("#info_agent").hide();
    $("#ceremony_date_picker").datetimepicker({locale: lang});
    $('#arrival_date_picker').datetimepicker({
      format: 'MM/DD/YYYY',
      locale: lang
    });
    $('#departure_day_picker').datetimepicker({
      format: 'MM/DD/YYYY',
      locale: lang
    });

    $("#edit-travel-agent input").click(function() {
      if($("#edit-travel-agent input:checked").val() == 'yes')
        $("#info_agent").show();
      else
        $("#info_agent").hide();
    });

    $().filterPdfs();

    $( "#mail_seller" ).change(function() {
      var urlRequestform = $("#url_requestform").val();
      $("#url_mail_seller").val(urlRequestform+$("#mail_seller").val());
      $("#link_rf").attr("href", "requestform/"+$("#mail_seller").val());
      $("#link_sirf").attr("href", "siteinspectionrequestform/"+$("#mail_seller").val());
    });

    /**siteinspectionrequestform**/
    $("#edit-staying-pr-no--2").hide();

    $("#arrival_date_site_picker").datetimepicker();
    $("#departure_day_site_picker").datetimepicker();
    $("#wedding_date_picker").datetimepicker({
      format: 'MM/DD/YYYY'
    });
    $("#date_time_requested_picker").datetimepicker();

    $("#edit-staying-pr input").click(function() {
      if($("#edit-staying-pr input:checked").val() == 'no')
        $("#edit-staying-pr-no--2").show();
      else
        $("#edit-staying-pr-no--2").hide();
    });

    /* Filtro de resorts para bodas del mismo sexo */
    var tempOptions = undefined;
    $('#edit-ceremony-type').change(function(){
      if( $(this).val().toLowerCase() === 'same sex wedding' || $(this).val().toLowerCase() === 'boda del mismo sexo' ) {
        tempOptions = $('#edit-resort').find('option').not( $('#edit-resort').find('option[value="Isla Mujeres Palace (Mexico)"], option[value="Isla Mujeres Palace (México)"], option[value=""]') ).detach();
      } else {
        $('#edit-resort').append(tempOptions);
        tempOptions = undefined;
      }
      $('#edit-resort').val("");
    });
    $('#edit-ceremony-type').change();
  });

  $.fn.filterPdfs = function()
  {
    $("#download-slider").owlCarousel({
      items: 4,
      navigation: true,
      navigationText: false,
      pagination: false,
    });

    $(".question-btn").click(function(){
      var _openQ = $(this).parent().find(".dl-answer");
      $(".dl-answer").not( _openQ ).slideUp();
      $(".question-btn").not( this ).removeClass("dl-active");
      $(this).toggleClass("dl-active");
      _openQ.slideToggle();
      _openQ.toggleClass('dl-open');

    });

    $("#wr-form .formBox > .form-group").addClass("col-md-4");
    $("#info_agent > .form-group").addClass("col-md-4");
    // select invitados adultos
    $(".form-item-guests-adults").removeClass("col-md-4");
    $(".form-item-guests-adults").addClass("col-md-6");
    // select invitados niños
    $(".form-item-guests-children").removeClass("col-md-4");
    $(".form-item-guests-children").addClass("col-md-6");
    /*
    // select tipo de ceremonia
    $(".form-item-ceremony-type").removeClass("col-md-4");
    $(".form-item-ceremony-type").addClass("col-md-6");
    // select legal
    $(".form-item-ceremony-type").removeClass("col-md-4");
    $(".form-item-ceremony-type").addClass("col-md-6");
    // select resort
    $(".form-item-resort").removeClass("col-md-4");
    $(".form-item-resort").addClass("col-md-6");
    */
    // option agentes
    $(".form-type-radios").removeClass("col-md-4");
    $(".form-type-radios").addClass("col-md-12");
    $(".form-type-radio").removeClass("col-md-4");
    $(".form-type-radio").removeClass("col-md-4");
    // clases submit
    $("#wr-form .form-submit").addClass("col-md-4");
  }

})(jQuery);