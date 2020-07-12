<?
require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php" );
$APPLICATION->SetTitle("Сборка и доставка");
?>

<? $APPLICATION->IncludeFile(
    '/include/delivery/page_tite.php',
    Array(),
    Array( "MODE" => "php" )); ?>

        <div class="container white">
            <div class="row row-flex flex-stretch">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <? $APPLICATION->IncludeFile(
                        '/include/delivery/box-delivery.php',
                        Array(),
                        Array( "MODE" => "php" )); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <? $APPLICATION->IncludeFile(
                        '/include/delivery/box-assembly.php',
                        Array(),
                        Array( "MODE" => "php" )); ?>
                </div>
            </div>
        </div>
        <div class="container text">
            <div class="row">
                <div class="col-xs-12">
                    <? $APPLICATION->IncludeFile(
                        '/include/delivery/text-delivery.php',
                        Array(),
                        Array( "MODE" => "php" )); ?>

                    <div class="clearfix"></div>
                    <? $APPLICATION->IncludeFile(
                        '/include/delivery/text-assembly.php',
                        Array(),
                        Array( "MODE" => "php" )); ?>

                </div>
            </div>
        </div>


<? require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php" ); ?>