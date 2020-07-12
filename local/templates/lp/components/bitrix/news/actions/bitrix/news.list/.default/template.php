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

            <div class="title_box--page">
                <p>
                    Акции и спецпредложения
                </p>
            </div>

<div class="term">
    <div class="row">
        <? foreach($arResult["ITEMS"] as $arItem) { ?>
        <div class="col-lg-6 col-xs-12">
            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="term_box">
                <div class="term_img" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['RESIZE']?>')">
                    <!--<div class="term_img--hover" style="background-image: url('<?/*=$arItem['PREVIEW_PICTURE']['RESIZE']*/?>');filter: blur(3px)">

                    </div>-->
                    <span class="btn btn-primary btn-show-more">Подробнее</span>
                </div>
                <p class="term_title">
                    <?=$arItem['NAME']?>
                </p>
                <? if ($arItem['PROPERTIES']['ACTIVE_PERIOD']['VALUE']) { ?>
                    <span>Акция действует: <?=$arItem['PROPERTIES']['ACTIVE_PERIOD']['VALUE']?></span>
                <? } ?>
            </a>
        </div>
        <? } ?>
    </div>
</div>
