<?php

namespace Seonity\Harmony;

use Seonity\Bitrix\Hload;

class KitchenTagGroup extends Hload
{
    protected static $entity = false;
    protected static $current = null;
    protected static $entityName = "KitchenTagGroup";

    private static $all;

    public static function getAll()
    {
        if (self::$all === null) {
            self::$all = self::getList(array())->fetchAll();
        }
        return self::$all;
    }

    public static function getById($ellId)
    {
        if (!empty($ellId)) {
            foreach (self::getAll() as $item) {
                if ($item['ID'] == $ellId) {
                    return $item;
                }
            }
        }
    }
}