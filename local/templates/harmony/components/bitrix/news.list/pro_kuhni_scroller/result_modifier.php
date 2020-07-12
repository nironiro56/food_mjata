<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

# Resize DETAIL_PICTURE
/*foreach ($arResult["ITEMS"] as &$item) {
    $item['DETAIL_PICTURE']['RESIZE'] = '';
    if ($item["DETAIL_PICTURE"]) {
        $resizePicture = CFile::ResizeImageGet(
            $item["DETAIL_PICTURE"],
            array("width" => 750, 'height'=> 381),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        if ($resizePicture) {
            $item['DETAIL_PICTURE']['RESIZE'] = $resizePicture['src'];
        }
    }
}*/
