<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc,
    \Seonity\Helpers\Debug;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 */

$this->setFrameMode(true);
?>
<div class=" filter">
    <div class="row">
        <div class="col-xs-12">
            <p class="filter_title visible-sm visible-xs">Фильтры</p>
            <form class="filter_box">
                <div class="filter_item">
                    <div class="filter_dropdown">
                        <div class="filter_dropdown_body">
                            <i class="icon icon_d_roulette"></i>
                            <p>Планировка</p>
                        </div>
                        <input type="hidden" data-filter="layout">
                    </div>
                </div>
                <div class="filter_item">
                    <div class="filter_dropdown">
                        <div class="filter_dropdown_body">
                            <i class="icon icon_d_material"></i>
                            <p>Материал</p>
                        </div>
                        <input type="hidden" data-filter="material">
                    </div>
                </div>
                <div class="filter_item">
                    <div class="filter_dropdown">
                        <div class="filter_dropdown_body">
                            <i class="icon icon_d_style"></i>
                            <p>Стиль</p>
                        </div>
                        <input type="hidden" data-filter="style">
                        <div class="filter_dropdown_select_wrap">
                            <div class="filter_dropdown_select">
                                <a href="#" class="filter_dropdown_link" data-filter-val="Прованс">Прованс</a>
                                <div class="filter_dropdown_link">
                                    <p>Лофт</p>
                                    <div class="filter_dropdown_link_inner">
                                        <a href="#" class="filter_dropdown_link" data-filter-val="Скандинавский">Скандинавский</a>
                                        <a href="#" class="filter_dropdown_link" data-filter-val="Кантри">Кантри</a>
                                        <a href="#" class="filter_dropdown_link" data-filter-val="Hi-Tec">Hi-Tec</a>
                                    </div>
                                </div>
                                <a href="#" class="filter_dropdown_link" data-filter-val="Классический">Классический</a>
                                <a href="#" class="filter_dropdown_link" data-filter-val="Современный">Современный</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter_item">
                    <div class="filter_dropdown">
                        <div class="filter_dropdown_body">
                            <i class="icon icon_d_extra"></i>
                            <p>Дополнительно</p>
                        </div>
                        <input type="hidden" data-filter="extra">
                    </div>
                </div>
                <div class="filter_item filter_range_wrap">
                    <div class="filter_range">
                        <p class="filter_name">Цена</p>
                        <div class="filter_range_vals">
                            <div class="filter_range_vals_min">20 000</div>
                            <span>-</span>
                            <div class="filter_range_vals_max">150 000</div>
                        </div>
                        <div class="filter_range_input"></div>
                    </div>
                </div>
                <div class="filter_item">
                    <p class="filter_name">Сортировка</p>
                    <div class="custom-select custom-select--light">
                        <select>
                            <option>По популярности</option>
                            <option>Lorem</option>
                            <option>Ipsum</option>
                            <option>Dolor</option>
                            <option>Sit</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="">
    <div class="row row-flex flex-stretch">
        <? foreach ($arResult['ITEMS'] as $arItem) { ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card_box card_box--standalone">
                <div class="card_photo" onclick="window.location.href='/catalog/item.php'">
                    <? if ($arItem['DETAIL_PICTURE']['RESIZE']) { ?>
                    <img src="<?=$arItem['DETAIL_PICTURE']['RESIZE']?>" alt="">
                    <? } ?>
                    <div class="card_photo_offer_group">
                        <!--<div class="card_photo_offer card_photo_offer--hit">
                            <span>Похожие кухни</span>
                        </div>-->
                    </div>
                    <!--<div class="card_photo_rating card_photo_rating--like">
                        <span>57</span>
                    </div>-->
                </div>
                <div class="card_info">
                    <p class="card_info_title"><?=$arItem['NAME']?></p>
                    <div class="card_info_simple">
                        <div class="card_info_attr">
                            <div class="card_info_attr_material">
                                <img src="/assets/img/icons/green/material/shpon.svg" alt="">
                                <p>Шпон</p>
                            </div>
                            <div class="card_info_attr_price">
                                <p>от <strong>65 000</strong> руб</p>
                            </div>
                        </div>
                        <div class="card_info_submit_group">
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-primary">
                                Рассчитать
                            </a>
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-warning">
                                Подробнее
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? } ?>

    </div>
    <div class="row">
        <div class="col-xs-12">
            <?=$arResult['NAV_STRING']?>

            <!--<div class="pagination_box">
                <a href="#" class="pagination_item pagination_item--prev"></a>
                <a href="#" class="pagination_item"></a>
                <a href="#" class="pagination_item"></a>
                <a href="#" class="pagination_item"></a>
                <a href="#" class="pagination_item pagination_item--next"></a>
            </div>-->
        </div>
    </div>
</div>
<div class=" jumbowrap">
    <div class="row">
        <div class="col-xs-12">
            <div class="jumbowrap_box full-width">
                <div class="jumbowrap_title">
                    <p>Почему кухни заказывают у нас?</p>
                </div>
                <div class="text_box">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
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
                        <div class="swiper-slide">
                            <a data-fancybox href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="reviewslider_slide">
                                <img src="/assets/img/photos/peoples/review1.jpg" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a data-fancybox href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="reviewslider_slide">
                                <img src="/assets/img/photos/peoples/review2.jpg" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a data-fancybox href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="reviewslider_slide">
                                <img src="/assets/img/photos/peoples/review3.jpg" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a data-fancybox href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="reviewslider_slide">
                                <img src="/assets/img/photos/peoples/review4.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="reviewslider_nav reviewslider_nav--prev"></div>
                <div class="reviewslider_nav reviewslider_nav--next"></div>
            </div>
        </div>
    </div>
</div>
<div class=" jumbowrap">
    <div class="row">
        <div class="col-xs-12">
            <div class="jumbowrap_box full-width">
                <div class="jumbowrap_title">
                    <p>Почему кухни заказывают у нас?</p>
                </div>
                <div class="text_box">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
