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
use Seonity\Helpers\Html;

$this->setFrameMode(true);

$props = $arResult['PROPERTIES'];

?>

            <div class="title_box--page">
                <h1>
                    <?=$arResult['H1']?>
                </h1>
            </div>

<div class="sticker">
    <div class="row row-flex flex-stretch">
        <? if ($arResult['DETAIL_PICTURE']['RESIZE']) { ?>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <a data-fancybox="project-img" href="<?= $arResult['DETAIL_PICTURE']['RESIZE']['IMG'] ?>">
                <img src="<?= $arResult['DETAIL_PICTURE']['RESIZE']['THUMB'] ?>" alt="" class="img-shadow">
            </a>
        </div>
        <? } ?>
        <div class="col-lg-6 col-md-6 col-xs-12 flex-column">
            <? if (!empty($props['TASK']['VALUE'])) { ?>
            <div class="sticker_box">
                <p class="sticker_title">Задача</p>
                <p class="sticker_text">
                    <?=nl2br($props['TASK']['VALUE'])?>
                </p>
            </div>
            <? } ?>
            <? if (!empty($props['SOLUTION']['VALUE'])) { ?>
            <div class="sticker_box sticker_box--blue">
                <p class="sticker_title">Решение</p>
                <p class="sticker_text">
                    <?=nl2br($props['SOLUTION']['VALUE'])?>
                </p>
            </div>
            <? } ?>
        </div>
    </div>
</div>
<div class="minislider">
    <div class="row">
        <? if (!empty($props['VIDEO_ID']['VALUE'])) { ?>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="info_title info_title--left">
                <p>
                    Видео
                </p>
            </div>
            <div data-video-id="<?=$props['VIDEO_ID']['VALUE']?>" class="video_box show-youtube">
                <div class="video_poster"
                     style="background-image: url('<?=Html::getYoutubeScreenS($props['VIDEO_ID']['VALUE'])?>')"></div>
            </div>
        </div>
        <? } ?>

        <? if (!empty($arResult['GALLERY'])) { ?>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="info_title info_title--left">
                <p>
                    Галерея
                </p>
            </div>
            <div class="minislider_box">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['GALLERY'] as $image) { ?>
                        <div class="swiper-slide">
                            <a href="<?=$image['IMG']?>" data-fancybox="project-img" class="minislider_slide" style="background-image: url('<?=$image['THUMB']?>');"></a>
                        </div>
                        <? } ?>
                    </div>
                </div>
                <div class="minislider_nav minislider_nav--prev"></div>
                <div class="minislider_nav minislider_nav--next"></div>
            </div>
        </div>
        <? } ?>
    </div>
</div>
<? if (!empty($arResult['DETAIL_TEXT'])) { ?>
<div class="text">
    <div class="row">
        <div class="col-xs-12">
            <div class="text_box">
                <?=$arResult['DETAIL_TEXT']?>
            </div>
        </div>
    </div>
</div>
<? } ?>


<? if (!empty($arResult['OTHER_ITEMS'])) { ?>
<div class="cardext">
    <div class="row">
        <? foreach($arResult['OTHER_ITEMS'] as $arItem) { ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a onclick="" href="<?=$arItem['DETAIL_PAGE_URL']?>" class="cardext_box" style="background-image: url('<?=$arItem['DETAIL_PICTURE']['RESIZE']?>');">
                    <div class="cardext_head">
                        <p class="cardext_title"><?=$arItem['NAME']?></p>
                        <div class="cardext_subtitle">
                            <? if ($arItem['PROPERTIES']['LOCATION']['VALUE']) { ?>
                                <i class="icon icon_location"></i><?=$arItem['PROPERTIES']['LOCATION']['VALUE']?>
                            <? } ?>

                        </div>
                    </div>
                    <div class="cardext_foot">
                        <button class="btn btn-primary">Смотреть подробнее</button>
                    </div>
                </a>
            </div>
        <? } ?>
    </div>
</div>
<? } ?>