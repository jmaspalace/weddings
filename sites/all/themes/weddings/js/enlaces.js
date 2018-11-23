jQuery(document).ready(function(){

    var hostname = window.location.hostname;
    var select_resort = jQuery('#select_resort');
    if(hostname.indexOf("weddings") !== -1){
        select_resort.change(function(){
            if(select_resort.val() === '65'){
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/cancun-mexico/beach-palace-be/booking-engine/ibe5.main')
            }
            if(select_resort.val() === '66'){
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/cozumel-mexico/cozumel-palace-be/booking-engine/ibe5.main')
            }
            if(select_resort.val() === '67'){
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/isla-mujeres-mexico/isla-mujeres-palace-be/booking-engine/ibe5.main')
            }
            if(select_resort.val() === '111'){
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/cancun-mexico/le-blanc-spa-resort-be/booking-engine/ibe5.main')
            }
            if(select_resort.val() === '112'){
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/cancun-mexico/moon-palace-cancun-be/booking-engine/ibe5.main')
            }
            if(select_resort.val() === '113'){
                //jQuery('input#code_vuelo').val('https://www.reservhotel.com/ocho-rios-jamaica/moon-palace-jamaica-grande-be/booking-engine/ibe5.main')
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/ocho-rios-jamaica/moon-palace-jamaica-grande-be/booking-engine/ibe5.main')
            }
            if(select_resort.val() === '74'){
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/playa-del-carmen-mexico/playacar-palace/booking-engine/ibe5.main')
            }
            if(select_resort.val() === '75'){
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/cancun-mexico/sun-palace/booking-engine/ibe5.main')
            }
            if(select_resort.val() === '114'){
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/cancun-mexico/the-grand-at-moon-palace-cancun/booking-engine/ibe5.main')
            }
            if(select_resort.val() === '150'){
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/los-cabos-mexico/le-blanc-los-cabos-be/booking-engine/ibe5.main')
            }
          if(select_resort.val() === '248' || select_resort.val() === '249'){
                jQuery('input#code_vuelo').val('https://www.reservhotel.com/los-cabos-mexico/le-blanc-los-cabos-be/booking-engine/ibe5.main')
          }
        });
        console.log('weddings');
    }

});