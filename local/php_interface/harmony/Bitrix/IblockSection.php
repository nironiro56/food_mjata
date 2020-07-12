<?php
namespace Seonity\Bitrix;

use Seonity\Base\BaseArrayObject;

class IblockSection extends BaseArrayObject
{

    public function getH1()
    {
        if (isset($this->arResult["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"])
            && $this->arResult["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != "") {
            return $this->arResult["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"];
        } else {
            return $this->get('NAME');
        }
    }

}