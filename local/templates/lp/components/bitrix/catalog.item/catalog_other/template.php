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

<div class="card_box <?=$customItemClass?>">
    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="card_photo">
        <? if ($arItem['DETAIL_PICTURE']['RESIZE']) { ?>
            <img src="<?=$arItem['DETAIL_PICTURE']['RESIZE']?>" alt="">
        <? } ?>
        <div class="card_photo_offer_group">
            <? foreach ($arItem['STICKERS'] as $sticker) { ?>
                <div class="card_photo_offer" style="background-color: <?=$sticker['COLOR']?>;border-color: <?=$sticker['COLOR']?>">
                    <span><?=$sticker['NAME']?></span>
                </div>
            <? } ?>
        </div>
    </a>
    <div class="card_info">
        <p class="card_info_title"><?=$arItem['NAME']?></p>
        <div class="card_info_simple">
            <div class="card_info_attr">
                <div class="card_info_attr_price">
                    <!--<del>15 000 руб</del>-->
                </div>
                <div class="card_info_attr_price">
                    <p>
                        <?
                        $price_prefix = !empty($props['PRICE_BY']['VALUE'])
                            ? "от <strong>"
                            : "<strong>";
                        echo Catalog::formatPrice($props['PRICE']['VALUE'], $price_prefix, ' </strong> руб');
                        ?>
                    </p>
                </div>
            </div>
            <div class="card_info_submit_group">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-warning">
                    Подробнее
                </a>
            </div>
        </div>
    </div>
</div>

