<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);
CJSCore::Init(array("fx", "jquery2", "ajax"));
$curPage = $APPLICATION->GetCurPage(false);


$is_error_page = defined("ERROR_404") && ERROR_404 == "Y";
$hide_breadcrumbs = $APPLICATION->GetProperty("HIDE_BREADCRUMBS") || $is_error_page;
$hide_sidebar = $APPLICATION->GetProperty("HIDE_SIDEBAR") || $is_error_page;

if ($curPage == "/") $hide_breadcrumbs = true;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?$APPLICATION->ShowTitle()?></title>

    <?
    Asset::getInstance()->addCss("/assets/libs/bootstrap/bootstrap.min.css");
    Asset::getInstance()->addCss("/assets/libs/swiper/swiper.min.css");
    Asset::getInstance()->addCss("/assets/libs/select/select.css");
    Asset::getInstance()->addCss("/assets/libs/fancybox/jquery.fancybox.min.css");
    Asset::getInstance()->addCss("/assets/libs/animate.css");
    Asset::getInstance()->addCss("/assets/css/style.css");
    ?>

    <?$APPLICATION->ShowHead();?>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<header>
    <div class="header_top hidden-sm hidden-xs">
        <div class="container container-fullheight">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header_top_wrap">
                        <div class="header_top_item">
                            <img src="/assets/img/icons/white/factory.svg" alt="">
                            <span>Собственное производство</span>
                        </div>
                        <div class="header_top_item">
                            <img src="/assets/img/icons/white/eco.svg" alt="">
                            <span>Эко-материалы</span>
                        </div>
                        <div class="header_top_item">
                            <img src="/assets/img/icons/white/compass.svg" alt="">
                            <span>Проекты любой сложности</span>
                        </div>
                        <div class="header_top_item">
                            <img src="/assets/img/icons/white/drawing.svg" alt="">
                            <span>Бесплатный дизайн-проект</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header_main">
        <div class="container container-fullheight">
            <div class="row hidden-sm hidden-xs">
                <div class="col-lg-3 col-md-3 col-sm-3 flex-aic">
                    <a href="/" class="logo_box">
                        <img src="/assets/img/logo.svg" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 flex-ajc">
                    <div class="social_box">
                        <div class="social_row">
                            <p class="hidden-md">Присоединяйтесь:</p>
                            <?$APPLICATION->IncludeFile(
                                '/include/social-links.php',
                                Array(),
                                Array( "MODE" => "php" ));

                            ?>
                        </div>
                        <div class="social_row">
                            <form action="/search/" method="get" class="search_box">
                                <input type="text" name="q" class="search_input" placeholder="Поиск по сайту">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 flex-ajc">
                    <div class="contact_box">
                        <div class="contact_item">
                            <img src="/assets/img/icons/green/location.svg" alt="">
                            <p>пл. Карла Фаберже д. 8<br>МЦ "Мебель холл", секция 302, 3 этаж</p>
                        </div>
                        <div class="contact_item">
                            <img src="/assets/img/icons/green/envelope.svg" alt="">
                            <a href="mailto:info@kuxni-shop.ru">info@kuxni-shop.ru</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 flex-jcc flex-column flex-aife">
                    <div class="contact_box">
                        <div class="contact_item contact_item--primary">
                            <img src="/assets/img/icons/green/phone.svg" alt="">
                            <a href="tel:88126406048">+7 (812) 640-60-48</a>
                        </div>
                    </div>
                    <button type="button" onclick="showPopup('callback')" class="btn btn-warning">Обратный звонок</button>
                </div>
            </div>
            <div class="row row-mobile">
                <div class="col-xs-12 flex-space-between aic">
                    <button class="mobile_button mobile_button--menu" id="menuOpen"></button>
                    <a href="#" class="logo_box">
                        <img src="../assets/img/logo.svg" alt="" class="img-responsive">
                    </a>
                    <button class="mobile_button mobile_button--phone"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="header_nav">
        <div class="container container-fullheight">
            <div class="row">
                <div class="col-xs-12">
                    <button class="mobile_button mobile_button--close visible-xs visible-sm" id="closeMenu"></button>
                    <?$APPLICATION->IncludeFile(
                        '/include/main_nav.php',
                        Array(),
                        Array("MODE"=>"php"));?>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content">
    <? if (!$hide_breadcrumbs) { ?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "custom",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        );?>
    <? } ?>
    <div class="container">
