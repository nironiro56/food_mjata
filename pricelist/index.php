<?
require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php" );
$APPLICATION->SetTitle("Цены");
?>

<?
$APPLICATION->IncludeFile(
    '/include/pricelist/page_title.php',
    Array(),
    Array( "MODE" => "php" ));

?>

<?
$APPLICATION->IncludeFile(
    '/include/calculator.php',
    Array(),
    Array( "MODE" => "php" ));

?>

<? require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php" ); ?>