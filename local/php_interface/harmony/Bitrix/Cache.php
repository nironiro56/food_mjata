<?php
namespace Seonity\Bitrix;

class Cache
{
    /**
     * Добавляем тег к кешу компонента для сброса
     * при изменении другой сущности,
     * например, при изменении другого инфоблока
     *
     * @param string $tag
     * @param \CBitrixComponent $component
     * @return bool
     */
    public static function registerTag(string $tag, \CBitrixComponent &$component)
    {
        global $CACHE_MANAGER;

        if (defined('BX_COMP_MANAGED_CACHE') && is_object($CACHE_MANAGER)) {
            if (strlen($component->getCachePath())) {
                $CACHE_MANAGER->RegisterTag($tag);
                return true;
            }
        }
    }

    /**
     * @param int|string $iblock_id
     * @param \CBitrixComponent $component
     * @return bool
     */
    public static function registerIblockTag($iblock_id, \CBitrixComponent &$component)
    {
        return static::registerTag('iblock_id_' . (int)$iblock_id, $component);
    }


    /**
     * Очистка кеша по тегу
     * clearByTag("iblock_id_{$iblock_id}")
     *
     * @param string $tag
     */
    public static function clearByTag($tag)
    {
        if (defined('BX_COMP_MANAGED_CACHE') && is_object($GLOBALS['CACHE_MANAGER']))
            $GLOBALS['CACHE_MANAGER']->ClearByTag($tag);
    }
}
