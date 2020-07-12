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

<div class="scroll_nav scroll_nav--top"></div>
<div class="scroll_box">
    <div class="scroll_box_wrap">
        <div class="article_box">

            <? foreach($arResult["ITEMS"] as $arItem) { ?>
            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="article_item">
                <p class="article_title">
                    <?=$arItem['NAME']?>
                </p>
                <p class="article_subtext">
                    <? if ($arItem['PREVIEW_TEXT']) {
                        echo TruncateText($arItem['PREVIEW_TEXT'], 150);
                    } else {
                        echo TruncateText(strip_tags($arItem['DETAIL_TEXT']), 150);
                    } ?>
                </p>
            </a>
            <? } ?>

        </div>
    </div>
</div>
<div class="scroll_nav scroll_nav--bottom"></div>
