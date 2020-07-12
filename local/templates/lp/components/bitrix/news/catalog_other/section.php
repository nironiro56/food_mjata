<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader,
    Bitrix\Iblock,
    Bitrix\Iblock\InheritedProperty\SectionValues,
    Bitrix\Main\Application,
    Bitrix\Main\Web\Uri;

$this->setFrameMode(true);

$c_sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$c_order = isset($_GET['order']) ? $_GET['order'] : '';

$request = Application::getInstance()->getContext()->getRequest();
$rUri = $request->getRequestUri();
$uri = new Uri($rUri);
$curUri = $uri->getUri();

$sorts = [];

$sortUrl = (new Uri($rUri))->deleteParams(['sort', 'order'])->getUri();
$active = ($curUri == $sortUrl);
$sorts[] = [
    'name' => 'По-умолчанию',
    'url' => $sortUrl,
    'active' => $active
];

$sortUrl = (new Uri($rUri))->addParams(['sort' => 'property_RATING', 'order' => 'asc'])->getUri();
$active = ($curUri == $sortUrl);
$sorts[] = [
    'name' => 'По популярности',
    'url' => $sortUrl,
    'active' => $active
];

$sortUrl = (new Uri($rUri))->addParams(['sort' => 'property_PRICE', 'order' => 'asc'])->getUri();
$active = ($curUri == $sortUrl);
$sorts[] = [
    'name' => 'По возрастанию цены',
    'url' => $sortUrl,
    'active' => $active
];

$sortUrl = (new Uri($rUri))->addParams(['sort' => 'property_PRICE', 'order' => 'desc'])->getUri();
$active = ($curUri == $sortUrl);
$sorts[] = [
    'name' => 'По убыванию цены',
    'url' => $sortUrl,
    'active' => $active
];

$sortUrl = (new Uri($rUri))->addParams(['sort' => 'name', 'order' => 'asc'])->getUri();
$active = ($curUri == $sortUrl);
$sorts[] = [
    'name' => 'По имени (а - я)',
    'url' => $sortUrl,
    'active' => $active
];

$sortUrl = (new Uri($rUri))->addParams(['sort' => 'name', 'order' => 'desc'])->getUri();
$active = ($curUri == $sortUrl);
$sorts[] = [
    'name' => 'По имени (я - а)',
    'url' => $sortUrl,
    'active' => $active
];


    $arFilter = array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ACTIVE" => "Y",
        "GLOBAL_ACTIVE" => "Y",
    );
    if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
        $arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
    elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
        $arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
    else $arFilter["ID"] = 0;


    $obCache = new CPHPCache();
    if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
    {
        $arCurSection = $obCache->GetVars();
    }
    elseif ($obCache->StartDataCache())
    {
        $arCurSection = array();
        if (Loader::includeModule("iblock"))
        {
            $dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID", "NAME", "UF_DESCRIPTION_2"));

            if(defined("BX_COMP_MANAGED_CACHE"))
            {
                global $CACHE_MANAGER;
                $CACHE_MANAGER->StartTagCache("/iblock/catalog");

                if ($arCurSection = $dbRes->Fetch()) {
                    $CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);
                }


                $CACHE_MANAGER->EndTagCache();
            }
            else
            {
                if(!$arCurSection = $dbRes->Fetch())
                    $arCurSection = array();
            }
        }

        $obCache->EndDataCache($arCurSection);
    }
    if (!isset($arCurSection))
        $arCurSection = array();

    if (!empty($arCurSection['ID'])) {
        $ipropValues = new SectionValues($arParams['IBLOCK_ID'], $arCurSection['ID']);
        $arCurSection['IPROPERTY_VALUES'] = $ipropValues->getValues();

        $h1 = !empty($arCurSection['IPROPERTY_VALUES']['SECTION_PAGE_TITLE'])
                ? $arCurSection['IPROPERTY_VALUES']['SECTION_PAGE_TITLE']
                : $arCurSection['NAME'];

        $sectionId = $arCurSection['ID'];
    } else {
        $h1 = "Каталог";
        $sectionId = '';
    }



?>

<div class="title_box--page">
    <p>
        <?=$h1?>
    </p>
</div>


<div class="filter">
    <div class="row">
        <div class="col-xs-12">
            <p class="filter_title visible-sm visible-xs">Фильтры</p>
            <div class="filter_box">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    "catalog_sections",
                    Array(
                        "ADD_SECTIONS_CHAIN" => "N",
                        "CACHE_FILTER" => "Y",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "360000",
                        "CACHE_TYPE" => "A",
                        "COUNT_ELEMENTS" => "N",
                        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                        "FILTER_NAME" => "sectionsFilter",
                        "HIDE_SECTION_NAME" => "N",
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "SECTION_CODE" => "",
                        "SECTION_FIELDS" => array("",""),
                        "SECTION_ID" => "",
                        "SECTION_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
                        "SECTION_USER_FIELDS" => array("UF_GROUP",""),
                        "SHOW_PARENT_NAME" => "N",
                        "TOP_DEPTH" => "1",
                        "VIEW_MODE" => "LINE"
                    ),
                    null,
                    Array(
                        'HIDE_ICONS' => 'Y'
                    )
                );?>

                <? $APPLICATION->IncludeComponent(
                    "bitrix:catalog.smart.filter",
                    "price_filter",
                    Array(
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CONVERT_CURRENCY" => "N",
                        "DISPLAY_ELEMENT_COUNT" => "N",
                        "FILTER_NAME" => "arrFilter",
                        "FILTER_VIEW_MODE" => "horizontal",
                        "HIDE_NOT_AVAILABLE" => "N",
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "PAGER_PARAMS_NAME" => "arrPager",
                        "POPUP_POSITION" => "left",
                        "PREFILTER_NAME" => "smartPreFilter",
                        "SAVE_IN_SESSION" => "N",
                        "SECTION_CODE" => "",
                        "SECTION_CODE_PATH" => "",
                        "SECTION_DESCRIPTION" => "-",
                        "SECTION_ID" => $sectionId,
                        "SECTION_TITLE" => "-",
                        "SEF_MODE" => "N",
                        "SEF_RULE" => "",
                        "SMART_FILTER_PATH" => "",
                        "TEMPLATE_THEME" => "seonity",
                        "XML_EXPORT" => "N"
                    ),
                    $component
                ); ?>

                <div class="filter_item">
                    <p class="filter_name">Сортировка</p>
                    <div class="custom-select custom-select--light">
                        <select onchange="window.location.href = $(this).val();">
                            <? foreach ($sorts as $sort) { ?>
                                <option value="<?=$sort['url']?>" <?if ($sort['active']) echo 'selected' ?>><?=$sort['name']?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<?
if (!empty($_GET["sort"])) {
    $arParams["SORT_BY1"] = $_GET["sort"];
    $arParams["SORT_ORDER1"] = !empty($_GET["order"]) ? $_GET["order"] : 'asc';
}
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],

		"PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],
		"PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
	),
	$component
);?>


<? if (!empty($arCurSection['UF_DESCRIPTION_2'])) { ?>
    <div class="jumbowrap">
        <div class="row">
            <div class="col-xs-12">
                <div class="jumbowrap_box full-width">
                    <?=$arCurSection['UF_DESCRIPTION_2']?>
                </div>
            </div>
        </div>
    </div>
<? } ?>