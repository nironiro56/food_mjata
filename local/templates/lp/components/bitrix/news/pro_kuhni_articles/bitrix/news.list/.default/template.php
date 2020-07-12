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
$this->setFrameMode(true);
use Seonity\Helper;
//Helper::pr($arResult);
?>


<div class="term" data-parent="true" id="actions_list_page">
    <div class="row flex-wrap-md" data-items="true">
        <? foreach($arResult["ITEMS"] as $arItem) { ?>
        <div class="col-lg-6 col-xs-12">
            <? $APPLICATION->IncludeComponent(
                "bitrix:catalog.item",
                "pro_kuhni",
                Array(
                    'RESULT' => [
                        'ITEM' => $arItem
                    ],
                    //"CUSTOM_CLASS" => ""
                )
            ); ?>
        </div>
        <? } ?>
    </div>

    <?=$arResult['NAV_STRING']?>

</div>

