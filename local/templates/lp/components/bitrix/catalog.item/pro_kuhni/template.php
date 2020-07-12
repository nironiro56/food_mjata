<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $component */

use Seonity\Bitrix\Catalog;

$this->setFrameMode(true);
if (empty($arResult['ITEM'])) return;

$arItem = $arResult['ITEM'];
$props = $arItem['PROPERTIES'];
$customItemClass = isset($arParams['CUSTOM_CLASS']) ? $arParams['CUSTOM_CLASS'] : "";

?>

<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="term_box <?=$customItemClass?>">
    <? if ($arItem['PREVIEW_PICTURE']['RESIZE']) { ?>
        <div class="term_img_2">
            <img src="<?=$arItem['PREVIEW_PICTURE']['RESIZE']?>" alt="" class="img-responsive">
        </div>
    <? } ?>
    <p class="term_title">
        <?=$arItem['NAME']?>
    </p>
    <? if ($arItem['PREVIEW_TEXT']) { ?>
        <div class="actions-list-desc">
            <? if ($arItem['PREVIEW_TEXT'] || $arItem['DETAIL_TEXT']) {
                echo TruncateText($arItem['PREVIEW_TEXT'], 150);
            } else {
                echo TruncateText(strip_tags($arItem['DETAIL_TEXT']), 150);
            } ?>
        </div>
    <? } ?>
</a>

