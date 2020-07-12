<?
use Bitrix\Iblock;


class CIBlockPropertyStringWithDescription
{
    const USER_TYPE = 'StringWithDescription';

    public static function GetUserTypeDescription()
    {
        return array(
            "PROPERTY_TYPE" => Iblock\PropertyTable::TYPE_STRING,
            "USER_TYPE" => self::USER_TYPE,
            "DESCRIPTION" => "Строка с описанием",
            "GetPropertyFieldHtml" => array(__CLASS__, "GetPropertyFieldHtml"),
            //"GetPropertyFieldHtmlMulty" => array(__CLASS__, "GetPropertyFieldHtmlMulty"),
            //"ConvertToDB" => array(__CLASS__, "ConvertToDB"),
            //"ConvertFromDB" => array(__CLASS__, "ConvertFromDB"),
            //"GetSettingsHTML" => array(__CLASS__, "GetSettingsHTML"),
        );
    }

    public static function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
    {

        $html = '
<div style="margin-bottom: 0px">
<textarea name="'.$strHTMLControlName['VALUE'].'" cols="'.$arProperty["COL_COUNT"].'" rows="'.$arProperty["ROW_COUNT"].'">'.htmlspecialcharsEx($value["VALUE"]).'</textarea>
</div>';

        if ($arProperty['WITH_DESCRIPTION'] == "Y") {
            $html .= '<div style="margin-bottom: 20px">
<span title="Описание значения свойства">Описание:</span> <br>
 <textarea name="'.htmlspecialcharsEx($strHTMLControlName["DESCRIPTION"]).'" cols="'.$arProperty["COL_COUNT"].'" rows="'.$arProperty["ROW_COUNT"].'">'.htmlspecialcharsEx($value["DESCRIPTION"]).'</textarea></span>';
        }
        return $html;
    }

    /*public static function GetSettingsHTML($arProperty, $strHTMLControlName, &$arPropertyFields)
    {
        $arPropertyFields = array(
            "HIDE" => array("MULTIPLE_CNT"),
        );

        return '';
    }*/
}