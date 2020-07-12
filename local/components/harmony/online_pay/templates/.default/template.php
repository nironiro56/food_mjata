<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 */

CJSCore::Init(array("jquery"));
?>

<div class="s-online-pay-component">
    <div class="row">
        <div class="col-md-12">
            <div class="pay-form-title text-center">Онлайн оплата</div>
        </div>
        <div class="col-md-12">


<? switch ($arResult['STATE']) {
    case 'pay-complete': ?>
        <div class="success-pay">
            Спасибо! Ваш платеж принят. Номер транзакции <?= $arResult['ORDER_NUMBER'] ?>.
        </div>
        <? break; ?>

    <? case 'pay-error': ?>
        <div class="badge-error pay-error alert alert-danger">Во время обработки платежа произошла ошибка! <?=$arResult['ERROR_TEXT']?>. Пожалуйста, попробуйте еще раз.
        </div>
        <? break; ?>

    <? case 'error': ?>
        <div class="badge-error alert alert-danger">Ошибка! <?=$arResult['ERROR_TEXT']?></div>
        <? break; ?>


<? } ?>
        </div>


<? if ($arResult['SHOW_FORM']) { ?>
    <div class="col-md-8">
        <div class="pay__information">
            <p class="pay_title_info_left">Уважаемые покупатели!</p>
            <div class="pay_text_information_info">

                <p>На данной странице Вы сможете внести авансовый платеж или сделать полную оплату по заключенному с
                    нами договору. Для этого воспользуйтесь формой справа.</p>

                <p>1. Введите Ваше ФИО
                    <br>
                    2. Введите номер Вашего договора и дату договора
                    <br>
                    3. Введите наименование платежа («Авансовый/Окончательный/Полный платеж по
                    договору№_______от________)
                    <br>
                    4. Введите сумму оплаты и нажмите кнопку «Оплатить»
                    <br>
                    5. Система автоматически переведёт Вас на страницу авторизационного сервера Сбербанка, где Вам будет предложено ввести данные пластиковой карты, инициировать ее авторизацию, после чего вы сможете вернуться в наш магазин кликом по кнопке "Вернуться в магазин".</p>

                <p>На странице оплаты банка Вам необходимо будет ввести Ваш номер телефона и адрес электронной почты
                    для дальнейшего получения электронного чека об оплате.</p>

                <hr>

                <p>*Конфиденциальность сообщаемой персональной информации обеспечивается ОАО "Сбербанк России". Введенная информация не будет предоставлена третьим лицам за исключением случаев, предусмотренных законодательством РФ. Проведение платежей по банковским картам осуществляется в строгом соответствии с требованиями платежных системVisa Int. и MasterCard Europe Sprl.
                </p>

            </div>
        </div>
    </div>
        <div class="col-md-4">
        <div class="pay-form">

            <div class="pay-form-description text-center">Чтобы произвести онлайн оплату <br> заполните поля ниже</div>
            <form method="POST">
                <div class="form-input form-group">
                    <input class="form-control" type="text" placeholder="Ф.И.О" name="name" value="<?= isset($arResult['PAY_DATA']['name'])
                        ? $arResult['PAY_DATA']['name']
                        : '' ?>">
                </div>
                <div class="form-input  form-group">
                    <input class="form-control" type="text" placeholder="Контактный номер" name="phone" value="<?= isset($arResult['PAY_DATA']['phone'])
                        ? $arResult['PAY_DATA']['phone']
                        : '' ?>">
                </div>
                <div class="form-input  form-group">
                    <input class="form-control" type="text"  placeholder="Номер и дата вашего договора" name="dogovor" value="<?= isset($arResult['PAY_DATA']['dogovor'])
                        ? $arResult['PAY_DATA']['dogovor']
                        : '' ?>">
                </div>
                <div class="form-input  form-group">
                    <input class="form-control" type="text" placeholder="Наименование платежа" name="pay_type" value="<?= isset($arResult['PAY_DATA']['pay_type'])
                        ? $arResult['PAY_DATA']['pay_type']
                        : '' ?>">
                </div>
                <div class="form-input form-group">
                    <input class="form-control" type="text" placeholder="Сумма оплаты (руб.)" name="amount" value="<?= isset($arResult['PAY_DATA']['amount'])
                        ? $arResult['PAY_DATA']['amount']
                        : '' ?>">
                </div>
                <div class="text-center">
                    <button type="button" onclick="PayFormSubmit(this)" class="btn form__btn btn-default">ОПЛАТИТЬ</button>
                </div>

            </form>
        </div>
        </div>
<? } ?>
        <div class="col-md-12 col-xs-12 pay__information information-bottom">
<hr>
            <p class="pay-form-title text-center">Правила оплаты и безопасность платежей,<br>конфиденциальность информации</p>
            <div class="text_information_info">
                <div class="row card-info">
                    <div class="col-md-5 col-xs-5 text-right">
                        <img src="/upload/oplata/visa.png" alt="">
                        <img src="/upload/oplata/mastercard.png" alt="">
                    </div>
                    <div class="col-md-7 col-xs-7 right">
                        <p><b>Оплата банковскими картами осуществляется через ОАО «Сбербанк России».</b></p>

                        <p><strong>К оплате принимаются карты VISA и MasterCard.</strong></p>
                    </div>
                </div>
                <hr>
                <p>Для оплаты покупки Вы будете перенаправлены на платежный шлюз ОАО "Сбербанк России" для ввода реквизитов Вашей карты. Пожалуйста, приготовьте Вашу пластиковую карту заранее. Соединение с платежным шлюзом и передача информации осуществляется в защищенном режиме с использованием протокола шифрования SSL.</p>
                <p>В случае если Ваш банк поддерживает технологию безопасного проведения интернет-платежей Verified By Visa или MasterCard Secure Code для проведения платежа также может потребоваться ввод специального пароля. Способы и возможность получения паролей для совершения интернет-платежей Вы можете уточнить в банке, выпустившем карту.</p>
                <p>Настоящий сайт поддерживает 258-битное шифрование. Конфиденциальность сообщаемой персональной информации обеспечивается ОАО "Сбербанк России". Введенная информация не будет предоставлена третьим лицам за исключением случаев, предусмотренных законодательством РФ. Проведение платежей по банковским картам осуществляется в строгом соответствии с требованиями платежных систем Visa Int. и MasterCard Europe Sprl.</p>
                <p>
                    <b>Оплата по банковским картам VISA</b></p>

                    <p>К оплате принимаются все виды платежных карточек VISA, за исключением Visa Electron. В большинстве случаев карта Visa Electron не применима для оплаты через интернет, за исключением карт, выпущенных отдельными банками. О возможность оплаты картой Visa Electron вам нужно выяснять у банка-эмитента вашей карты.<p>


                <p><b>Оплата по кредитным картам MasterCard</b></p>

                   <p> На сайте к оплате принимаются все виды MasterCard, за исключением Maestro.<p>


                <p><b>Что нужно знать:</b></p>
                <ul>
                    <li>номер вашей кредитной карты;</li>
                    <li>cрок окончания действия вашей кредитной карты, месяц/год;</li>
                    <li>CVV код для карт Visa / CVC код для Master Card:
                    3 последние цифры на полосе для подписи на обороте карты.</li>
                </ul>


                    <p>Если на вашей карте код CVC / CVV отсутствует, то, возможно, карта не пригодна для CNP транзакций (т.е. таких транзакций, при которых сама карта не присутствует, а используются её реквизиты), и вам следует обратиться в банк для получения подробной информации.
                </p>
                <br>
                    По вопросам оплаты с помощью банковской карты и иным вопросам, связанным с работой сайта, Вы можете обращаться по
                    телефону: 8 (812) 600-17-13</p>
                <hr>
            </div>

        </div>

    </div>

</div>

