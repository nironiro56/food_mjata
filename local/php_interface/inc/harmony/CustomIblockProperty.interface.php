<?
namespace Seonity;

use Bitrix\Main\Loader,
    Bitrix\Main\Localization\Loc,
    Bitrix\Iblock;

interface CustomIblockPropertyInterface {
    public static function GetUserTypeDescription();

}
abstract class BaseCustomIblockProperty {

    const USER_TYPE = "";
    const DESCRIPTION = "";

    public static function GetUserTypeDescription()
    {
        return array(
            "PROPERTY_TYPE" => Iblock\PropertyTable::TYPE_STRING,
            "USER_TYPE" => self::USER_TYPE,
            'DESCRIPTION' => self::DESCRIPTION,
            //'GetSettingsHTML' => array(__CLASS__, 'GetSettingsHTML'),
            'GetPropertyFieldHtml' => array(__CLASS__, 'GetPropertyFieldHtml'),
            //'GetPropertyFieldHtmlMulty' => array(__CLASS__, 'GetPropertyFieldHtmlMulty'),
            'PrepareSettings' => array(__CLASS__, 'PrepareSettings'),
            'GetAdminListViewHTML' => array(__CLASS__, 'GetAdminListViewHTML'),
            'GetPublicViewHTML' => array(__CLASS__, 'GetPublicViewHTML'),
            'GetAdminFilterHTML' => array(__CLASS__, 'GetAdminFilterHTML'),
            'GetExtendedValue' => array(__CLASS__, 'GetExtendedValue'),

            //"ConvertToDB" => array(__CLASS__,"ConvertToDB"),
            //"ConvertFromDB" => array(__CLASS__,"ConvertFromDB"),
        );
    }
}