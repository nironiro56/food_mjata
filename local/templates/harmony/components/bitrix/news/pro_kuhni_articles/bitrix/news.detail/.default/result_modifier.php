<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
use \Seonity\Helper,
    Seonity\Bitrix\Iblock;

$props = &$arResult['PROPERTIES'];

if (!empty($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"])) {
    $arResult['H1'] = $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"];
} else {
    $arResult['H1'] = $arResult['NAME'];
}

/*# Resize DETAIL_PICTURE
$arResult['DETAIL_PICTURE']['RESIZE'] = '';
if ($arResult["DETAIL_PICTURE"]['ID']) {
    $resizePicture = CFile::ResizeImageGet(
        $arResult["DETAIL_PICTURE"],
        array( "width" => 1140, 'height' => 470 ),
        BX_RESIZE_IMAGE_EXACT,
        true
    );
    if ($resizePicture) {
        $arResult['DETAIL_PICTURE']['RESIZE'] = $resizePicture['src'];
    }
}*/


// Статическая перелинковка
$arResult['OTHER_ITEMS'] = Iblock::getOtherArticlesWithProperties(
    $arResult['ID'],
    $arParams['IBLOCK_ID'],
    [],
    2
);
