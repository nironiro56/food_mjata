<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

# Resize DETAIL_PICTURE
foreach ($arResult["ITEMS"] as &$item) {
    $item['DETAIL_PICTURE']['RESIZE'] = '';
    if ($item["DETAIL_PICTURE"]["ID"]) {
        $resizePicture = CFile::ResizeImageGet(
            $item["DETAIL_PICTURE"],
            array("width" => 560, 'height'=> 355),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        if ($resizePicture) {
            $item['DETAIL_PICTURE']['RESIZE'] = $resizePicture['src'];
        }
    }
}