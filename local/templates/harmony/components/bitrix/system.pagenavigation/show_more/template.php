<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
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

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>
<?php if ($arResult['NavPageCount'] > $arResult['NavPageNomer']): ?>
    <?php 
$uri = new Bitrix\Main\Web\Uri(trim(str_replace("&amp;", "&", $arResult["sUrlPathParams"])), "&");
$uri->deleteParams(array("bxajaxid"));
$uri->addParams(array("PAGEN_" . $arResult["NavNum"] => ($arResult["NavPageNomer"] + 1)));
    ?>
    <div class="show-more-pagination flex-jcc" data-pagination="true">

        <button data-href="<?= $uri->getUri() ?>"
           data-nav-num="<?= $arResult["NavNum"] ?>"
           class="btn btn-primary btn-ext js-showMore">Загрузить еще</button>
    </div>
<?php endif; ?>

