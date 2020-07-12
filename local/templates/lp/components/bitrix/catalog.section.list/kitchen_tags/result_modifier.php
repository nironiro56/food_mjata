<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Seonity\Harmony\KitchenTagGroup;

$groups = KitchenTagGroup::getMap();


$tags = [];

foreach ($arResult['SECTIONS'] as $arSection) {
    if (!empty($arSection['UF_GROUP']) && isset($groups[ $arSection['UF_GROUP'] ])) {
        $groups[ $arSection['UF_GROUP'] ]['CHILD'][] = $arSection;
    }
}

usort($groups, 'sortGroups');

if (!function_exists("sortGroups")) {
    function sortGroups($a, $b) {
        if ($a['UF_SORT'] == $b['UF_SORT']) return 0;
        return $a['UF_SORT'] > $b['UF_SORT'] ? 1 : -1;
    }
}

foreach ($groups as &$group) {
    if (!empty($group['UF_IMAGE'])) {
        $file = CFile::GetFileArray($group['UF_IMAGE']);
        if ($file) {
            $group['UF_IMAGE'] = $file['SRC'];
        } else {
            $group['UF_IMAGE'] = false;
        }
    }
}

$arResult['GROUPS'] = $groups;