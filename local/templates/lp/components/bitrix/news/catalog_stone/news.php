<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

global $arStoneTypeFilter, $arBrandsFilter;

$APPLICATION->IncludeFile(
    '/include/stone/top-form-1.php',
    Array(),
    Array( "MODE" => "php" ));

$APPLICATION->IncludeFile(
    '/include/stone/featuresmini.php',
    Array(),
    Array( "MODE" => "php" ));



$arStoneTypeFilter = ["UF_SECTION_TYPE" => 1];
$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "stone_types",
    Array(
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "COUNT_ELEMENTS" => "N",
        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
        "FILTER_NAME" => "arStoneTypeFilter",
        "HIDE_SECTION_NAME" => "N",
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "SECTION_CODE" => "",
        "SECTION_FIELDS" => array("",""),
        "SECTION_ID" => "",
        "SECTION_URL" => "#SITE_DIR#/stone/#SECTION_CODE#/",
        "SECTION_USER_FIELDS" => array("UF_SECTION_TYPE",""),
        "SHOW_PARENT_NAME" => "N",
        "TOP_DEPTH" => "10",
        "VIEW_MODE" => "LINE"
    ),
    null,
    Array(
        'HIDE_ICONS' => 'Y'
    )
);

$APPLICATION->IncludeFile(
    '/include/stone/product_types.php',
    Array(),
    Array( "MODE" => "php" ));

$APPLICATION->IncludeFile(
    '/include/stone/text_main_listing.php',
    Array(),
    Array( "MODE" => "php" ));

$APPLICATION->IncludeFile(
    '/include/stone/info-section-1.php',
    Array(),
    Array( "MODE" => "php" ));

$APPLICATION->IncludeFile(
    '/include/stone/text_main_listing-2.php',
    Array(),
    Array( "MODE" => "php" ));


$arBrandsFilter = ["UF_SECTION_TYPE" => 3];
$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "stone_brands_logos",
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
        "SECTION_ID" => "",
        "SECTION_URL" => "#SITE_DIR#/stone/#SECTION_CODE#/",
        "SECTION_USER_FIELDS" => array("UF_SECTION_TYPE",""),
        "SHOW_PARENT_NAME" => "N",
        "TOP_DEPTH" => "10",
        "VIEW_MODE" => "LINE"
    ),
    null,
    Array(
        'HIDE_ICONS' => 'Y'
    )
);

$APPLICATION->IncludeFile(
    '/include/stone/stone_bottom_form.php',
    Array(),
    Array( "MODE" => "php" ));





