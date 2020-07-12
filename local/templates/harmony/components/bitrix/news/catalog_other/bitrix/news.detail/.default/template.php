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

$props = $arResult['PROPERTIES'];
$h1 = $arResult['NAME'];

?>
<div class="container cardy">
    <div class="row">
        <div class="col-xs-12">
            <div class="cardy_title">
                <p><?= $h1 ?></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12">
            <div class="cardy_photo cardy_photo--thumbs">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['GALLERY'] as $galleryItem) { ?>

                            <div class="swiper-slide">
                                <a href="<?= $galleryItem['IMG'] ?>" data-fancybox="cardy" class="cardy_slide">
                                    <div class="cardy_slide_img bg-contain"
                                         style="background-image: url('<?= $galleryItem['THUMB'] ?>');"></div>
                                </a>
                            </div>
                        <? } ?>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
                <div class="cardy_thumbs_wrap">
                    <div class="cardy_thumbs">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                    <? foreach ($arResult['GALLERY'] as $galleryItem) { ?>
                                        <div class="swiper-slide">
                                            <div class="cardy_thumb"
                                                 style="background-image: url('<?= $galleryItem['THUMB'] ?>');"></div>
                                        </div>
                                    <? } ?>
                            </div>
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="cardy_rating"><span>57</span></div> -->
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-xs-12">
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
                            <p><sup>*</sup><?= $props['PRICE_DESCRIPTION']['VALUE'] ?></p>
                        </div>
                    <? } ?>
                </div>
                <div class="cardy_submit cardy_submit--double">
                    <button type="button" onclick="showPopup('catalog-zakaz')" class="btn btn-jumbo btn-light">
                        Заказать
                    </button>
                    <a type="button" onclick="showPopup('catalog-consultation')" class="btn btn-jumbo btn-primary">
                        Получить консультацию <br> по этому товару
                    </a>
                </div>
                <div class="cardy_attr">
                    <? foreach ($arResult['SPECIFICATIONS'] as $specification) { ?>
                        <div class="cardy_attr_item">
                            <p><?= $specification['NAME'] ?>:</p>
                            <p><?= $specification['VALUE'] ?></p>
                        </div>
                    <? } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="text">
    <div class="text_box text-two-col text-2-column">
        <?= $arResult['DETAIL_TEXT'] ?>
    </div>
</div>

<? if (!empty($arResult['OTHER_ITEMS'])) { ?>
<div class="">
    <div class="row">
        <div class="col-xs-12">
            <div class="title_box">
                <p>Похожие товары</p>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="good_slider catalog-cards cards-other" data-slides="4">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['OTHER_ITEMS'] as $arItem) { ?>
                        <div class="swiper-slide">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:catalog.item",
                                "catalog_other",
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

<?
$APPLICATION->IncludeFile(
    '/include/popups/catalog_other_forms.php',
    Array(
            'product_name' => $arResult['NAME'],
            'product_id' => $arResult['ID']
    ),
    Array( "MODE" => "php" ));

?>
