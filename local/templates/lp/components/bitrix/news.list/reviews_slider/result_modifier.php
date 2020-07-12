<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */

# Resize DETAIL_PICTURE
foreach ($arResult["ITEMS"] as $key => &$item) {
    if (!empty($item['PROPERTIES']['VIDEO_ID']['VALUE'])) {
        $item['IMAGE'] = \Seonity\Helpers\Html::getYoutubeScreenS(
            $item['PROPERTIES']['VIDEO_ID']['VALUE']
        );
    } else {
        unset($arResult["ITEMS"][$key]);
    }
}
