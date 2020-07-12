<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


foreach ($arResult['ITEMS'] as &$item) {
    var_dump($item['PROPERTIES']);
    $item['DETAIL_PICTURE']['RESIZE'] = '';
    if ($item["DETAIL_PICTURE"]) {
        $resizePicture = CFile::ResizeImageGet(
            $item["DETAIL_PICTURE"],
            array("width" => 360, 'height'=> 240),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        if ($resizePicture) {
            $item['DETAIL_PICTURE']['RESIZE'] = $resizePicture['src'];
        }
    }
}