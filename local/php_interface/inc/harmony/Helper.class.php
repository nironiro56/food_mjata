<?php
/**
 * Created by PhpStorm.
 * User: test
 * Date: 28.08.2019
 * Time: 12:41
 */

namespace Seonity;

\CModule::IncludeModule("iblock");


class Helper
{

    /**
     * DEBUG Function
     * @param $var
     */
    public static function pr($var) {
        //if (empty($_COOKIE['DEV'])) return;
        echo '<pre>';
        if (!empty($var)) {
            print_r($var);
        } else {
            var_dump($var);
        }
        echo '</pre>';
    }

    public static function getYoutubeScreenMax($video_id) {
        return "http://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
    }

    public static function getYoutubeScreenS($video_id) {
        return "https://img.youtube.com/vi/{$video_id}/0.jpg";
    }

    public static function getOtherArticles($CUR_ID, $IBLOCK_ID, array $addSelect = [], $count = 3)
    {

        $other_articles = [];
        $all_count = $count;

        $arrSelectDefault = [
            'ID',
            'NAME',
            'DETAIL_PAGE_URL',
            'PREVIEW_PICTURE',
            'DATE_ACTIVE_FROM',
            'PREVIEW_TEXT'
        ];
        $arrSelect = array_merge($arrSelectDefault, $addSelect);

        $related_reader = \CIBlockElement::GetList(
            array("ID"=>"ASC"),
            array(
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => $IBLOCK_ID,
                //"SECTION_ID" => $arResult['IBLOCK_SECTION_ID'],
                ">ID" => $CUR_ID
            ),
            false,
            array("nPageSize" => $all_count),
            $arrSelect
        );

        $cnt = 0;
        while($item = $related_reader->getNext()) {
            $other_articles[] = $item;
            $cnt++;
        }


        if ($cnt < $all_count) {
            $l_cnt = $all_count - $cnt;

            $related_reader = \CIBlockElement::GetList(
                array("ID"=>"ASC"),
                array(
                    'ACTIVE' => 'Y',
                    'IBLOCK_ID' => $IBLOCK_ID,
                    //"SECTION_ID" => $arResult['IBLOCK_SECTION_ID'],
                    "<ID" => $CUR_ID
                ),
                false,
                array("nPageSize" => $l_cnt),
                $arrSelect
            );


            while($item = $related_reader->getNext()) {
                $other_articles[] = $item;
            }
        }
        return $other_articles;
    }

    public static function getIblockItem($id, $IBLOCK_ID)
    {

        $query = \CIBlockElement::GetList(
            array("ID"=>"ASC"),
            array(
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => $IBLOCK_ID,
                //"SECTION_ID" => $arResult['IBLOCK_SECTION_ID'],
                "=ID" => $id
            ),
            false,
            array("nPageSize" => 1)
        );


        /*if ($item = $query->getNext()) {
            return $item;
        }*/
        if ($ob = $query->GetNextElement()) {
            $item = $ob->GetFields();
            $item['PROPERTIES'] = $ob->GetProperties();
            return $item;
        }
        return false;
    }

    public static function getPageMenuBlock($id)
    {
        global $arFilterMenu, $APPLICATION;
        $item = self::getIblockItem(
            $id,
            17
        );
        //self::pr($item);
        if (!empty($item['PROPERTIES']['MENUS']['VALUE'])) {
            $arFilterMenu = [
                "=ID" => $item['PROPERTIES']['MENUS']['VALUE'],
            ];
            $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "menu_list_small",
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
            "FIELD_CODE" => array("NAME",""),
            "FILTER_NAME" => "arFilterMenu",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => "15",
            "IBLOCK_TYPE" => "gallery",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "Y",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "100",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Новости",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array("M_FILE",""),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "TIMESTAMP_X",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "DESC",
            "STRICT_SECTION_CHECK" => "N"
        )
    );
        }
    }

    public static function getPageGalleryBlock($id)
    {
        global $arFilterMenu, $APPLICATION;
        $APPLICATION->IncludeComponent(
        "bitrix:news.detail",
        "block-gallery",
        Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_ELEMENT_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "BROWSER_TITLE" => "-",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "N",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "N",
            "DISPLAY_PREVIEW_TEXT" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "ELEMENT_CODE" => "",
            "ELEMENT_ID" => $id,
            "FIELD_CODE" => array("",""),
            "IBLOCK_ID" => "20",
            "IBLOCK_TYPE" => "blocks",
            "IBLOCK_URL" => "",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "MESSAGE_404" => "",
            "META_DESCRIPTION" => "-",
            "META_KEYWORDS" => "-",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Страница",
            "PROPERTY_CODE" => array("TITLE",""),
            "SET_BROWSER_TITLE" => "N",
            "SET_CANONICAL_URL" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "Y",
            "SET_META_KEYWORDS" => "Y",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "STRICT_SECTION_CHECK" => "N",
            "USE_PERMISSIONS" => "N",
            "USE_SHARE" => "N"
        )
    );
    }

    public static function getPageShipsBlock($id, $template = "ships_items")
    {
        global $arFilterBlockShips, $APPLICATION;
        $item = self::getIblockItem(
            $id,
            16
        );
        //self::pr($item);
        if (!empty($item['PROPERTIES']['SHIPS']['VALUE'])) {
            $arFilterBlockShips = [
                "=ID" => $item['PROPERTIES']['SHIPS']['VALUE'],
            ];
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                $template,
                Array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "AJAX_MODE" => "Y",
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
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "N",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array( "NAME", "DETAIL_PICTURE", "" ),
                    "FILTER_NAME" => "arFilterBlockShips",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "8",
                    "IBLOCK_TYPE" => "gallery",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "9",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "show_more",
                    "PAGER_TITLE" => "Новости",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "PROPERTY_CODE" => array( "LINK", "" ),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SORT_BY1" => "SORT",
                    "SORT_BY2" => "TIMESTAMP_X",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "DESC",
                    "STRICT_SECTION_CHECK" => "N"
                )
            );
        }
    }
}

