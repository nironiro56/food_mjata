<?php
global $active_section_id;
$section_id = isset($section_id) ? $section_id : 0;
?>

<div class="tab projects_tabs_slider">
    <div class="row">
        <div class="col-xs-12">
            <div class="title_box">
                <p>Выполненные проекты</p>
            </div>
            <div class="tab_box-content">

                <div class="tab_links flex-jcc">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "projects_sections_tabs",
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
                            "IBLOCK_ID" => 10,
                            "SECTION_CODE" => "",
                            "SECTION_FIELDS" => array("",""),
                            "SECTION_ID" => "",
                            "SECTION_URL" => "#SITE_DIR#/projects/category/#SECTION_CODE#/",
                            "SECTION_USER_FIELDS" => array("",""),
                            "SHOW_PARENT_NAME" => "N",
                            "TOP_DEPTH" => "1",
                            "VIEW_MODE" => "LINE",
                            "CURRENT_SECTION" => $section_id
                        )
                    );?>
                </div>

                <div class="tab_items">
                    <div class="tab_item">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "projects_tabs_slider",
                            Array(
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "N",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "CHECK_DATES" => "Y",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_DATE" => "N",
                                "DISPLAY_NAME" => "Y",
                                "DISPLAY_PICTURE" => "Y",
                                "DISPLAY_PREVIEW_TEXT" => "N",
                                "DISPLAY_TOP_PAGER" => "N",
                                "FIELD_CODE" => array("NAME","DETAIL_PICTURE",""),
                                "FILTER_NAME" => "",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => 10,
                                "IBLOCK_TYPE" => "catalog",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "INCLUDE_SUBSECTIONS" => "Y",
                                "MESSAGE_404" => "",
                                "NEWS_COUNT" => "20",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "PAGER_DESC_NUMBERING" => "N",
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_SHOW_ALWAYS" => "N",
                                "PAGER_TEMPLATE" => ".default",
                                "PAGER_TITLE" => "Новости",
                                "PARENT_SECTION" => $active_section_id,
                                "PARENT_SECTION_CODE" => "",
                                "PREVIEW_TRUNCATE_LEN" => "",
                                "PROPERTY_CODE" => array("LOCATION",""),
                                "SET_BROWSER_TITLE" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "SORT_BY1" => "SORT",
                                "SORT_BY2" => "ID",
                                "SORT_ORDER1" => "ASC",
                                "SORT_ORDER2" => "DESC",
                                "STRICT_SECTION_CHECK" => "N"
                            )
                        );?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>