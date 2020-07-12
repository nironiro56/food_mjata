<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if (empty($arResult)) return;
?>

    <nav class="nav_footer">
        <? foreach($arResult as $arItem) { ?>
            <?if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;?>
        <a href="<?=$arItem["LINK"]?>" class="nav_footer_link"><?=$arItem["TEXT"]?></a>
        <? } ?>
    </nav>
