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

?>


    <div class="nav_dropdown_col">
        <div class="nav_dropdown_title">
            <p>Кухни</p>
        </div>
        <div class="nav_dropdown_items">
            <?foreach ($arResult['GROUPS'] as $group) { ?>
            <? if (empty($group['CHILD'])) continue; ?>
            <div class="nav_dropdown_item">
                <p class="nav_dropdown_type"><?=$group['UF_NAME']?></p>
                <? foreach ($group['CHILD'] as $section) { ?>
                <a href="<?= $section['SECTION_PAGE_URL'] ?>" class="nav_dropdown_link"><?= $section['NAME'] ?></a>
                <? } ?>
            </div>
            <? } ?>
        </div>
    </div>