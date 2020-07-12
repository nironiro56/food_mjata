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
    <div class="material_box">
        <?foreach ($arResult["SECTIONS"] as $item) {?>
        <a href="<?=$item['SECTION_PAGE_URL']?>" class="material_item">
            <div class="material_img">
                <? if ($item["PICTURE"]['RESIZE']) { ?>
                <img src="<?=$item["PICTURE"]['RESIZE']?>" alt="">
                <? } ?>
            </div>
            <p><?=$item['NAME']?></p>
        </a>
    <? } ?>
    </div>