<?php
namespace Seonity\Bitrix;

class Catalog
{

    static public function formatPrice($price, $pref = '', $suf = '')
    {
        if (empty($price)) return '';
        return $pref . number_format($price, 0, '.', ' ') . $suf;
    }

    static public function getResizeImgWithPopup($arImgInfo, $width, $height, $resizeType = BX_RESIZE_IMAGE_EXACT)
    {
        if ($arImgInfo) {
            $resizePictureThumb = \CFile::ResizeImageGet(
                $arImgInfo,
                array("width" => $width, 'height'=> $height),
                $resizeType
            );

            $resizePicture = \CFile::ResizeImageGet(
                $arImgInfo,
                array("width" => 1200, 'height'=> 1200),
                BX_RESIZE_IMAGE_PROPORTIONAL
            );

            if ($resizePicture) {
                return [
                    'IMG' => $resizePicture['src'],
                    'THUMB' => $resizePictureThumb['src']
                ];
            }
        }
    }
    
}