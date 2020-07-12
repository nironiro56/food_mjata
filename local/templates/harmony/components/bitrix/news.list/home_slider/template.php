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


<div class="mainframe_slider full-width">
    <div class="swiper-container">
        <div class="swiper-wrapper">
<? foreach($arResult["ITEMS"] as $arItem) { ?>
    <? if (empty($arItem['PREVIEW_PICTURE']['RESIZE'])) continue; ?>
            <div class="swiper-slide">
                <? if (!empty($arItem['PROPERTIES']['LINK']['VALUE'])) { ?>
                <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>" class="mainframe_link">
                    <img src="<?=$arItem['PREVIEW_PICTURE']['RESIZE']?>" class="mainframe_img" alt="">
                    <div class="mainframe_bookmark">
                        Подробнее..
                    </div>
                </a>
        <? } else { ?>
                    <div class="mainframe_link">
                        <img src="<?=$arItem['PREVIEW_PICTURE']['RESIZE']?>" class="mainframe_img" alt="">
                    </div>
        <? } ?>
            </div>
    <? } ?>
        </div>
    </div>
    <div class="swiper-counter">
        <p class="counter-curent"></p>
        <p class="counter-max"></p>
    </div>
</div>
