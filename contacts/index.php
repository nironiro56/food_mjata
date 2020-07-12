<?
require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php" );
$APPLICATION->SetTitle("Контакты");
?>

<? $APPLICATION->IncludeFile(
    '/include/contacts/page_title.php',
    Array(),
    Array( "MODE" => "php" )); ?>


        <div class="">
            <div class="row">
                <div class="col-xs-12 simplelist">
                    <div class="simplelist_box">
                        <? $APPLICATION->IncludeFile(
                            '/include/contacts/top-contacts.php',
                            Array(),
                            Array( "MODE" => "php" )); ?>
                    </div>
                </div>
            </div>
            <? $APPLICATION->IncludeFile(
                '/include/contacts/map-gallery.php',
                Array(),
                Array( "MODE" => "php" )); ?>
        </div>
        <div class="imggroup">
            <div class="row row-flex flex-strecth row-separator">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <? $APPLICATION->IncludeFile(
                        '/include/contacts/vk-widget.php',
                        Array(),
                        Array( "MODE" => "php" )); ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <? $APPLICATION->IncludeFile(
                        '/include/contacts/sertificates.php',
                        Array(),
                        Array( "MODE" => "php" )); ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <? $APPLICATION->IncludeFile(
                        '/include/contacts/rekviziti.php',
                        Array(),
                        Array( "MODE" => "php" )); ?>
                </div>
            </div>
        </div>


<? require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php" ); ?>