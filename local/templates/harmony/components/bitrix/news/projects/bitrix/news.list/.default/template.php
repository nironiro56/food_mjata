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
<div class="cardext">
    <div class="row" data-items="true">
        <? foreach($arResult["ITEMS"] as $arItem) { ?>
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

    <?=$arResult['NAV_STRING']?>

</div>
