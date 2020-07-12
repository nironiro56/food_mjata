<?
require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php" );
$APPLICATION->SetTitle("Кухни Гармония");
global $arFilerTopKuhon;
?>

<div class="offer">

 <div class="mainframe">
        <div class="row row-flex flex-strecth">
            <div class="col-lg-8 col-md-8 col-xs-12">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "home_slider",
                    Array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array("NAME","DETAIL_PICTURE","DETAIL_TEXT"),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "11",
                        "IBLOCK_TYPE" => "content",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "100",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => "",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array("LINK",""),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "SORT",
                        "SORT_BY2" => "TIMESTAMP_X",
                        "SORT_ORDER1" => "ASC",
                        "SORT_ORDER2" => "DESC",
                        "STRICT_SECTION_CHECK" => "N"
                    )
                );?>
            </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="offer_secondary_feed">
               <div class ="feed_form">
                <div class="border_form">
                <p><span class="title_feed">Хотите заказать изделие из искусственного камня?</span></p>
                 <p class="feed_form_text">
                        Заполните форму ниже и мы свяжемся с вами в ближайшее время
                    </p>
                    <form>
                    <input type="text" name="name" class="form-control feed_name" placeholder="Ваше имя">
                    <input type="text" name="phone" class="form-control feed_tel" placeholder="+7 (___) ___-__-__" inputmode="text">
                    <div class="form_input feed">
                            <input type="checkbox" class="form-checkbox" checked="" required="" name="user-consent">
                            <label>
                                Отправляя заявку, я соглашаюсь на <a href="#">обработку персональных данных</a>
                            </label>
                        </div>
                        <div class ="button_block">
                        <div class="form_input form_input--double first">
                            <button class="btn btn-lg btn-warning order" type="submit">
                                Заказать дизайн проект
                            </button>
                        </div>
                        <div class="form_input form_input--double">
                            <button class="btn btn-lg btn-warning consultation" type="submit">
                                Получить консультацию
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?$APPLICATION->IncludeFile(
    '/include/lp/features_mini.php',
    Array(),
    Array( "MODE" => "php" ));?>

<? $arFilerTopKuhon = ['PROPERTY_SHOW_IN_HITS' => 1] ?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "top_kuhon",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array("NAME","DETAIL_PICTURE","DETAIL_TEXT"),
        "FILTER_NAME" => "arFilerTopKuhon",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "5", // Инфоблок
        "IBLOCK_TYPE" => "catalog", // Тип инфоблока
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "100",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array("LINK",""),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "TIMESTAMP_X",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "DESC",
        "STRICT_SECTION_CHECK" => "N"
    )
);?>

<?$APPLICATION->IncludeFile(
    '/include/projects-tabs.php',
    Array(),
    Array( "MODE" => "php" ));?>


<?$APPLICATION->IncludeFile(
    '/include/reviews_slider.php',
    Array(),
    Array( "MODE" => "php" ));?>


<?$APPLICATION->IncludeFile(
    '/include/form_botom_req.php',
    Array(),
    Array( "MODE" => "php" ));?>

<?$APPLICATION->IncludeFile(
    '/include/lp/question.php',
    Array(),
    Array( "MODE" => "php" ));?>

  <?$APPLICATION->IncludeFile(
    '/include/home/feature_box.php',
    Array(),
    Array( "MODE" => "php" ));?>

   <?$APPLICATION->IncludeFile(
    '/include/lp/stand_equip.php',
    Array(),
    Array( "MODE" => "php" ));?>

<?$APPLICATION->IncludeFile(
    '/include/home/action-sertificat.php',
    Array(),
    Array( "MODE" => "php" ));?>

       <div class="buildform" style="background-image: linear-gradient(#FAFAFA, white);">
        <div class="row">
            <div class="col-lg-12">
                   <div class="price_title"><span>Узнайте, сколько будет стоить ваша кухня</span>
                    </div>
                    <div class="pagination_items">
                        <a class="noactive" href="#">1</a>
                        <a  href="#" class="active">2</a>
                        <a class="noactive" href="#">3</a>
                        <a class="noactive" href="#">4</a>
                        <a class="noactive" href="#">5</a>
                        <a class="noactive" href="#">6</a>
                    </div>
                    <div class="filter_box full-width">
                        <p class="no_flex_title"><span>Выберите планировку</span></p>
                        <a href="#" class="filter_image">
                            <img src="/assets/img/filter/angle.svg" alt="">
                        </a>
                        <a href="#" class="filter_image">
                            <img src="/assets/img/filter/island.svg" alt="">
                        </a>

                        <a href="#" class="filter_image">
                            <img src="/assets/img/filter/p_shaped.svg" alt="">
                        </a>
                        <a href="#" class="filter_image">
                            <img src="/assets/img/filter/straight.svg" alt="">
                        </a>
                        </div>
                        <div class="select_style">
                            <p class="no_flex_title_style"><span>Выберите стиль</span></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="classic" value="option1">
                                <label class="form-check-label" for="classic">Классический</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id ="loft"  value="option2">
                                <label class="form-check-label" for="loft">Лофт</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="hi_tec" value="option2">
                                <label class="form-check-label" for="hi_tec">Hi-tec</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="modern" value="option2">
                                <label class="form-check-label" for="modern">Модерн</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="minimalism" value="option2">
                                <label class="form-check-label" for="minimalism">Минимализм</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="provans"  value="option2">
                                <label class="form-check-label" for="provans">Прованс</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="katry" value="option2">
                                <label class="form-check-label" for="katry">Катри</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="not_know" value="option2">
                                <label class="form-check-label" for="not_know">Еще не знаю</label>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary next">
                            Следующий шаг
                        </a>
                    </div>
                </div>
            </div>

<? require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php" ); ?>