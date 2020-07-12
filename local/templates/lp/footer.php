<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
</div>
</div> <!-- end .content -->

<footer>
    <div class="footer_top">
        <div class="container container-fullheight">
            <div class="row">
                <div class="col-xs-12 visible-sm visible-xs">
                    <div class="footer_mobile">
                        <button class="btn btn-warning">Позвонить</button>
                        <button class="btn btn-gray">Нужна консультация</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs flex-aic">
                    <a href="#" class="logo_box">
                        <img src="/assets/img/logo_footer.svg" alt="">
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 hidden-sm hidden-xs flex-ajc">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "footer-menu",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "36000",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "bottom",
                            "USE_EXT" => "N"
                        )
                    );?>
                </div>
                <div class="col-lg-4 col-md-4 col-md-offset-1 col-lg-offset-1 flex-aife">
                    <div class="social_box social_box--footer">
                        <div class="social_row">
                            <p>Присоединяйтесь:</p>
                            <?$APPLICATION->IncludeFile(
                                '/include/social-links.php',
                                Array(),
                                Array( "MODE" => "php" ));

                            ?>
                        </div>
                        <div class="social_row">
                            <p>Разработка и продвижение сайтов <a href="#" class="seonity">SEO<strong>NITY</strong></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container container-fullheight">
            <div class="row">
                <div class="col-lg-12 flex-ajc">
                    <p>Внимание! Данный интернет-сайт носит исключительно информационный характер и не является публичной офертой, определяемой положением ст. 437 (2) ГКРФ</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<? require_once $_SERVER['DOCUMENT_ROOT']."/include/popups/bottom_forms.php" ?>
<script src="/assets/libs/jquery.min.css"></script>
<script src="/assets/libs/swiper/swiper.min.js"></script>
<script src="/assets/libs/select/select.js"></script>
<script src="/assets/libs/nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/libs/fancybox/jquery.fancybox.min.js"></script>
<script src="/assets/libs/nouislider/nouislider.min.js"></script>
<script src="/assets/libs/inputmask-5.0.3/dist/jquery.inputmask.min.js"></script>
<script src="/assets/js/common.js"></script>

<?$APPLICATION->IncludeFile(
    '/include/footer_scripts.php',
    Array(),
    Array("MODE"=>"php"));?>
</body>
</html>




