<?php
namespace Seonity\Forms;

use Seonity\Helper,
    PHPMailer\PHPMailer\PHPMailer,
    PHPMailer\PHPMailer\SMTP,
    PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set("display_errors", 0);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

define('UPLOAD_FILE_DIR', __DIR__.'/uploads/files/');

define('HTTP_SERVER', 'http://'.$_SERVER['SERVER_NAME'].'/');
define('UPLOAD_FILE_ADR', HTTP_SERVER.'uploads/files/');


class FormSubmitter {
    public $schema = array(
        'callback_universal' => [
            'title' => 'Запрос обратного звонка',
            'required' => array('phone', 'name'),
            'skip' => ['user-consent'],
            /*'processors' => [
                'ReviewSave' => [
                    'iblockId' => 13
                ]
            ],*/
            'fields' => array(
                'form_description' => 'Описание заявки',
                'name' => 'Имя',
                'phone' => 'Телефон'
            ),
            //'emails' => [""]

        ],

        'consultation' => [
            'title' => 'Запрос консультации',
            'required' => array('phone', 'name', 'user-consent'),
            'fields' => array(
                'name' => 'Имя',
                'phone' => 'Телефон',
                'user-consent' => ''
            )
        ],

        'calculator' => [
            'title' => 'Расчет кухни',
            'required' => ['phone', 'name'],
            //'skip' => ['user-consent'],
            /*'processors' => [
                'ReviewSave' => [
                    'iblockId' => 13
                ]
            ],*/
            'fields' => [
                'name' => 'Имя',
                'phone' => 'Телефон',
                'product_name' => 'Продукт',

                'ktype' => 'Планировка',
                'style' => 'Стиль',

                'width1' => 'Длина (см) (Прямая кухня)',

                'width2' => 'Левая стена (см) (Угловая кухня)',
                'width3' => 'Правая стена (см) (Угловая кухня)',

                'width4' => 'Левая стена (см) (П-образная кухня)',
                'width5' => 'Правая стена (см) (П-образная кухня)',
                'width6' => 'Центр (см) (П-образная кухня)',

                'width7' => 'Левая стена (см) (Островная кухня)',
                'width8' => 'Правая стена (см) (Островная кухня)',
                'width9' => 'Центр (см) (Островная кухня)',

                'material' => 'Материал',
                'stoleshnica' => 'Столешница',
                'ukrasheniya' => 'Украшения',
                'tech' => 'Необходимая техника',

                'plan_file' => 'План помещения'


            ],
            //'emails' => [""]

        ],

        'diz_request' => [
            'title' => 'Заказ бесплатного дизайн-проекта',
            'required' => ['phone', 'name', 'user-consent'],
            'skip' => ['user-consent'],
            /*'processors' => [
                'ReviewSave' => [
                    'iblockId' => 13
                ]
            ],*/
            'fields' => [
                'name' => 'Имя',
                'phone' => 'Телефон',
                'user-consent' => ''
            ],
            //'emails' => [""]

        ],

        'get_diz' => [
            'title' => 'Вызов дизайнера',
            'required' => ['phone', 'name', 'user-consent'],
            'skip' => ['user-consent'],
            'fields' => [
                'name' => 'Имя',
                'phone' => 'Телефон',
                'user-consent' => ''
            ],
            //'emails' => [""]
        ],
        'get_zamer' => [
            'title' => 'Вызов замерщика',
            'required' => ['phone', 'name', 'user-consent'],
            'skip' => ['user-consent'],
            'fields' => [
                'name' => 'Имя',
                'phone' => 'Телефон',
                'user-consent' => ''
            ],
            //'emails' => [""]
        ],
        'catalog-zakaz' => [
            'title' => 'Заказ товара',
            'required' => ['phone', 'name', 'user-consent'],
            'skip' => ['user-consent'],
            'fields' => [
                'name' => 'Имя',
                'phone' => 'Телефон',
                'product_name' => 'Название товара',
                'user-consent' => ''
            ],
            //'emails' => [""]
        ],
        'catalog-consultation' => [
            'title' => 'Консультация по товару',
            'required' => ['phone', 'name', 'user-consent'],
            'skip' => ['user-consent'],
            'fields' => [
                'name' => 'Имя',
                'phone' => 'Телефон',
                'product_name' => 'Название товара',
                'user-consent' => ''
            ],
            //'emails' => [""]
        ],
        'calc-stoleshnits' => [
            'title' => 'Расчет столешницы',
            'required' => ['phone', 'name', 'user-consent'],
            'skip' => ['user-consent'],
            'fields' => [
                'name' => 'Имя',
                'phone' => 'Телефон',
                'product_name' => 'Название товара',
                'user-consent' => ''
            ],
            //'emails' => [""]
        ],
        'consult-stoleshnits' => [
            'title' => 'Консультация по столешницам',
            'required' => ['phone', 'name', 'user-consent'],
            'skip' => ['user-consent'],
            'fields' => [
                'name' => 'Имя',
                'phone' => 'Телефон',
                'product_name' => 'Название товара',
                'user-consent' => ''
            ],
            //'emails' => [""]
        ],



    );

    private $download_dir = UPLOAD_FILE_DIR;
    private $_res = array(
        'errors' => false,
        'fields' => array()
    );
    private $setting;

    private $_currentSchema = NULL;

    private $_fields = array();
    private $_files = [];

    public function __construct() {

    }

    public function getEmails() {
        $data = [];

        $main_email = \COption::GetOptionString("main", "email_from");
        $copyEmail = \COption::GetOptionString("main", "all_bcc");

        $data = [
            $main_email,
            //'oleg-elegant@yandex.ru'
            //'kulchickiy.a@yandex.ru'
        ];

        if (!empty($this->schema[$this->_currentSchema]['emails'])) {
            foreach ($this->schema[$this->_currentSchema]['emails'] as $email) {
                $data[] = $email;
            }
        }

        if (trim($copyEmail)) {
            $copyEmailArr = explode(',', $copyEmail);
            foreach ($copyEmailArr as $email) {
                if (trim($email)) {
                    $data[] = $email;
                }
            }
        }

        //$data = ['kulchickiy.a@yandex.ru', 'seo@seonity.ru'];

        return $data;
    }

    private function _validatePhone() {
        if (array_key_exists('phone', $this->_fields) && !empty($this->_fields['phone'])) {
            $this->_fields['phone'] = preg_replace('/[^0-9.\+,\(,\),-]/', '', $this->_fields['phone']);
            //if (strlen($this->_fields['phone']) !== 11) {
            //	$this->_fields['phone'] = NULL;
            //	$this->_addError('phone', 'Неправильный формат номера телефона!');
            //}
        }
    }

    private function customValidation() {
        if ($this->_currentSchema == 'feedback') {
            if (empty($this->_fields['phone']) && empty($this->_fields['email'])) {
                $this->_addError('phone', '');
                $this->_addError('email', '');
            }
        }
    }


    private function _loadFiles() {

        if ($this->_currentSchema == 'calculator') {
            if (!empty($this->_fields['plan_file'])) {
                $fileId = $this->_fields['plan_file'];
                $file = \CFile::GetFileArray($fileId);
                $this->_fields['plan_file'] = '<a href="http://' . $_SERVER['SERVER_NAME'] . $file['SRC'] . '">' . $file['ORIGINAL_NAME'] . '</a>';
            }
        }
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function _addError($name, $desc = '') {
        $this->_res['fields'] []= array('name' => $name, 'description' => $desc);
        $this->_res['errors'] = true;
    }

    private function _getValue($name) {
        if (isset($_POST[$name])) {
            if (is_array($_POST[$name])) {
                return htmlspecialchars(implode(', ', $_POST[$name]));
            }
            return htmlspecialchars($_POST[$name]);
        }

    }

    private function _require($name) {
        if (isset($_POST[$name]) && !empty($_POST[$name])) {
            return $this->_getValue($name);
        }
        $this->_addError($name, 'Не указано значение поля!');
        return NULL;
    }

    private function _fillSchemaFields() {
        foreach ($this->schema[$this->_currentSchema]['fields'] as $key => $value) {
            $this->_fields[$key] = $this->_getValue($key);
        }
    }


    private function _checkSchemaFields() {
        foreach ($this->schema[$this->_currentSchema]['required'] as $value) {
            $this->_fields[$value] = $this->_require($value);
        }
        $this->_validatePhone();
        $this->customValidation();

    }

    private function _requireSchema() {
        $this->_currentSchema = $this->_require('schema');
        if (!array_key_exists($this->_currentSchema, $this->schema)) {
            $this->_addError('schema');
        }

        if ($this->_res['errors']) {
            return false;
        }

        $this->_fillSchemaFields();
        $this->_checkSchemaFields();

        if ($this->_res['errors']) {
            return false;
        }

        $this->_loadFiles();

        if ($this->_res['errors']) {
            return false;
        }

        return true;
    }


    private function _sendEmailOld() {


        $body = '<p>С сайта <a href="'.$_SERVER['SERVER_NAME'].'">'.$_SERVER['SERVER_NAME'].'</a> поступила заявка!</p>';
        $body .= '<p><b>Тип заявки:</b> '.$this->schema[$this->_currentSchema]['title'].'</p>';
        foreach ($this->_fields as $key => $value) {
            if ($key == 'user-consent') continue;

            $body .= '<p><b>'.$this->schema[$this->_currentSchema]['fields'][$key].':</b> '.$value.'</p>';
        }

        if (!empty( $this->_files )) {
            $body .= '<p><b>Прикрипленные файлы:</b> ';

            foreach ($this->_files as $file) {
                $body .= '<a href="'.$file['path'].'">'.$file['name'].'</a> ';
            }
        }
        $body .='<p>url: <i>'.$_SERVER['HTTP_REFERER'].'</i></p>';


        $subject = 'Заявка с сайта '.$_SERVER['SERVER_NAME']
            . ' (' . $this->schema[$this->_currentSchema]['title'] . ')';
        $emails = $this->getEmails();
        $fromEmail = 'info@astra-marine.ru';

        $headers= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;charset=utf-8\r\n";
        $headers .= "From: $fromEmail\r\n";
        $headers .= "Reply-To: $fromEmail\r\n";
        foreach($emails as $mail){
            mail($mail, $subject, $body, $headers);
        }
    }

    private function _sendEmail() {


        $body = '<p>С сайта <a href="'.$_SERVER['SERVER_NAME'].'">'.$_SERVER['SERVER_NAME'].'</a> поступила заявка!</p>';
        $body .= '<p><b>Тип заявки:</b> '.$this->schema[$this->_currentSchema]['title'].'</p>';
        foreach ($this->_fields as $key => $value) {
            if ($key == 'user-consent') continue;

            $body .= '<p><b>'.$this->schema[$this->_currentSchema]['fields'][$key].':</b> '.$value.'</p>';
        }

        if (!empty( $this->_files )) {
            $body .= '<p><b>Прикрипленные файлы:</b> ';

            foreach ($this->_files as $file) {
                $body .= '<a href="'.$file['path'].'">'.$file['name'].'</a> ';
            }
        }
        $body .='<p>url: <i>'.$_SERVER['HTTP_REFERER'].'</i></p>';


        $subject = 'Заявка с сайта '.$_SERVER['SERVER_NAME']
            . ' (' . $this->schema[$this->_currentSchema]['title'] . ')';
        $recipientEmails = $this->getEmails();
        $fromEmail = 'no-reply@astra-marine.ru';

        $mail = new PHPMailer(true);

        try {
            //Server settings

            $mail->isSendmail();


            //Recipients
            $mail->setFrom($fromEmail, 'Кухни Гармонияя');

            foreach($recipientEmails as $mailAddress) {
                $mail->addAddress($mailAddress);     // Add a recipient
            }

            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);

            $mail->send();
            return true;
        } catch (Exception $e) {
            $this->_res['errors'] = true;
            $this->_res['smtp'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }


    /**
     * Проверяем определены ли класы доп оброботки формы и запускаем их
     * например, сохранение данных в инфоблок
     *
     * @throws \ErrorException
     */
    protected function loadFormProcessors()
    {
        if (empty($this->schema[$this->_currentSchema]['processors'])) return false;

        $processorsList = $this->schema[$this->_currentSchema]['processors'];

        if (!is_array($processorsList)) {
            throw new \ErrorException("processors field must be array");
        }

        foreach ($processorsList as $key => $value) {

            if (is_array($value)) { // Переданы дополнительные параметры
                $processorName = $key;
                $params = $value;
            } else {
                $processorName = $value;
                $params = [];
            }

            $className = "\\Seonity\\Forms\\".$processorName . 'FormProcessor';

            if (!class_exists($className)) {
                throw new \ErrorException("Processor class ".$className. " not found");
            }

            /**
             * @var $processor SFormProcessorInterface
             */
            $processor = new $className($this->_fields, $params);
            $processor->process();
        }
    }



    public function submitForm() {
        header('Content-type:application/json;charset=utf-8');
        if ($this->_requireSchema()) {
            $this->_sendEmail();
            $this->loadFormProcessors();
        }
        echo json_encode($this->_res);
        die();
    }


}


interface SFormProcessorInterface
{
    /**
     * Выполнение дополнительных действий с донными формы
     *
     * @return mixed
     */
    public function process();

}


abstract class SFormProcessor implements SFormProcessorInterface
{
    /**
     * Данные полей формы
     * @var array
     */
    protected $fields = [];

    protected $params;

    public function __construct($fields, $params = [])
    {
        $this->fields = $fields;
        $this->params = $params;
        $this->prepareParams();
        $this->prepareFields();
    }

    /**
     * Проверка коректности параметров переданных в конструктор
     * и установка дополнительных параметров класа
     *
     * @throws \ErrorException;
     */
    protected function prepareParams()
    {
        if (!is_array($this->params)) {
            throw new \ErrorException('Processor class $params must be array');
        }
    }

    protected function prepareFields()
    {
        foreach ($this->fields as &$field) {
            $field = htmlspecialcharsBack($field);
        }
    }
}


class ReviewSaveFormProcessor extends SFormProcessor
{
    protected $iblockId;

    protected function prepareParams()
    {
        parent::prepareParams();

        if (empty($this->params['iblockId'])) {
            throw new \ErrorException('ReviewSaveFormProcessor iblockId param is empty');
        }

        $this->iblockId = $this->params['iblockId'];
    }

    public function process()
    {
        $arFields = [];
        $arProps = [];

        $arProps["SHIP_ID"] = $this->fields['ship_id'];
        $arProps["AUTOR_NAME"] = $this->fields['name'];
        $arProps["AUTOR_EMAIL"] = $this->fields['email'];

        $arFields['IBLOCK_ID'] = $this->iblockId;
        $arFields['NAME'] = 'Новый отзыв - ' . $this->fields['ship_name'];
        $arFields['DETAIL_TEXT'] =  "<p>" . nl2br($this->fields['comment']) . "</p>";
        $arFields['DETAIL_TEXT_TYPE'] = 'html';
        $arFields['ACTIVE'] = 'N';
        $arFields['ACTIVE_FROM'] = date('d.m.Y');
        $arFields['PROPERTY_VALUES'] = $arProps;

        $this->save($arFields);
    }


    /**
     * @param array $arFields
     * @return bool|int
     */
    protected function save($arFields)
    {
        $el = new \CIBlockElement;
        $newID = $el->Add($arFields, false, false, true);
        return $newID;
    }
}






$submitter = new FormSubmitter();
$submitter->submitForm();