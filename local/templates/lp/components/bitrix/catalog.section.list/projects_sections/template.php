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
$curSectionId = isset($arParams['CURRENT_SECTION']) ? $arParams['CURRENT_SECTION'] : 0;
?>
<div class="minifilter">
    <div class="row">
        <div class="col-xs-12">
            <div class="minifilter_box">
                <a href="/projects/" <? if ($curSectionId == 0) {?>class="active"<? } ?>>Все</a>
<? foreach ($arResult['SECTIONS'] as $section) { ?>

    <a href="<?= $section['SECTION_PAGE_URL'] ?>" <? if ($curSectionId == $section['ID']) {?>class="active"<? } ?>><?= $section['NAME'] ?></a>
<? } ?>
            </div>
        </div>
    </div>
</div>

