<nav class="nav_box">
    <div class="nav_link nav_link--catalog">
        <div class="nav_link_catarget">
            Каталог
        </div>
        <div class="nav_dropdown" data-catalog>
            <div class="nav_dropdown_wrap">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    "kitchen_top_menu",
                    Array(
                        "ADD_SECTIONS_CHAIN" => "N",
                        "CACHE_FILTER" => "Y",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "360000",
                        "CACHE_TYPE" => "A",
                        "COUNT_ELEMENTS" => "N",
                        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                        "FILTER_NAME" => "sectionsFilter",
                        "HIDE_SECTION_NAME" => "N",
                        "IBLOCK_TYPE" => "catalog",
                        "IBLOCK_ID" => 5,
                        "SECTION_CODE" => "",
                        "SECTION_FIELDS" => array("",""),
                        "SECTION_ID" => "",
                        "SECTION_URL" => "#SITE_DIR#/kuhni/#SECTION_CODE#/",
                        "SECTION_USER_FIELDS" => array("UF_GROUP",""),
                        "SHOW_PARENT_NAME" => "N",
                        "TOP_DEPTH" => "1",
                        "VIEW_MODE" => "LINE"
                    ),
                    null,
                    Array(
                        'HIDE_ICONS' => 'Y'
                    )
                );?>
                <div class="nav_dropdown_col">
                    <div class="nav_dropdown_title"></div>
                    <div class="nav_dropdown_items">
                        <div class="nav_dropdown_item">
                            <p class="nav_dropdown_type">Обеденные группы</p>
                            <a href="/catalog/stoly/" class="nav_dropdown_link">Столы</a>
                            <a href="/catalog/stulya-i-taburety/" class="nav_dropdown_link">Стулья и табуреты</a>
                            <a href="/stoleshnitsy/" class="nav_dropdown_link nav_dropdown_link--green">Столешницы</a>
                            <a href="/stone/" class="nav_dropdown_link nav_dropdown_link--green">Искусcтвенный камень</a>
                            <a href="/catalog/bytovaya-tekhnika/" class="nav_dropdown_link nav_dropdown_link--green">Бытовая техника</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="/about/" class="nav_link">О нас</a>
    <a href="/actions/" class="nav_link">Акции</a>
    <a href="/delivery/" class="nav_link">Сборка и доставка</a>
    <a href="/constructor/" class="nav_link">Проектировщик</a>
    <a href="/projects/" class="nav_link">Наши проекты</a>
    <a href="/online-pay/" class="nav_link">Онлайн-оплата</a>
    <a href="/pricelist/" class="nav_link">Цены</a>
    <a href="/reviews/" class="nav_link">Отзывы</a>
    <a href="/contacts/" class="nav_link">Контакты</a>
</nav>
