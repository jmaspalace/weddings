<?php
	global $language ;
	$lang_name = $language->language;

	$code_country = ""; //$_SERVER['GEOIP_COUNTRY_CODE'];
	$code_continent = ""; //$_SERVER['GEOIP_CONTINENT_CODE'];
?>
<section class='bloque-booking'>
    <div class="cerrar_booking">x</div>
    <div class="dv_booking_form">
        <div class="dv_booking_form_only_us">
            <form action="" id="form_book_now">
                <!-- vars flying -->
                <input type="hidden" id="code_vuelo" name="code_vuelo" value="https://www.reservhotel.com">
                <!-- END vars flying -->
                <input type="hidden" value="<?php print $lang_name ?>" name="lang" id="lang">
                <input type="hidden" value="<?php print $code_country; ?>" name="country" id="country">
                <input type="hidden" value="<?php print $code_continent; ?>" name="continent" id="continent">

                <div class="dv_icons_booking">
                    <button class="icons_form_booking">
                        <img class="img-green" src='<?php print base_path().drupal_get_path('theme', 'weddings')."/img/book-icon-1.png"?>' id="icon_resort" title="<?php print t('Resort'); ?>" alt="<?php print t('Resort'); ?>">
                        <img class ="img-white" src="<?php print base_path().drupal_get_path('theme', 'weddings')."/img/book-icon-1-green2.png"?>" id="icon_resort" title="<?php print t('Resort + Flight'); ?>" alt="<?php print t('Resort + Flight'); ?>">
                        <p><?php print t('Resort'); ?></p>
                    </button>
                    <button class="icons_form_booking icon_form_flying">
                        <img class="img-green" src='<?php print base_path().drupal_get_path('theme', 'weddings')."/img/book-icon-2.png"?>' id="icon_resort" title="<?php print t('Resort + Flight'); ?>" alt="<?php print t('Resort + Flight'); ?>">
                        <img class="img-white" src="<?php print base_path().drupal_get_path('theme', 'weddings')."/img/book-icon-2-green2.png"?>" id="icon_resort" title="Resort + Flight" alt="Resort + Flight">
                        <p><?php print t('Resort + Flight'); ?></p>
                    </button>
                </div>

                <input type="text" id="edit-text-flight" placeholder="<?php print t("Origin"); ?>" class="origin">
                <input id="data_flight" type="hidden" name="Origin" value="">

                <div class="dv_inputs">
                    <div class="required__fields">
                        <select name="" id="select_resort" data-parsley-errors-container="#error_select_hotel" data-parsley-error-message="Required" class="form-select-resort">
                            <option value=""><?php print t('Select Resort'); ?></option>
                            <option value="65">Beach Palace</option>
                            <option value="66">Cozumel Palace</option>
                            <option value="67">Isla Mujeres Palace</option>
                            <option value="75">Sun Palace</option>
                            <option value="74">Playacar Palace</option>
                            <option value="114">The Grand at Moon Palace Cancun</option>
                            <option value="112">Moon Palace Cancun</option>
                            <option value="113">Moon Palace Jamaica</option>
                            <option value="111">Le Blanc Spa Resort</option>
                            <option value="249">Le Blanc Los Cabos</option>
                        </select>
                        <span id="error_select_hotel"></span>
                    </div>
                    <div class="required__fields">
                        <input data-parsley-errors-container="#error_check_in" data-parsley-error-message="<?php print t("Required") ?>" type="text" id="check_in_input" placeholder="<?php print t("Check in"); ?>" class="date_inputs check_in_input" data-today="<?php echo date('Y-m-d');?>">
                        <span id="error_check_in"></span>
                    </div>
                    <div class="required__fields">
                        <?php
                        $fechaNow = date('Y-m-d');
                        $fecha = new DateTime($fechaNow);
                        $fecha->add(new DateInterval('P5D'));
                        $fechaInit = date('Y-m-d');
                        $fechaAdd = new DateTime($fechaInit);
                        $fechaAdd->add(new DateInterval('P1D'));
                        ?>
                        <input data-parsley-errors-container="#error_check_out" type="text" id="check_out_input" placeholder="<?php print t("Check out"); ?>" class="date_inputs check_out_input" data-parsley-error-message="<?php print t("Required") ?>" data-checkout="<?php echo $fecha->format('Y-m-d');?>" data-init="<?php echo $fechaAdd->format('Y-m-d');?>">
                        <span id="error_check_out"></span>
                    </div>
                </div>
                <select name="" id="select_Rooms" class="form-select-rooms">
                    <option value="1" selected>1 <?php print t("Room"); ?></option>
                    <option value="2">2 <?php print t("Rooms"); ?></option>
                    <option value="3">3 <?php print t("Rooms"); ?></option>
                    <option value="4">4 <?php print t("Rooms"); ?></option>
                    <option value="5">5 <?php print t("Rooms"); ?></option>
                </select>
                <select name="" id="select_adults" class="form-select-adults">
                    <option value="1">1 <?php print t("Adult"); ?></option>
                    <option value="2" selected>2 <?php print t("Adults"); ?></option>
                    <option value="3">3 <?php print t("Adults"); ?></option>
                    <option value="4">4 <?php print t("Adults"); ?></option>
                </select>
                <div class="dv_input_kids" class="form-select-kids">
                    <select name="" id="select_kids">
                        <option value="0" selected>0 <?php print t("Kids"); ?></option>
                        <option value="1">1 <?php print t("Kid"); ?></option>
                        <option value="2">2 <?php print t("Kids"); ?></option>
                        <option value="3">3 <?php print t("Kids"); ?></option>
                        <option value="4">4 <?php print t("Kids"); ?></option>
                    </select>
                    <div class="dv_years_kids">
                        <p class="close">x</p>
                        <div class="dv_year_kids_1">
                            <span><?php print t("Age"); ?>:</span>
                            <select name="year_kids[]" id="year_kid_1">
                                <option value="infants">0 - 3 <?php print t("Years"); ?></option>
                                <option value="childrens">4 - 12 <?php print t("Years"); ?></option>
                                <option value="teenagers">13 - 17 <?php print t("Years"); ?></option>
                            </select>
                        </div>
                        <div class="dv_year_kids_2">
                            <span><?php print t("Age"); ?>:</span>
                            <select name="year_kids[]" id="year_kid_2">
                                <option value="infants">0 - 3 <?php print t("Years"); ?></option>
                                <option value="childrens">4 - 12 <?php print t("Years"); ?></option>
                                <option value="teenagers">13 - 17 <?php print t("Years"); ?></option>
                            </select>
                        </div>
                        <div class="dv_year_kids_3">
                            <span><?php print t("Age"); ?>:</span>
                            <select name="year_kids[]" id="year_kid_3">
                                <option value="infants">0 - 3 <?php print t("Years"); ?></option>
                                <option value="childrens">4 - 12 <?php print t("Years"); ?></option>
                                <option value="teenagers">13 - 17 <?php print t("Years"); ?></option>
                            </select>
                        </div>
                        <div class="dv_year_kids_4">
                            <span><?php print t("Age"); ?>:</span>
                            <select name="year_kids[]" id="year_kid_4">
                                <option value="infants">0 - 3 <?php print t("Years"); ?></option>
                                <option value="childrens">4 - 12 <?php print t("Years"); ?></option>
                                <option value="teenagers">13 - 17 <?php print t("Years"); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <button id="btn_book_now"><?php print t("BOOK NOW"); ?></button>
                <a id="a_book_now" target="_blank"></a>
            </form>
        </div>
    </div>
</section>