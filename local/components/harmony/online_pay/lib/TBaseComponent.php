<?
/*
 * Базовый класс для создания своих компонентов для Bitrix
 * Автор max22, 2015 год, http://max22.ru, maxim@max22.ru
 */


class TBaseComponent extends CBitrixComponent{
   
    protected $elementsSortDefault = array('SORT' => 'ASC', 'active_from'=>'DESC', 'NAME'=>'ASC');
    
    protected $sectionsSortDefault = array('SORT' => 'ASC', 'NAME'=>'ASC');
    
    protected $arSaveInCacheKeys = array('META','CHAIN');
    
    protected $elementArSelect = array('IBLOCK_ID','ID','NAME','ACTIVE_FROM','ACTIVE_TO','PREVIEW_TEXT','PREVIEW_PICTURE','DETAIL_TEXT','DETAIL_PICTURE','CODE','XML_ID','DETAIL_PAGE_URL','LIST_PAGE_URL');
    
    protected $sectionArSelect = array('IBLOCK_ID','ID','NAME','CODE','SECTION_PAGE_URL','XML_ID','PICTURE','DESCRIPTION','IBLOCK_SECTION_ID','DETAIL_PICTURE','DEPTH_LEVEL',);
            
    protected $set404 = false;
    
    protected $showError = false;
    
    protected $includeComponentTemplateInCache = true;
    
    protected function setParams(){
        $this->arParams['CACHE_TIME'] = 36000000;
        $this->arParams['component'] = $this->getName();
        $this->arParams['template'] = $this->getTemplateName();
    }
    
    
    function executeComponent() {
        try {
            $this->setParams();
            if ($this->notCache() || $this->StartResultCache(false)){
                CModule::IncludeModule('iblock');
                $this->inCacheFunction();
                if ($this->includeComponentTemplateInCache){
                    $this->SetResultCacheKeys($this->arSaveInCacheKeys);
		    $this->IncludeComponentTemplate();
                } else {
                    $this->EndResultCache();
                }
            }
            $this->lastCacheFunction();
            if (!$this->includeComponentTemplateInCache){
		$this->IncludeComponentTemplate();
            }
        } catch (Exception $exc) {
            if ($this->set404){
                @define("ERROR_404","Y");
            } elseif($this->showError) {
                $this->__showError($exc->getMessage());
            }
            $this->AbortResultCache();
        }
    }

    protected function inCacheFunction(){
        
    }
    
    protected function lastCacheFunction(){
        $this->setChainAndMeta();
    }
    
    private function setChainAndMeta(){
        if (isset($this->arResult['CHAIN'])){
            foreach ($this->arResult['CHAIN'] as $arChain){
                $GLOBALS['APPLICATION']->AddChainItem($arChain['NAME'], $arChain['LINK']);
            }
        }
        if (isset($this->arResult['META'])){
            $arMeta = $this->arResult['META'];
            if( isset($arMeta['H1']) && strlen($arMeta['H1']) ){
                $GLOBALS['APPLICATION']->SetTitle($arMeta['H1']);
                unset($arMeta['H1']);
            }
            foreach ($arMeta as $key=>$value){
                if( strlen($arMeta[$key]) ){
                    $GLOBALS['APPLICATION']->SetPageProperty($key, $value);
                }
            }
            //facebook_appid
            $fbApiId = COption::GetOptionString('socialservices','facebook_appid');
            if( $fbApiId && strlen($fbApiId)){
                $GLOBALS['APPLICATION']->SetPageProperty('fb:app_id', $fbApiId);
            }
        }
    }
    
    protected function notCache(){
        return false;
    }
    
    //Вспомогательные функции для наследуемых компонентов
    protected function getNavChainBySectionId($sectionId){
	$nav = CIBlockSection::GetNavChain(false, $sectionId);
	while($ar_result = $nav->GetNext()){
	    $this->arResult['CHAIN'][] = array(
		'NAME' => $ar_result['NAME'],
		'LINK' => $ar_result['SECTION_PAGE_URL'],
	    );
	}
    }
    
    protected function getArElements($arOrder, $arFilter, $arSelect, $getProp=false, $arNavStartParams = false, &$navString = false, $arGroupBy=false ){
        $arRes = array();
        $rsElement = CIBlockElement::GetList($arOrder, $arFilter, $arGroupBy, $arNavStartParams, $arSelect);
        //Проведем проверку на запрос коректной страницы
        if ($arNavStartParams && isset($arNavStartParams['nPageSize']) && isset($arNavStartParams['iNumPage']) ){//Задана постраничка
            if ( ($arNavStartParams['iNumPage']-1) * $arNavStartParams['nPageSize'] >= $rsElement->SelectedRowsCount()){
                throw new Exception('Запрашиваемая страница не существует');
            }
        }
        while($obElement = $rsElement->GetNextElement()){
            $arItem = $obElement->GetFields();
            if ($getProp){
                $arItem['PROP'] = $obElement->GetProperties();
            }
            $arRes[$arItem['ID']] = $arItem;		
        }
        if ($navString!== false){
            $navString = $rsElement->GetPageNavString('', $navString);
        }
        return $arRes;
    }
    
    protected function getArSections($arOrder, $arFilter, $arSelect, $arNavStartParams = false,$bIncCnt = false){
        $arRes = array();
        $rsSections = CIBlockSection::GetList($arOrder, $arFilter, $bIncCnt, $arSelect, $arNavStartParams);
        while($arSection = $rsSections->GetNext()){
            $arRes[$arSection['ID']] = $arSection;
        }
        return $arRes;
    }
}
