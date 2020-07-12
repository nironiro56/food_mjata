<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock as HL,
    Seonity\Bitrix\Catalog,
    Seonity\Bitrix\Iblock;

$props = $arResult['PROPERTIES'];

if (!empty($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"])) {
    $arResult['H1'] = $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"];
} else {
    $arResult['H1'] = $arResult['NAME'];
}

$arResult['GALLERY'] = [];
$arResult['DETAIL_PICTURE']['RESIZE'] = false;

if (!empty($arResult['DETAIL_PICTURE'])) {
    $img = Catalog::getResizeImgWithPopup($arResult['DETAIL_PICTURE'], 556,300);
    if ($img) {
        $arResult['DETAIL_PICTURE']['RESIZE'] = $img;
    }
}

if (!empty($props['GALLERY']['VALUE'])) {
    foreach ($props['GALLERY']['VALUE'] as $galleryImg) {
        $img = Catalog::getResizeImgWithPopup($galleryImg, 556,355);
        if ($img) {
            $arResult['GALLERY'][] = $img;
        }
    }
}


// Статическая перелинковка
$arResult['OTHER_ITEMS'] = Iblock::getOtherArticlesWithProperties(
    $arResult['ID'],
    $arParams['IBLOCK_ID'],
    [],
    2
    );

$arResult['OTHER_ITEMS'] = Iblock::resizeDetailPictures($arResult['OTHER_ITEMS'], 560, 355);




