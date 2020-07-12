<?php
include_once 'autoloader.php';

use Seonity\Helpers\Debug;


if (Debug::showDebugInResponse()) {
    ini_set("display_errors", 'On');
    header('Content-type: text/html; charset=utf-8');
}

try {

} catch (Exception $e) {
    Debug::showException($e);
}





