<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>
<h1 style="text-align: center; padding-top: 50px">404 Page not found</h1>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>