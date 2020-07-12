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
?>

    <div class="title_box--page">
        <h1><?=$arResult['H1']?></h1>
    </div>

    <div class="text">
        <div class="row">
            <div class="col-xs-12">
                <div class="text_box">
                    <?=$arResult['DETAIL_TEXT']?>
                </div>
            </div>
        </div>
    </div>

<? if ($arResult['OTHER_ITEMS']) { ?>
    <div class="cardext">
        <div class="row">
            <div class="col-xs-12">
                <div class="title_box">
                    <p>
                        Может быть интересно
                    </p>
                </div>
            </div>
            <? foreach ($arResult['OTHER_ITEMS'] as $arItem) { ?>
        <div class="col-sm-6 col-xs-12">
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
    </div>
<? } ?>