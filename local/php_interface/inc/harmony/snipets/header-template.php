<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx", "jquery2", "ajax"));
$curPage = $APPLICATION->GetCurPage(false);


$is_error_page = defined("ERROR_404") && ERROR_404 == "Y";
$hide_breadcrumbs = $APPLICATION->GetProperty("HIDE_BREADCRUMBS") || $is_error_page;
$hide_sidebar = $APPLICATION->GetProperty("HIDE_SIDEBAR") || $is_error_page;

if ($curPage == "/") $hide_breadcrumbs = true;
//$APPLICATION->SetAdditionalCSS("");
//<?$APPLICATION->ShowHead();
//<div id="panel"><?$APPLICATION->ShowPanel();</div>
use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?$APPLICATION->ShowTitle()?></title>



    <? //Asset::getInstance()->addJs("/assets/libs/jquery.mask.min.js"); ?>
    <? //Asset::getInstance()->addJs("/assets/js/forms.js"); ?>

    <?$APPLICATION->ShowHead();?>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>

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
