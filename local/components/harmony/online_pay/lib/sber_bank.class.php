<?php
class sberBankGetaway {

    /** @var string $test       Адрес тестового шлюза */
    private $test_url = 'https://3dsec.sberbank.ru/payment/rest/';

    /** @var string $prod_url   Адрес боевого шлюза*/
    private $prod_url = 'https://securepayments.sberbank.ru/payment/rest/';

    /** @var string $language   Версия страницы оплаты*/
    private $language = 'ru';

    /** @var string $version    Версия плагина*/
    private $version = '1.0';

    /** @var string $login      Логин продавца*/
    private $login;

    /** @var string $password   Пароль продавца */
    private $password;

    /** @var string $mode       Режим работы модуля (test/prod) */
    private $mode = 'prod';

    /** @var string $stage      Стадийность платежа (one/two) */
    private $stage = 'one';

    /** @var boolean $logging   Логгирование (1/0) */
    private $logging = 0;

    /** @var string $currency   Числовой код валюты в ISO 4217 */
    private $currency = '643';

    /** @var integer $taxSystem  Код системы налогообложения
     * доступны следующие значения:
     * 0 - общая;
     * 1 - упрощённая, доход;
     * 2 - упрощённая, доход минус расход;
     * 3 - единый налог на вменённый доход;
     * 4 - единый сельскохозяйственный налог;
     * 5 - патентная система налогообложения;
     */
    public $taxSystem = 0;

    /**
     * @var int $taxType
     * 0 – без НДС;
     * 1 – НДС по ставке 0%;
     * 2 – НДС чека по ставке 10%;
     * 3 – НДС чека по ставке 18%;
     * 4 – НДС чека по расчетной ставке 10/110;
     * 5 – НДС чека по расчетной ставке 18/118.
     */
    public $taxType = 3;

    /** @var boolean $rbs_ofd_status   Логгирование (1/0) */
    private $ofd_status = 1;

    function __construct($params)
    {
        $this->login = $params['GETAWAY_LOGIN'];
        $this->password = $params['GETAWAY_PASSWORD'];
        if (!empty($params['GETAWAY_TEST_MODE'])){
            $this->mode = 'test';
        }
        if (!empty($params['GETAWAY_DEBUG'])) {
            $this->logging = 1;
        }

    }


    private function log($data) {
        if ($this->logging) COnlinePay::_pr($data);
    }

    /*
     *  return array(status, error, redirect_url, order_id)
     */
    public function createOrder($data, $return_url) {
        $this->log(['createOrder function start', $data, $return_url]);
        $order_number = 'm_'.date('Y_m_d');
        $amount = $data['amount']*100;
        $description = 'Договор '.$data['dogovor'].', '.$data['pay_type']. '. Платильщик: '.$data['name'];

        $jsonParams = [
            'Платильщик' => $data['name'],
            //'Телефон' => $data['phone'],
            'phone' => $data['phone'],
            'Договор' => $data['dogovor'],
            'Наименование платежа' => $data['pay_type']
        ];

        // Корзина для чека
        $orderBundle = [];
        $orderBundle['cartItems']['items'] = [
           [
               'positionId' => 1,
               'name' => 'Онлайн-оплата по договору '.$data['dogovor'].', '.$data['pay_type'],
               'quantity' => [
                   'value' => 1,
                   'measure' => 'шт.'
               ],
               'itemCode' => 1,
               'tax' => [
                   'taxType' => $this->taxType,
                   'taxSum' => 0
               ],
               'itemPrice' => $amount
           ]
        ];





        $response = $this->register_order($order_number, $amount, $return_url, $description, $jsonParams, $orderBundle);
        if (isset($response['errorCode'])) {
            return ['status' => false, 'error' => $response['errorMessage'].'(код ошибки: '.$response['errorCode'].')'];
        } elseif (isset($response['formUrl'])) {
            return ['status' => true, 'redirect_url' => $response['formUrl'], 'order_id' => $response['orderId'] ];
        } else {
            return ['status' => false, 'error' => 'Неизвестная ошибка при создании платежа'];
        }
    }


    public function getOrderStatus($orderId)
    {
        $returnData = [
            'status' => false,
            'error' => '',
            'order_number' => '',
            'order_info' => []
        ];
        $response = $this->get_order_status($orderId);

        $this->log($response);


        if(!empty($response['orderStatus']) && $response['orderStatus'] == 2) {
            $returnData['status'] = true;
            $returnData['order_number'] = $response['orderNumber'];
            foreach ($response['merchantOrderParams'] as $param) {
                if ($param['name'] == 'phone') $param['name'] = "Телефон";
                $returnData['order_info'][] = $param;
            }
            $returnData['order_info'][] = [
                'name' => "Сумма",
                'value' => ($response['amount']/100) . " руб."
            ];
        } else {
                $returnData['error'] =  $response['actionCodeDescription'];
        }

        return $returnData;
    }




    /********/
    /**
     * Формирование запроса в платежный шлюз и парсинг JSON-ответа
     *
     * @param string $method Метод запроса в ПШ
     * @param mixed[] $data Данные в запросе
     * @return mixed[]
     */
    private function gateway($method, $data) {

        // Добавления логина и пароля продавца к каждому запросу
        $data['userName'] = $this->login;
        $data['password'] = $this->password;
        $data['language'] = $this->language;

        // Выбор адреса ПШ в зависимости от выбранного режима
        if ($this->mode == 'test') {
            $url = $this->test_url;
        } else {
            $url = $this->prod_url;
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.$method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data, '', '&'),
            CURLOPT_HTTPHEADER => array('CMS: Bitrix'),
            CURLOPT_SSLVERSION => 6
        ));

        $response = curl_exec($curl);

        if ($this->logging) {
            $this->logger($url, $method, $data, $response);
        }
        $response = json_decode($response, true);
        curl_close($curl);

        return $response;
    }

    /**
     * Логирование запроса и ответа от ПШ
     *
     * @param string $url
     * @param string $method
     * @param mixed[] $request
     * @param mixed[] $response
     * @return integer
     */
    private function logger($url, $method, $request, $response) {
        $this->log([
            "RBS PAYMENT" => $url.$method,
            "REQUEST" => $request,
            "RESPONSE" => $response
        ]);
    }

    /**
     * Решистрация заказа в ПШ
     *
     * @param string $order_number Номер заказа в магазине
     * @param integer $amount Сумма заказа
     * @param string $return_url Страница в магазине, на которую необходимо вернуть пользователя
     * @param null $orderBundle
     * @return mixed[] Ответ ПШ
     */
    public function register_order($order_number, $amount, $return_url, $description, $jsonParams,  $orderBundle = null ) {

        $data = array(
            'orderNumber' => $order_number . "_". time(),
            'amount' => $amount,
            'returnUrl' => $return_url,
            'description' => $description,
            'jsonParams' => json_encode($jsonParams),
        );
        if ($this->currency != 0) {
            $data['currency'] = $this->currency;
        }

        if ($this->ofd_status && !empty($orderBundle)) {
            $data['taxSystem'] = $this->taxSystem;

            $data['orderBundle']['orderCreationDate'] = date('c');
            $data['orderBundle'] = json_encode($orderBundle);
        }


        return $this->gateway($this->stage == 'two' ? 'registerPreAuth.do' : 'register.do', $data);
    }

    /**
     * Статус заказа в ПШ
     *
     * @param string $orderId Идентификатор заказа в ПШ
     * @return mixed[] Ответ ПШ
     */
    public function get_order_status($orderId) {
        return $this->gateway('getOrderStatusExtended.do', array('orderId' => $orderId));
    }




}