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

<div class="review" data-parent="true">
    <div class="row" data-items="true">
        <? foreach($arResult["ITEMS"] as $arItem) { ?>
        <div class="col-lg-3 col-md-3">
            <div data-video-id="<?=$arItem['PROPERTIES']['VIDEO_ID']['VALUE']?>" class="reviewslider_slide review_box show-youtube">
                <img src="<?=$arItem['IMAGE']?>" alt="" class="img-responsive">
            </div>
        </div>
        <? } ?>
    </div>

    <?=$arResult['NAV_STRING']?>

</div>

