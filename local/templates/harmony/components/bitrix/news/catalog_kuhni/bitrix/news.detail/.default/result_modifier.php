<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock as HL,
    Seonity\Bitrix\Catalog,
    Seonity\Bitrix\Cache,
    Seonity\Bitrix\Iblock,
    Seonity\Harmony\KitchenMaterials;

$projectsIblockId = 10;
Cache::registerIblockTag($projectsIblockId, $this->__component);

$props = $arResult['PROPERTIES'];

$arResult['GALLERY'] = [];

if (!empty($arResult['DETAIL_PICTURE'])) {
    $img = Catalog::getResizeImgWithPopup($arResult['DETAIL_PICTURE'], 556,355);
    if ($img) {
        $arResult['GALLERY'][] = $img;
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


/* ****** Связанный материал кухни ********* */

$arResult['MATERIAL'] = false;

$materialEll = KitchenMaterials::getByXmlId($props['MATERIAL_LINK']['VALUE']);


if ($materialEll) {
    $arResult['MATERIAL'] = $materialEll;

    $arResult['MATERIAL']['GALLERY'] = [];

    if ($materialEll['UF_GALLERY']) {
        $count = 0;
        foreach ($materialEll['UF_GALLERY'] as $fileId) {
            $count++;
            $resizePicture = \CFile::ResizeImageGet(
                $fileId,
                ["width" => 150, 'height' => 205],
                BX_RESIZE_IMAGE_EXACT
            );
            if ($resizePicture) {
                $arResult['MATERIAL']['GALLERY'][]  = $resizePicture['src'];
            }

            if ($count == 4) break;
        }
    }
}

/* ****** Проекты ******* */

$arResult['PROJECTS'] = [];
$sections = \Seonity\Bitrix\Iblock::getAllSectionsIds($arResult['ID']);


$query = CIBlockElement::GetList(
         ['rand' => 'ASC'],
         [
             'IBLOCK_ID' => $projectsIblockId,
             'PROPERTY_KUHNI_SECTIONS' => $sections
         ],
         false,
         [ "nPageSize" => 2 ],
         [
             'ID',
             'IBLOCK_ID',
             'NAME',
             'DETAIL_PICTURE',
             'DETAIL_PAGE_URL',
             'PROPERTY_LOCATION'
         ]
);

while ($ell = $query->getNext()) {

    $ell['DETAIL_PICTURE_RESIZE'] = '';

    if ($ell["DETAIL_PICTURE"]) {
        $resizePicture = CFile::ResizeImageGet(
            $ell["DETAIL_PICTURE"],
            array("width" => 560, 'height'=> 355),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        if ($resizePicture) {
            $ell['DETAIL_PICTURE_RESIZE'] = $resizePicture['src'];
        }
    }

    $arResult['PROJECTS'][] = $ell;

}


/* ****** Статическая перелинковка ****** */

// Статическая перелинковка
$arResult['OTHER_ITEMS'] = Iblock::getOtherArticlesWithProperties(
    $arResult['ID'],
    $arParams['IBLOCK_ID'],
    ['SECTION_ID' => $sections],
    5
);





