<?
/*global $arBrandsFilter;
$arBrandsFilter = ["UF_SECTION_TYPE" => 3];*/
$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "stone_type_brands",
    Array(
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "COUNT_ELEMENTS" => "N",
        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
        "FILTER_NAME" => "arBrandsFilter",
        "HIDE_SECTION_NAME" => "N",
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "SECTION_CODE" => "",
        "SECTION_FIELDS" => array("",""),
        "SECTION_ID" => $arCurSection['ID'],
        "SECTION_URL" => "#SITE_DIR#/stone/#SECTION_CODE#/",
        "SECTION_USER_FIELDS" => array("UF_SECTION_TYPE","UF_SHORT_DESCRIPTION"),
        "SHOW_PARENT_NAME" => "N",
        "TOP_DEPTH" => "1",
        "VIEW_MODE" => "LINE"
    ),
    null,
    Array(
        'HIDE_ICONS' => 'Y'
    )
);
?>



