<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>
<div class="catalog-cards cards-other">
    <div class="row">
        <? foreach ($arResult['ITEMS'] as $arItem) { ?>
        <? $props = $arItem['PROPERTIES'] ?>
        <div class="col-lg-3 col-md-3">
            <? $APPLICATION->IncludeComponent(
                "bitrix:catalog.item",
                "catalog_other",
                Array(
                    'RESULT' => [
                        'ITEM' => $arItem
                    ],
                    "CUSTOM_CLASS" => "card_box--standalone"
                )
            ); ?>
        </div>
        <? } ?>

    </div>
    <div class="row">
        <div class="col-xs-12">
            <?=$arResult['NAV_STRING']?>
        </div>
    </div>
</div>
<? $curSection = end($arResult["SECTION"]["PATH"]); ?>
<? if ($curSection["DESCRIPTION"]) { ?>
    <div class="jumbowrap">
        <div class="row">
            <div class="col-xs-12">
                <div class="jumbowrap_box">
                    <?=$curSection["DESCRIPTION"]?>
                </div>
            </div>
        </div>
    </div>
<? } ?>