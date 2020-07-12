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

use Seonity\Bitrix\IblockSection;

$section = new IblockSection($arResult['SECTION']);

$this->setFrameMode(true);


?>

<div class="title_box--page">
    <p>
        <?=$section->getH1()?>
    </p>
</div>


<div class=" featuresmini">
    <div class="row">
        <div class="col-lg-2 col-md-2">
            <div class="featuresmini_box">
                <img src="/assets/img/icons/green/cardy/patent.svg" alt="">
                <p>20 лет гарантии на фурнитуру</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="featuresmini_box">
                <img src="/assets/img/icons/green/cardy/machinery.svg" alt="">
                <p>20 лет гарантии на фурнитуру</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="featuresmini_box">
                <img src="/assets/img/icons/green/cardy/sticker.svg" alt="">
                <p>20 лет гарантии на фурнитуру</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="featuresmini_box">
                <img src="/assets/img/icons/green/cardy/clock.svg" alt="">
                <p>20 лет гарантии на фурнитуру</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="featuresmini_box">
                <img src="/assets/img/icons/green/cardy/patent-1.svg" alt="">
                <p>20 лет гарантии на фурнитуру</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="featuresmini_box">
                <img src="/assets/img/icons/green/cardy/project.svg" alt="">
                <p>20 лет гарантии на фурнитуру</p>
            </div>
        </div>
    </div>
</div>


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