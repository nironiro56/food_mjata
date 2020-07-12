<?
require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php" );
$APPLICATION->SetTitle("Онлайн оплата");
?>

<? $APPLICATION->IncludeFile(
    '/include/online-pay/page_title.php',
    Array(),
    Array( "MODE" => "php" )); ?>

        <div class="miniform">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <?$APPLICATION->IncludeComponent(
                        "seonity:online_pay",
                        "",
                        Array()
                    );?>
                </div>
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <div class="text_box">
                        <? $APPLICATION->IncludeFile(
                            '/include/online-pay/top-text.php',
                            Array(),
                            Array( "MODE" => "html" )); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="col-xs-12">
                    <? $APPLICATION->IncludeFile(
                        '/include/online-pay/text.php',
                        Array(),
                        Array( "MODE" => "html" )); ?>
                    </div>
                </div>
            </div>
        </div>


<? require( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php" ); ?>