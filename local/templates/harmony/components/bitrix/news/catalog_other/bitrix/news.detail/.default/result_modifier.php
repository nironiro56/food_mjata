<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock as HL,
    Seonity\Bitrix\Catalog,
    Seonity\Bitrix\Iblock;

$props = $arResult['PROPERTIES'];

$arResult['GALLERY'] = [];

if (!empty($arResult['DETAIL_PICTURE'])) {
    $img = Catalog::getResizeImgWithPopup($arResult['DETAIL_PICTURE'], 488,355, BX_RESIZE_IMAGE_PROPORTIONAL);
    if ($img) {
        $arResult['GALLERY'][] = $img;
    }
}

if (!empty($props['GALLERY']['VALUE'])) {
    foreach ($props['GALLERY']['VALUE'] as $galleryImg) {
        $img = Catalog::getResizeImgWithPopup($galleryImg, 488,355, BX_RESIZE_IMAGE_PROPORTIONAL);
        if ($img) {
            $arResult['GALLERY'][] = $img;
        }
    }
}


/* **** Характеристики ***** */
$arResult['SPECIFICATIONS'] = [];


foreach ($props as $property) {
    if (preg_match("/^sp_.*/i", $property['CODE']) && !empty($property['VALUE'])) {
        $arResult['SPECIFICATIONS'][] = [
            'NAME' => $property['NAME'],
            'VALUE' => $property['VALUE']
        ];
    }
}

/* ****** Статическая перелинковка ****** */

$sections = \Seonity\Bitrix\Iblock::getAllSectionsIds($arResult['ID']);

// Статическая перелинковка
$arResult['OTHER_ITEMS'] = Iblock::getOtherArticlesWithProperties(
    $arResult['ID'],
    $arParams['IBLOCK_ID'],
    ['SECTION_ID' => $sections],
    5
);

//\Seonity\Helpers\Debug::pr($arResult['OTHER_ITEMS']);

