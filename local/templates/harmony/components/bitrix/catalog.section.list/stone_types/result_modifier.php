<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

# Resize DETAIL_PICTURE
foreach ($arResult["SECTIONS"] as &$item) {
    $item['PICTURE']['RESIZE'] = '';
    if (!empty($item["PICTURE"]['ID'])) {
        $resizePicture = CFile::ResizeImageGet(
            $item["PICTURE"]['ID'],
            array("width" => 323, 'height'=> 320),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        if ($resizePicture) {
            $item["PICTURE"]['RESIZE'] = $resizePicture['src'];
        }
    }
}