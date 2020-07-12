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
    <div class="row" data-items="true">
        <? foreach($arResult["ITEMS"] as $arItem) { ?>
        <div class="col-lg-6 col-xs-12">
            <div class="term_box">
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
                        <?=$arItem['PREVIEW_TEXT']?>
                    </div>
                <? } ?>
            </div>
        </div>
        <? } ?>
    </div>

    <?=$arResult['NAV_STRING']?>

</div>

