<?php

namespace Seonity\Harmony;

use Seonity\Bitrix\Hload;

class KitchenMaterials extends Hload
{
    protected static $entity = false;
    protected static $current = null;
    protected static $entityName = "KitchenMaterials";

    private static $all;

    public static function getAll()
    {
        if (self::$all === null) {
            self::$all = self::getList(array())->fetchAll();
        }
        return self::$all;
    }



}