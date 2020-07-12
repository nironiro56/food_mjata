<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock as HL;

foreach ($arResult['ITEMS'] as &$item) {
    $item['DETAIL_PICTURE']['RESIZE'] = '';
    if ($item["DETAIL_PICTURE"]) {
        $resizePicture = CFile::ResizeImageGet(
            $item["DETAIL_PICTURE"],
            array("width" => 360, 'height'=> 240),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        if ($resizePicture) {
            $item['DETAIL_PICTURE']['RESIZE'] = $resizePicture['src'];
        }
    }

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