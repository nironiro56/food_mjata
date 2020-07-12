<?
/*include_once 'inc/seonity/Helper.class.php';
include_once 'inc/seonity/ship.class.php';
include_once 'inc/seonity/TBaseComponent.php';
include_once 'inc/seonity/prop_string_with_desc.php';*/
require $_SERVER["DOCUMENT_ROOT"] . "/local/vendor/autoload.php";
require_once "seonity/startup.php";


AddEventHandler("iblock",
    "OnIBlockPropertyBuildList",
    array("CIBlockPropertyStringWithDescription", "GetUserTypeDescription"));