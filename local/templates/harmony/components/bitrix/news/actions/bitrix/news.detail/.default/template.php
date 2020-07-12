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

<!-- Post -->
<div class="container mb-mid">
    <div class="row">
        <div class="col-lg-12">
            <div class="content_box post_wrap">
                <div class="content_title_wrap">
                    <p class="content_title">
                        <?=$arResult['H1']?>
                    </p>
                </div>
                <div class="content_box_area --nopaddingbot">
                    <div class="post_box post_box--modified --nopaddingbot">
                        <? if ($arResult['DETAIL_PICTURE']['RESIZE']) { ?>
                        <div class="post_image">
                            <img src="<?=$arResult['DETAIL_PICTURE']['RESIZE']?>" alt="">
                        </div>
                        <? } ?>
                        <div class="post_body stext">
                                <?=$arResult['DETAIL_TEXT']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Post -->


<? if ($arResult['ID'] == 798) {
    require $_SERVER['DOCUMENT_ROOT'] . '/include/forms/ship_test.php';
} ?>


<? if ($arResult['OTHER_ARTICLES']) { ?>
<!-- Offers Box -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <p class="head">
                Другие акции
            </p>
            <div class="offer_box">
                <? foreach ($arResult['OTHER_ARTICLES'] as $arItem) { ?>
                <div class="offer_item">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                    <img src="<?=$arItem['PICTURE']?>" alt="" class="offer_image">
                    </a>
                    <p class="offer_title">
                        <?=$arItem['NAME']?>
                    </p>

                    <div class="offer_controlls">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="button button-fill button-middle button-red">
                            Подробнее
                        </a>
                        <? if ($arItem['PROPERTY_ACTIVE_PERIOD_VALUE']) { ?>
                            <div class="tags">
                                <div class="tag">
                                    <?=$arItem['PROPERTY_ACTIVE_PERIOD_VALUE']?>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
        <? } ?>

            </div>
        </div>
    </div>
</div>
<!-- //Offers Box -->
<? } ?>