<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
use \Seonity\Helper;
$props = &$arResult['PROPERTIES'];

if (!empty($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"])) {
    $arResult['H1'] = $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"];
} else {
    $arResult['H1'] = $arResult['NAME'];
}

# Resize DETAIL_PICTURE
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
}


// Статическая перелинковка
$addSelect = [];
$otherArticles = Helper::getOtherArticles(
    $arResult['ID'],
    $arParams['IBLOCK_ID'],
    $addSelect,
    2);

$arResult['OTHER_ARTICLES'] = [];
foreach ($otherArticles as $item) {
    if ($item['PREVIEW_PICTURE']) {
        $arFile = CFile::GetFileArray($item["PREVIEW_PICTURE"]);
        $resizePicture = CFile::ResizeImageGet(
            $arFile,
            array("width" => 555, 'height'=> 300),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        $item['PICTURE'] = $resizePicture['src'];
    } else {
        $item['PICTURE'] = '/assets/img/photos/offer.jpg';
    }

    $arResult['OTHER_ARTICLES'][] = $item;
}
