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
?>


<div class="hits-products-container">
    <div class="row">
        <div class="col-xs-12">
            <div class="title_box">
                <p>Кухни гармония на заказ</p>
            </div>
            <div class="button_filter">
                <a href="#" class="btn angle">
                    Угловые
                </a>
                <a href="#" class="btn tiny">
                    Малогабаритные
                </a>
                <a href="#" class="btn gray">
                    Встроенные
                </a>
                <a href="#" class="btn gray">
                    Из МДФ
                </a>
                <a href="#" class="btn gray">
                    Классическая
                </a>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="good_slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        <? foreach ( $arResult['ITEMS'] as $arItem ) { ?>
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

