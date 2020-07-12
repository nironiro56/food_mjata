<?php

namespace Seonity\Helpers;

class Debug
{
    public static function pr($var)
    {
        if (self::showDebugInResponse()) {
            echo '<pre>';
            if (!empty($var)) {
                print_r($var);
            } else {
                var_dump($var);
            }
            echo '</pre>';
        }
    }

    public static function showException($e)
    {
        if (self::showDebugInResponse()) {
            echo '<div style="color: red; padding: 20px;background: rgba(255,1,0,0.1)">';
            //\Seonity\Regions\Helpers\Debug::pr($e);
            echo "<b>Error... " . get_class($e) . ': ' . $e->getMessage() . '</b>';
            echo '<br>';
            echo 'in ' . $e->getFile();
            echo '<br>';
            echo 'at line' . $e->getLine();
            echo '</div>';
        }
    }

    public static function showDebugInResponse()
    {
        return !empty($_COOKIE['DEV']);
    }


    public function console_log($arr, $mess = '', $withoutWrap = false)
    {
    if ( !$withoutWrap ) {
        ?>
        <script>
            console.log('<?= addslashes($mess) ?> : ',
                <?
                }
                if(!is_array($arr) && !is_object($arr)) {
                $arr = str_replace("\r", '', addslashes($arr));
                $arr = str_replace("\n", "\\\n", addslashes($arr));
                $arr = htmlspecialchars($arr);
                ?>
                '<?= addslashes($arr) ?>'
            <?
            } else {
            $i = 0;
            echo '{';
            foreach($arr as $key => $elem) {
            if ($i++ !== 0) echo ',';
            if(is_array($elem) || is_object($elem)) {
            ?>
            '<?= addslashes($key) ?>'
            :
            <?
            console_log($elem, $mess, true);
            } else {
            $elem = str_replace("\r", '', addslashes($elem));
            $elem = str_replace("\n", "\\\n", addslashes($elem));
            $elem = htmlspecialchars($elem);
            ?>
            '<?= addslashes($key) ?>'
            :
            '<?= $elem ?>'
            <?
            }
            }
            echo '}';
            }
            if(!$withoutWrap) {
            ?>
            );
        </script>
        <?
        }
    }

}