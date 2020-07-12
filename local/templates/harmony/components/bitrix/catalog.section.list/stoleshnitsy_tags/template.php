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

foreach ($arResult['GROUPS'] as $group) { ?>
    <? if (empty($group['CHILD'])) continue; ?>
    <div class="filter_item">
        <div class="filter_dropdown">
            <div class="filter_dropdown_body">
                <i class="icon" style="background-image: url('<?= $group['UF_IMAGE'] ?>')"></i>
                <p><?= $group['UF_NAME'] ?></p>
            </div>

            <div class="filter_dropdown_select_wrap">
                <div class="filter_dropdown_select">
                    <? foreach ($group['CHILD'] as $section) { ?>
                        <a href="<?= $section['SECTION_PAGE_URL'] ?>"
                           class="filter_dropdown_link"><?= $section['NAME'] ?></a>
                    <? } ?>
                </div>
            </div>

        </div>
    </div>
<? } ?>