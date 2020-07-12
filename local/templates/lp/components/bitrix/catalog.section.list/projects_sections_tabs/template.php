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
global $active_section_id;
$curSectionId = isset($arParams['CURRENT_SECTION']) ? $arParams['CURRENT_SECTION'] : 0;
$n = 0;
?>

<? foreach ($arResult['SECTIONS'] as $section) {
    $n++;
    $class = '';
    if ($n == 1) {
        $class = " active";
        $active_section_id = $section['ID'];
    }

    /*if ($curSectionId == $section['ID']) {
        $class = " active";
    }*/
    ?>
<div  class="project_link <?=$class?>" data-section-id="<?=$section['ID']?>">
    <?= $section['NAME'] ?>
</div>
<? } ?>

