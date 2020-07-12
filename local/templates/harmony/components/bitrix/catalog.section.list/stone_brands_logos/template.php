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
//\Seonity\Helpers\Debug::pr($arResult);

?>
<div class=" manufacturer">
    <div class="row">
        <div class="col-xs-12 manufacturer_detector">
            <div class="manufacturer_box">
                <?foreach ($arResult["SECTIONS"] as $item) {?>
                <a href="<?=$item['SECTION_PAGE_URL']?>" title="<?=$item['NAME']?>" class="manufacturer_item">
                    <? if ($item["PICTURE"]['RESIZE']) { ?>
                        <img src="<?=$item["PICTURE"]['RESIZE']?>" alt="">
                    <? } ?>
                </a>
                <? } ?>
            </div>
        </div>
    </div>
</div>