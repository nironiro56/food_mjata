<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock as HL;

foreach ($arResult['ITEMS'] as &$item) {
    $item['DETAIL_PICTURE']['RESIZE'] = '';
    if ($item["DETAIL_PICTURE"]) {
        $resizePicture = CFile::ResizeImageGet(
            $item["DETAIL_PICTURE"],
            array( "width" => 117, 'height' => 117 ),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        if ($resizePicture) {
            $item['DETAIL_PICTURE']['RESIZE'] = $resizePicture['src'];
        }
    }
}