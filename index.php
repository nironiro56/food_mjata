<?
require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php" );
$APPLICATION->SetTitle("Кухни Гармония");
global $arFilerTopKuhon;
?>


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
            <div class="col-lg-4 col-md-4 col-xs-12 col-zpl">
               <?$APPLICATION->IncludeFile(
                   '/include/home/top-slider-links.php',
                   Array(),
                   Array( "MODE" => "php" ));?>
            </div>
        </div>
    </div>

    <div class="buildform hidden-xs">
        <div class="row">
            <div class="col-lg-12">
                <div class="buildform_box full-width">
                    <div class="buildform_row">
                        <div class="buildform_title">
                            <p>
                                Подберите проект из нашего каталога
                            </p>
                        </div>
                    </div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:catalog.smart.filter",
                        "home_filter",
                        Array(
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "CONVERT_CURRENCY" => "N",
                            "DISPLAY_ELEMENT_COUNT" => "N",
                            "FILTER_NAME" => "arrFilter",
                            "FILTER_VIEW_MODE" => "horizontal",
                            "HIDE_NOT_AVAILABLE" => "N",
                            "IBLOCK_ID" => "5",
                            "IBLOCK_TYPE" => "catalog",
                            "PAGER_PARAMS_NAME" => "arrPager",
                            "POPUP_POSITION" => "left",
                            "PREFILTER_NAME" => "smartPreFilter",
                            "SAVE_IN_SESSION" => "N",
                            "SECTION_CODE" => "",
                            "SECTION_CODE_PATH" => "",
                            "SECTION_DESCRIPTION" => "-",
                            "SECTION_ID" => $sectionId,
                            "SECTION_TITLE" => "-",
                            "SEF_MODE" => "N",
                            "SEF_RULE" => "",
                            "SMART_FILTER_PATH" => "",
                            "TEMPLATE_THEME" => "",
                            "XML_EXPORT" => "N"
                        )
                    );?>
                </div>
            </div>
        </div>
    </div>


<?$APPLICATION->IncludeFile(
    '/include/home/categories-block.php',
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
        "IBLOCK_ID" => "5",	// Инфоблок
        "IBLOCK_TYPE" => "catalog",	// Тип инфоблока
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


    <div class=" text">
        <div class="row row-flex flex-stretch">
            <div class="col-lg-7 col-md-7 col-xs-12">
                <div class="text_box">
                    <?$APPLICATION->IncludeFile(
                        '/include/home/home_text.php',
                        Array(),
                        Array( "MODE" => "php" ));?>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-xs-12">
                <div class="title_box title_box--left">
                    <p>PRO Кухни</p>
                </div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "pro_kuhni_scroller",
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
                        "FIELD_CODE" => array("NAME","DETAIL_PICTURE",""),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "1",
                        "IBLOCK_TYPE" => "news",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "7",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
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
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N"
                    )
                );?>
            </div>
        </div>
    </div>



<?$APPLICATION->IncludeFile(
    '/include/home/action-sertificat.php',
    Array(),
    Array( "MODE" => "php" ));?>


<?$APPLICATION->IncludeFile(
    '/include/projects-tabs.php',
    Array(),
    Array( "MODE" => "php" ));?>


<?$APPLICATION->IncludeFile(
    '/include/reviews_slider.php',
    Array(),
    Array( "MODE" => "php" ));?>

    <div class="jumbowrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbowrap_box full-width">
                    <div class="text_box">
                        <?$APPLICATION->IncludeFile(
                            '/include/home/home_text_2.php',
                            Array(),
                            Array( "MODE" => "php" ));?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?$APPLICATION->IncludeFile(
    '/include/home/feature_box.php',
    Array(),
    Array( "MODE" => "php" ));?>

<?$APPLICATION->IncludeFile(
    '/include/about/about-bottom-contacts.php',
    Array(),
    Array( "MODE" => "php" ));?>


<?$APPLICATION->IncludeFile(
    '/include/form_botom_req.php',
    Array(),
    Array( "MODE" => "php" ));?>

    

<? require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php" ); ?>