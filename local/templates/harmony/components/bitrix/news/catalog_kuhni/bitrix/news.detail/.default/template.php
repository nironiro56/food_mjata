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

$props = $arResult['PROPERTIES'];
$h1 = $arResult['NAME'];

?>

<div class="cardy">
    <div class="row">
        <div class="col-xs-12">
            <div class="cardy_title">
                <p><?=$h1?></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="cardy_photo">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['GALLERY'] as $galleryItem) { ?>

                        <div class="swiper-slide">
                            <a href="<?=$galleryItem['IMG']?>" data-fancybox="cardy" class="cardy_slide">
                                <div class="cardy_slide_img" style="background-image: url('<?=$galleryItem['THUMB']?>');"></div>
                            </a>
                        </div>
                        <? } ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <? if ($props['RATING']['VALUE']) { ?>
                <div class="cardy_rating"><span><?=(int)$props['RATING']['VALUE']?></span></div>
                <? } ?>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="cardy_info">
                <div class="cardy_price">
                    <!--<div class="cardy_price_old">
                        <del>от <strong>85 000</strong> руб</del>
                    </div>-->
                    <div class="cardy_price_cur">
                        <p>
                            <? $price_prefix = !empty($props['PRICE_BY']['VALUE'])
                                ? "от <strong>"
                                : "<strong>";
                            echo Catalog::formatPrice($props['PRICE']['VALUE'], $price_prefix, ' </strong> руб'); ?>
                        </p>
                    </div>
                    <? if ($props['PRICE_DESCRIPTION']['VALUE']) { ?>
                    <div class="cardy_price_notify pull-right">
                        <p><sup>*</sup><?=$props['PRICE_DESCRIPTION']['VALUE']?></p>
                    </div>
                    <? } ?>
                </div>
                <div class="cardy_submit">
                    <button onclick="showPopup('gizyner')" class="btn btn-jumbo btn-warning">
                        Вызвать дизайнера
                    </button>
                    <button onclick="showPopup('consultation')" class="btn btn-jumbo btn-light">
                        Получить консультацию
                    </button>
                    <a href="/pricelist/?product=<?=urlencode($arResult['NAME'])?>" class="btn btn-jumbo btn-primary">
                        Расчитать стоимость <br>
                        по моим размерам
                    </a>
                </div>
                <div class="cardy_attr">
                    <? foreach ($arResult['SPECIFICATIONS'] as $specification) { ?>
                    <div class="cardy_attr_item">
                        <p><?=$specification['NAME']?>:</p>
                        <p><?=$specification['VALUE']?></p>
                    </div>
                    <? } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?$APPLICATION->IncludeFile(
    '/include/kuhni/benefits.php',
    Array(),
    Array("MODE"=>"php"));?>



<div class="color">
    <div class="row row-flex flex-stretch">
        <div class="col-lg-5 col-md-5 col-xs-12 scroll">
            <div class="scroll_box scroll_box--short">
                <div class="scroll_box_wrap">
                    <div class="text_box">
                        <?=$arResult['DETAIL_TEXT']?>
                    </div>
                </div>
            </div>
        </div>
        <? if (!empty($arResult['MATERIAL'])) { ?>
        <div class="col-lg-7 col-md-7 col-xs-12">
            <div class="title_box title_box--left">
                <p>Возможные цвета кухни</p>
            </div>
            <div class="color_box">
                <? $allMImageCount = count($arResult['MATERIAL']['GALLERY']); ?>
                <? foreach ($arResult['MATERIAL']['GALLERY'] as $key => $mImg) { ?>
                <div class="color_item">
                    <img src="<?=$mImg?>" alt="">
                    <? if ($arResult['MATERIAL']['UF_LAST_IMG_DESC'] && $key == ($allMImageCount - 1)) { ?>
                        <div class="color_link">
                            <?=$arResult['MATERIAL']['UF_LAST_IMG_DESC']?>
                        </div>
                    <? } ?>
                </div>
                <? } ?>
            </div>
        </div>
        <? } ?>
    </div>
</div>
<div class="">
    <div class="row">
        <div class="col-xs-12">
            <div class="title_box">
                <p>
                    Стандартная комплектация (всё включено)
                </p>
            </div>
        </div>
    </div>
    <div class="row row-flex flex-stretch">
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/1.png" alt="">
                </div>
                <p>Корпуса из ламинированного ДСП</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/2.png" alt="">
                </div>
                <p>Фасады</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/3.png" alt="">
                </div>
                <p>Столешницы</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/4.png" alt="">
                </div>
                <p>Плинтус для столешницы</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/5.png" alt="">
                </div>
                <p>Посудосушитель нержавеющая сталь</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/6.png" alt="">
                </div>
                <p>Ручки</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/7.png" alt="">
                </div>
                <p>Ящики с системой полного выдвижения</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/8.png" alt="">
                </div>
                <p>Стекло</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/9.png" alt="">
                </div>
                <p>Петли фирмы Hettich</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/10.png" alt="">
                </div>
                <p>Подъемные механизмы</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/11.png" alt="">
                </div>
                <p>Цоколь съемный</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-xs-6">
            <div class="standard_box">
                <div class="standard_img">
                    <img src="/assets/img/kset/12.png" alt="">
                </div>
                <p>Фурнитура для сборки</p>
            </div>
        </div>
    </div>
</div>

<? if (!empty($arResult['PROJECTS'])) { ?>
<div class="cardext">
    <div class="row">
        <div class="col-xs-12">
            <div class="title_box">
                <p>
                    Выполненные работы
                </p>
            </div>
        </div>

        <? foreach ($arResult['PROJECTS'] as $project) { ?>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <a href="<?=$project['DETAIL_PAGE_URL']?>" class="cardext_box" style="background-image: url('<?=$project['DETAIL_PICTURE_RESIZE']?>');">
                <div class="cardext_head">
                    <p class="cardext_title"><?=$project['NAME']?></p>
                    <? if (!empty($project['PROPERTY_LOCATION_VALUE'])) { ?>
                    <div class="cardext_subtitle">
                        <i class="icon icon_location"></i><?=$project['PROPERTY_LOCATION_VALUE']?>
                    </div>
                    <? } ?>
                </div>
                <div class="cardext_foot">
                    <button type="button" class="btn btn-primary">Смотреть подробнее</button>
                </div>
            </a>
        </div>
        <? } ?>
    </div>
</div>
<? } ?>

<? if (!empty($arResult['OTHER_ITEMS'])) { ?>
<div class="other-items-kuhni">
    <div class="row">
        <div class="col-xs-12">
            <div class="title_box">
                <p>Хиты</p>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="good_slider">
                <div class="swiper-container good-swiper">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['OTHER_ITEMS'] as $arItem) { ?>
                        <div class="swiper-slide">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:catalog.item",
                                "kuhni",
                                Array(
                                    'RESULT' => [
                                        'ITEM' => $arItem
                                    ],
                                    //"CUSTOM_CLASS" => "card_box--standalone"
                                )
                            ); ?>
                        </div>
                        <? } ?>
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="good_slider_nav good_slider_nav--prev"></div>
                <div class="good_slider_nav good_slider_nav--next"></div>
            </div>
        </div>
    </div>
</div>
<? } ?>