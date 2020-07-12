<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

# Resize DETAIL_PICTURE
foreach ($arResult["ITEMS"] as &$item) {
    $item['PREVIEW_PICTURE']['RESIZE'] = '';
    if ($item["PREVIEW_PICTURE"]["ID"]) {
        $resizePicture = CFile::ResizeImageGet(
            $item["PREVIEW_PICTURE"],
            array("width" => 741, 'height'=> 385),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        if ($resizePicture) {
            $item['PREVIEW_PICTURE']['RESIZE'] = $resizePicture['src'];
        }
    }
}
