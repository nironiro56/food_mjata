<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult['ITEM']))  {

    $arResult['ITEM'] = \Seonity\Bitrix\Iblock::resizePreviewPicture(
        $arResult['ITEM'],
        555,
        300
    );
    
}
