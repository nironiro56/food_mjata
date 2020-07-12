<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

# Resize DETAIL_PICTURE
foreach ($arResult["SECTIONS"] as &$item) {
    $item['PICTURE']['RESIZE'] = '';
    if (!empty($item["PICTURE"]['ID'])) {
        $resizePicture = CFile::ResizeImageGet(
            $item["PICTURE"]['ID'],
            array("width" => 300, 'height'=> 100),
            BX_RESIZE_IMAGE_PROPORTIONAL,
            true
        );
        if ($resizePicture) {
            $item["PICTURE"]['RESIZE'] = $resizePicture['src'];
        }
    }
}