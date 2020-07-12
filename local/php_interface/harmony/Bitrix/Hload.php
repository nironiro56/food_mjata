<?php

namespace Seonity\Bitrix;

use Bitrix\Highloadblock as HL;


/**
 * @method static \Bitrix\Main\Entity\AddResult add(Array $params)
 * @method static \Bitrix\Main\Entity\UpdateResult update(int $id, Array $params)
 * @method static \Bitrix\Main\DB\Result getList(Array $params)
 * @method static \Bitrix\Main\Entity\Base getEntity()
 * @method static \Bitrix\Main\Entity\DeleteResult delete(int $id)
 */
abstract class Hload
{


    protected static $entity = false;
    protected static $entityName = false;
    /**
     * @var static
     */
    protected static $current = null;

    protected static $elementsCacheByXmlId = [];



    /**
     * генерация класса хранения в highloadblock
     * @return  \Bitrix\Main\Entity\DataManager|false
     */
    public static function getEntityClass()
    {
        $entity = false;
        if (static::$entity == false) {
            \Bitrix\Main\Loader::includeModule('highloadblock');
            $hlblock = HL\HighloadBlockTable::getList(Array('filter' => Array("NAME" => static::getEntityName())))->fetch();


            if ($hlblock) {
                $entity = HL\HighloadBlockTable::compileEntity($hlblock); //генерация класса
            }
            if (is_object($entity)) {
                static::$entity = $entity->getDataClass();
            }
        }
        return static::$entity;
    }

    public static function __callStatic($method, $args)
    {
        $entityClass = static::getEntityClass();
        return call_user_func_array([$entityClass, $method], $args);
    }

    public function getEntityName()
    {
        return static::$entityName;
    }

    public static function getMap()
    {
        $data = [];
        $all = static::getAll();
        foreach ($all as $item) {
            $data[$item['ID']] = $item;
        }
        return $data;
    }

    public static function getByXmlId($xmlId)
    {
        if (empty($xmlId)) return false;

        if (isset(static::$elementsCacheByXmlId[$xmlId])) {
            return static::$elementsCacheByXmlId[$xmlId];
        }

        //в кеше не найдено, ищем  базе

        $res = static::getList(array(
            'select' => array('*'),
            //'order' => array('UF_SORT' => 'ASC'),
            'filter' => array('UF_XML_ID' => $xmlId),
            'limit' => 1
        ));

        $ell = $res->Fetch();

        static::$elementsCacheByXmlId[$xmlId] = $ell;
        return $ell;
    }

}