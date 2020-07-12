<?php
namespace Seonity\Bitrix;

use Seonity\Helpers\Debug;

class Iblock
{

    static public function formatPrice($price, $pref = '', $suf = '')
    {
        if (empty($price)) return '';
        return $pref . number_format($price, 0, '.', ' ') . $suf;
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
            array( "ID" => "ASC" ),
            array(
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => $IBLOCK_ID,
                //"SECTION_ID" => $arResult['IBLOCK_SECTION_ID'],
                ">ID" => $CUR_ID
            ),
            false,
            array( "nPageSize" => $all_count ),
            $arrSelect
        );

        $cnt = 0;
        while ($item = $related_reader->getNext()) {
            $other_articles[] = $item;
            $cnt++;
        }


        if ($cnt < $all_count) {
            $l_cnt = $all_count - $cnt;

            $related_reader = \CIBlockElement::GetList(
                array( "ID" => "ASC" ),
                array(
                    'ACTIVE' => 'Y',
                    'IBLOCK_ID' => $IBLOCK_ID,
                    //"SECTION_ID" => $arResult['IBLOCK_SECTION_ID'],
                    "<ID" => $CUR_ID
                ),
                false,
                array( "nPageSize" => $l_cnt ),
                $arrSelect
            );


            while ($item = $related_reader->getNext()) {
                $other_articles[] = $item;
            }
        }
        return $other_articles;
    }

    /**
     * @param int $CUR_ID
     * @param int $IBLOCK_ID
     * @param array $addFilter
     * @param int $count
     * @return array
     */
    public static function getOtherArticlesWithProperties($CUR_ID, $IBLOCK_ID, array $addFilter = [], $count = 3)
    {

        $other_articles = [];
        $all_count = $count;

        $baseFilter = [
            'ACTIVE' => 'Y',
            'IBLOCK_ID' => $IBLOCK_ID,
            ">ID" => $CUR_ID
        ];

        $arFilter = array_merge($baseFilter, $addFilter);


        $related_reader = \CIBlockElement::GetList(
            [ "ID" => "ASC" ],
            $arFilter,
            false,
            [ "nPageSize" => $all_count ]
        );

        $cnt = 0;

        while ($obj = $related_reader->GetNextElement()) {
            $item = $obj->GetFields();
            $item['PROPERTIES'] = $obj->GetProperties();
            $other_articles[] = $item;
            $cnt++;
        }

        if ($cnt < $all_count) {
            $l_cnt = $all_count - $cnt;
            unset($arFilter[">ID"]);
            $arFilter["<ID"] = $CUR_ID;

            $related_reader = \CIBlockElement::GetList(
                [ "ID" => "ASC" ],
                $arFilter,
                false,
                [ "nPageSize" => $l_cnt ]
            );

            while ($obj = $related_reader->GetNextElement()) {
                $item = $obj->GetFields();
                $item['PROPERTIES'] = $obj->GetProperties();
                $other_articles[] = $item;
            }
        }
        return $other_articles;
    }


    public static function resizeDetailPictures(array $items, $width, $height, $resizeType = BX_RESIZE_IMAGE_EXACT)
    {
        # Resize DETAIL_PICTURE
        foreach ($items as &$item) {


            $item = self::resizeDetailPicture($item, $width, $height, $resizeType);
        }

        return $items;
    }

    public static function resizeDetailPicture(array $item, $width, $height, $resizeType = BX_RESIZE_IMAGE_EXACT)
    {
        # Resize DETAIL_PICTURE


        if ($item["DETAIL_PICTURE"]) {
            if (!is_array($item['DETAIL_PICTURE'])) {
                $item['DETAIL_PICTURE'] = [ 'ID' => $item['DETAIL_PICTURE'] ];
            }
            $item['DETAIL_PICTURE']['RESIZE'] = '';
            $resizePicture = \CFile::ResizeImageGet(
                $item["DETAIL_PICTURE"]['ID'],
                array( "width" => $width, 'height' => $height ),
                $resizeType
            );
            if ($resizePicture) {
                $item['DETAIL_PICTURE']['RESIZE'] = $resizePicture['src'];
            }
        } else {
            $item['DETAIL_PICTURE']['RESIZE'] = '';
        }


        return $item;
    }

    public static function resizePreviewPicture(array $item, $width, $height, $resizeType = BX_RESIZE_IMAGE_EXACT)
    {
        # Resize PREVIEW_PICTURE


        if ($item["PREVIEW_PICTURE"]) {
            if (!is_array($item['PREVIEW_PICTURE'])) {
                $item['PREVIEW_PICTURE'] = [ 'ID' => $item['PREVIEW_PICTURE'] ];
            }
            $item['PREVIEW_PICTURE']['RESIZE'] = '';
            $resizePicture = \CFile::ResizeImageGet(
                $item["PREVIEW_PICTURE"]['ID'],
                array( "width" => $width, 'height' => $height ),
                $resizeType
            );
            if ($resizePicture) {
                $item['PREVIEW_PICTURE']['RESIZE'] = $resizePicture['src'];
            }
        } else {
            $item['PREVIEW_PICTURE']['RESIZE'] = '';
        }


        return $item;
    }


    /**
     * Возвращает все ID секций к которым привязан элемент
     *
     * @param $element_id
     * @return array
     */
    public static function getAllSectionsIds($element_id)
    {
        $arSections = [];

        $query = \CIBlockElement::GetElementGroups($element_id, true);

        while($arGroup = $query->Fetch()) {
            $arSections[] = $arGroup['ID'];
        }

        return $arSections;
    }
    

}