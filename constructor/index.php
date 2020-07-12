<?
require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php" );
$APPLICATION->SetTitle("Проектировщик");
?>

<? $APPLICATION->IncludeFile(
    '/include/constructor/page-top.php',
    Array(),
    Array( "MODE" => "php" )); ?>

<? $APPLICATION->IncludeFile(
    '/include/constructor/planer.php',
    Array(),
    Array( "MODE" => "php" )); ?>

<? $APPLICATION->IncludeFile(
    '/include/constructor/steps.php',
    Array(),
    Array( "MODE" => "php" )); ?>

<? require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php" ); ?>