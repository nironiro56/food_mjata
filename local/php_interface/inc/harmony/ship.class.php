<?php
/**
 * Created by PhpStorm.
 * User: test
 * Date: 30.08.2019
 * Time: 13:23
 */

namespace Seonity;

class Ship
{
    private $arResult;

    public function __construct($arResult)
    {
        $this->arResult = $arResult;
    }

    static public function formatPrice($price, $pref = '', $suf = '')
    {
        if (empty($price)) return '';
        return $pref . number_format($price, 0, '.', ' ') . $suf;
    }
}