<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
include 'lib/TBaseComponent.php';

/*
 *  http://max22.ru/bx-solutions/my-oop-components/
 *  (взят за основу)
 *
 */
use Bitrix\Main\Page\Asset;

class COnlinePay extends TBaseComponent
{

    private $getaway;
    protected $showError = true;

    /*
     * Это флаг определяющий где будет подключаться шаблон компонента.
     * По умолчанию значение true, что означает подключать шаблон компонента внутри кеша
     * (результат будет закеширован). Такое поведение подходит для большинства случаев.
     * Но бывает, что шаблон нужно подключать вне кеша, а кешировать только $arResult,
     * тогда флаг нужно выставить в false.
     */
    protected $includeComponentTemplateInCache = false;

    private $payDataFields = array(
        'name' => [
            'type' => 'string',
            'required' => true
        ],
        'phone'=> [
            'type' => 'string',
            'required' => true
        ],
        'dogovor'=> [
            'type' => 'string',
            'required' => true
        ],
        'pay_type'=> [
            'type' => 'string',
            'required' => true
        ],
        'amount'=> [
            'type' => 'int',
            'required' => true
        ]
    );

    /**
     *  cached function
     *  load first
     */
    function inCacheFunction()
    {
        $this->arResult['STATE'] = '';
        $this->arResult['SHOW_FORM'] = true;
        $this->arResult['PAY_DATA'] = [];

        /*
         * ОБРАБОТКА ДАННЫХ ИЗ ФОРМЫ
         */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->loadDataFromRequest();
            if ($this->validatePayData()) {
                $this->createOrder();
            } else {
                $this->arResult['STATE'] = 'error';
                $this->arResult['ERROR_TEXT'] = "Некоректно или не полностью заполненны данные платежа";
            }
        } elseif (!empty($_GET['orderId'])) {
            $this->orderCallback($_GET['orderId']);
        } /*elseif (!empty($_GET['send'])) {
            $response = $this->getaway->getOrderStatus("46720aae-6070-7d6d-8938-b5a604b36510");
            if ($response['status']) {
                $this->sendAdminNotification($response['order_number'], $response['order_info']);
            }
        }*/


    }

    /**
     *  Установка доп параметров компонента
     */
    function setParams()
    {
        parent::setParams();
        $this->arParams['GETAWAY'] = 'sber_bank';
        $this->arParams['GETAWAY_LOGIN'] = '';
        $this->arParams['GETAWAY_PASSWORD'] = '';
        $this->arParams['GETAWAY_TEST_MODE'] = false;
        $this->arParams['GETAWAY_DEBUG'] = false;

        //Шаблон уведомления админа
        $this->arParams['EMAIL_EVENT_NAME'] = "ONLINE_PAY";
        $this->initGetaway();
    }

    function initGetaway() {
        if (empty($this->arParams['GETAWAY'])) throw new Exception("Не установлен шлюз");
        if (!file_exists(__DIR__.'/lib/'.$this->arParams['GETAWAY'].'.class.php'))
            throw new Exception("Не найден файл шлюза");

        include 'lib/'.$this->arParams['GETAWAY'].'.class.php';
        $className = str_replace('_', '', $this->arParams['GETAWAY']).'Getaway';
        $this->getaway = new $className($this->arParams);
    }


    /**
     * @param $val
     * @return bool
     */
    function f_validate_int($val)
    {
        if ((int)$val > 0) return true;
        return false;
    }

    function validatePayData()
    {
        foreach ($this->payDataFields as $field_name => $field_param) {
            if ($field_param['required'] && empty($this->arResult['PAY_DATA'][$field_name]))
                return false;

            $validationMethod = 'f_validate_'.$field_param['type'];
            if (method_exists($this, $validationMethod)) {
                if (!$this->$validationMethod($this->arResult['PAY_DATA'][$field_name])) {
                    return false;
                }
            }

        }
        return true;
    }

    function f_prepare_int($val) {
        return (int)$val;
    }

    /**
     * Load $this->arResult['PAY_DATA'] from $_POST
     */
    function loadDataFromRequest()
    {
        foreach ($this->payDataFields as $field_name => $field_param) {
            if (isset($_POST[$field_name])) {
                $this->arResult['PAY_DATA'][$field_name] = strip_tags(trim($_POST[$field_name]));
                $prepareMethod = 'f_prepare_'.$field_param['type'];
                if (method_exists($this, $prepareMethod)) {
                    $this->arResult['PAY_DATA'][$field_name] = $this->$prepareMethod($this->arResult['PAY_DATA'][$field_name]);
                }
            } else {
                $this->arResult['PAY_DATA'][$field_name] = '';
            }
        }
    }


    /**
     * Функция, которая будет выполнятся всегда,
     * не зависимо от того закеширован компонент или нет.
     */
    function lastCacheFunction()
    {
        parent::lastCacheFunction();
    }


    /**
     * Здесь можно определить условия когда не нужно кешировать компонент.
     * По умолчанию функция возвращает false, т.е. кеширование будет всегда.
     * @return bool
     */
    function notCache() {
        return true;
    }


    /**
     * Создание платеа через API шлюза
     * @param $data
     */
    private function createOrder() {
        $return_url = $this->getCurUrl();

        /*
         * return array(status, error, redirect_url, order_id)
         */
        $order = $this->getaway->createOrder($this->arResult['PAY_DATA'], $return_url);

       if ($order['status'] == true) {
           $_SESSION['ONLINE_PAY_ORDER_ID'] = $order['order_id'];
            //self::_pr($order['redirect_url']);
            $this->redirect($order['redirect_url']);
       } else {
           $this->arResult['STATE'] = 'pay-error';
           $this->arResult['ERROR_TEXT'] = $order['error'];
       }
    }

    /*
     * Проверка статуса транзакции
     * @param $order_id - id транзакции в шлюзе
     */
    function orderCallback($order_id)
    {
        $order_id = $_GET['orderId'];
        if ($this->validateOrderId($order_id)) {
            /*
             * проверка статуса заказа на шлюзе
             * return array ('status', 'error', 'order_number')
             */
            $response = $this->getaway->getOrderStatus($_GET['orderId']);
            if ($response['status']) {
                // Успешный платеж
                $this->arResult['STATE'] = 'pay-complete';
                $this->arResult['SHOW_FORM'] = false;
                $this->arResult['ORDER_NUMBER'] = $response['order_number'];

                $this->sendAdminNotification($response['order_number'], $response['order_info']);
                //$this->cleareOrder();
            } else {
                $this->arResult['STATE'] = 'pay-error';
                $this->arResult['ERROR_TEXT'] = $response['error'];
            }
            $this->cleareOrder();
        } else {
            $this->redirect($this->getCurUrl());
        }
    }

    /*
     * проверка коректности заказа с номером $order_id (номер от шлюза)
     * @return bool
     */
    function validateOrderId($order_id)
    {
        if (!empty($order_id)
            && !empty($_SESSION['ONLINE_PAY_ORDER_ID'])
            && $_SESSION['ONLINE_PAY_ORDER_ID'] == $order_id) return true;

        return false;
    }

    /*
     *  Уведомление админа о новой оплате
     */
    function sendAdminNotification($order_number, $info)
    {
        $event = $this->arParams['EMAIL_EVENT_NAME'];
        //$template_id = 47;
        $html  = "<h2>Новая онлайн-оплата на сайте ".$_SERVER['SERVER_NAME']."</h2>";
        $html .= '<p><b>Номер заказа:</b> '.$order_number.'</p>';
        foreach ($info as $field) {
            $html .= '<p><b>'.$field["name"].':</b> '.$field["value"].'</p>';
        }

        $arFields = [
            'HTML_CONTENT' => $html,
            'SUBJECT' => "Новая оплата на сайте ".$_SERVER['HTTP_HOST'],
            'ORDER_NUMBER' => $order_number
        ];
        //self::_pr($arFields);

        //CEvent::SendImmediate($event, SITE_ID, $arFields, 'Y', $template_id);
        CEvent::Send($event, SITE_ID, $arFields, 'Y');
        //CEvent::CheckEvents();
    }


    function cleareOrder() {
        unset($_SESSION['ONLINE_PAY_ORDER_ID']);
    }


    function redirect($url) {
        Asset::getInstance()->addString("
        <script>
            window.location.href = '".$url."';
        </script>
        ");
        LocalRedirect($url, false);
    }


    /**
     * Возвращает полный URL текущей страницы
     * без GET параметров
     * @return string
     */
    function getCurUrl() {
        $protocol = 'http://';
        if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == '1')) {
            $protocol = 'https://';
        }
        $host = $_SERVER['HTTP_HOST'];
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
        return $protocol.$host.$uri;
    }


    static  function _pr($var) {
        echo '<pre>';
        if ($var) {
            print_r($var);
        } else {
            var_dump($var);
        }
        echo '</pre>';
    }



}