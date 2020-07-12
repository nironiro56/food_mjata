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
    Bitrix\Iblock\InheritedProperty\SectionValues;

$this->setFrameMode(true);


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
    if (false && $obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
    {
        $arCurSection = $obCache->GetVars();
    }
    elseif ($obCache->StartDataCache())
    {
        $arCurSection = array();
        if (Loader::includeModule("iblock"))
        {
            $dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID", "NAME", "UF_SECTION_TYPE", "DESCRIPTION", "UF_SHORT_DESCRIPTION"));

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

        $APPLICATION->AddChainItem($h1);

        if (!empty($arCurSection['IPROPERTY_VALUES']['SECTION_META_TITLE'])) {
            $APPLICATION->SetPageProperty('TITLE', $arCurSection['IPROPERTY_VALUES']['SECTION_META_TITLE']);
        } else {
            $APPLICATION->SetPageProperty('TITLE', $h1);
        }
        if (!empty($arCurSection['IPROPERTY_VALUES']['SECTION_META_DESCRIPTION'])) {
            $APPLICATION->SetPageProperty('DESCRIPTION', $arCurSection['IPROPERTY_VALUES']['SECTION_META_DESCRIPTION']);
        }

        $topDescription = $arCurSection['DESCRIPTION'];

        if ($arCurSection['UF_SECTION_TYPE'] == 3) {
            $topDescription = $arCurSection['UF_SHORT_DESCRIPTION'];
        }

        ?>


        <div class="title_box--page">
            <p>
                <?= $h1 ?>
            </p>
        </div>
<? if ($topDescription) { ?>
        <div class="text">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text_box">
                        <?= $topDescription ?>
                    </div>
                </div>
            </div>
        </div>
            <? } ?>


        <?$APPLICATION->IncludeFile(
            '/include/stone/featuresmini.php',
            Array(),
            Array("MODE"=>"php"));?>

        <?
        $sectionTemplateFile = __DIR__ . "/section_type_".$arCurSection['UF_SECTION_TYPE'].".php";
        if (file_exists($sectionTemplateFile)) {
            include $sectionTemplateFile;
        } else {
            echo "<div style='color: red'> Шаблон для типа  {$arCurSection['UF_SECTION_TYPE']} не найден</div>";
        }

        $APPLICATION->IncludeFile(
            '/include/stone/stone_bottom_form.php',
            Array(),
            Array( "MODE" => "php" ));


    } else {
        @define("ERROR_404","Y");
    }



