<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock as HL;

if (!empty($arResult['ITEM']))  {


    $arResult['ITEM'] = \Seonity\Bitrix\Iblock::resizeDetailPicture(
        $arResult['ITEM'],
        260,
        240,
        BX_RESIZE_IMAGE_PROPORTIONAL
    );

    $item = &$arResult['ITEM'];


    # Стикеры
    $item['STICKERS'] = [];
    if ($item['PROPERTIES']['STICKERS']['VALUE']) {
        $hlblock = HL\HighloadBlockTable::getById(2)->fetch(); // id highload блока
        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entityClass = $entity->getDataClass();

        $res = $entityClass::getList(array(
            'select' => array('*'),
            'order' => array('UF_SORT' => 'ASC'),
            'filter' => array('UF_XML_ID' => $item['PROPERTIES']['STICKERS']['VALUE'])
        ));

        $rows = $res->fetchAll();
        foreach ($rows as $row) {
            $item['STICKERS'][] = [
                'NAME' => $row['UF_NAME'],
                'COLOR' => $row['UF_DESCRIPTION']
            ];
        }
    }
}
