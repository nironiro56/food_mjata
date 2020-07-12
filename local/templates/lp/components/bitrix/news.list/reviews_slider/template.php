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
<div class=" reviewslider">
    <div class="row">
        <div class="col-xs-12">
            <div class="title_box">
                <p>
                    Отзывы о наших кухнях
                </p>
            </div>
            <div class="reviewslider_box">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <? foreach($arResult["ITEMS"] as $arItem) { ?>
                        <div class="swiper-slide">
                            <div data-video-id="<?=$arItem['PROPERTIES']['VIDEO_ID']['VALUE']?>" class="reviewslider_slide show-youtube">
                                <img src="<?=$arItem['IMAGE']?>" alt="" class="img-responsive">
                            </div>
                        </div>
                        <? } ?>
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="reviewslider_nav reviewslider_nav--prev"></div>
                <div class="reviewslider_nav reviewslider_nav--next"></div>
            </div>
        </div>
    </div>
</div>

