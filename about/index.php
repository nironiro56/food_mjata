<?
require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php" );
$APPLICATION->SetTitle("О нас");


$APPLICATION->IncludeFile(
    '/include/about/page_title.php',
    Array(),
    Array( "MODE" => "php" ));
?>

    <div class="minislider">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <? $APPLICATION->IncludeFile(
                    '/include/about/video_box.php',
                    Array(),
                    Array( "MODE" => "php" )); ?>
            </div>
            <div class="col-md-6 col-xs-12">
                <? $APPLICATION->IncludeFile(
                    '/include/about/minislider.php',
                    Array(),
                    Array( "MODE" => "php" )); ?>

            </div>
        </div>
    </div>
    <div class="text">
        <div class="text_box">
            <? $APPLICATION->IncludeFile(
                '/include/about/text.php',
                Array(),
                Array( "MODE" => "php" )); ?>
        </div>
    </div>

<div class="margin-b-50">
<?$APPLICATION->IncludeFile(
    '/include/projects-tabs.php',
    Array(),
    Array( "MODE" => "php" ));?>
</div>

<? $APPLICATION->IncludeFile(
    '/include/about/about-bottom-contacts.php',
    Array(),
    Array( "MODE" => "php" )); ?>


<? require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php" ); ?>