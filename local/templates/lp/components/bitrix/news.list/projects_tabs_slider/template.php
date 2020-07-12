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

use Seonity\Bitrix\Iblock;

$this->setFrameMode(true);
$arResult['ITEMS'] = Iblock::resizeDetailPictures($arResult['ITEMS'], 620, 380);
?>
<div class="project_slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <? foreach ($arResult['ITEMS'] as $item) { ?>
            <div class="swiper-slide">
                <div class="project_slide"
                     style="background-image: url('<?=$item['DETAIL_PICTURE']['RESIZE']?>');">
                    <div class="project_info">
                        <p><?=$item['NAME']?><?
                            if (!empty($item['PROPERTIES']['LOCATION']['VALUE'])) {
                                echo ', '. $item['PROPERTIES']['LOCATION']['VALUE'];
                            } ?></p>
                        <a href="<?=$item['DETAIL_PAGE_URL']?>" class="btn btn-warning">
                            Смотреть подробнее...
                        </a>
                    </div>
                </div>
            </div>
            <? } ?>
        </div>
        <div class="project_nav project_nav--prev"></div>
        <div class="project_nav project_nav--next"></div>
    </div>
</div>
