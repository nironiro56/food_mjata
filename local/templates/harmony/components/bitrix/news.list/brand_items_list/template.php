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

use Seonity\Bitrix\Catalog;

$this->setFrameMode(true);
//\Seonity\Helpers\Debug::pr($arResult);
?>
<div class="row">
    <div class="color_simple">
        <? foreach ($arResult['ITEMS'] as $item) { ?>
            <div class="color_simple_item">
                <? if ($item['DETAIL_PICTURE']['RESIZE']) { ?>
                    <img src="<?=$item['DETAIL_PICTURE']['RESIZE']?>" alt="" class="img-responsive">
                <? } else { ?>
                    <img src=" /assets/img/kstone/7.png" alt="" class="img-responsive">
                <? } ?>
                <p><?= $item['NAME'] ?></p>
            </div>
        <? } ?>
    </div>
</div>





