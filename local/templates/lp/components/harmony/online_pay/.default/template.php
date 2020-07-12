<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 */

CJSCore::Init(array("jquery2"));
?>
<div class="s-online-pay-component">
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



<? if ($arResult['SHOW_FORM']) { ?>

    <form method="post" class="miniform_box">
        <p class="miniform_title">Чтобы произвести оплату заполните форму</p>
        <input type="text" class="form-control" placeholder="ФИО" name="name" value="<?= isset($arResult['PAY_DATA']['name'])
            ? $arResult['PAY_DATA']['name']
            : '' ?>">

        <input type="text" class="form-control" placeholder="+7 (___) ___-__-__" name="phone" value="<?= isset($arResult['PAY_DATA']['phone'])
            ? $arResult['PAY_DATA']['phone']
            : '' ?>">

        <input type="text" class="form-control" placeholder="Номер и дата договора" name="dogovor" value="<?= isset($arResult['PAY_DATA']['dogovor'])
            ? $arResult['PAY_DATA']['dogovor']
            : '' ?>">

        <input type="text" class="form-control" placeholder="Наименование оплаты" name="pay_type" value="<?= isset($arResult['PAY_DATA']['pay_type'])
            ? $arResult['PAY_DATA']['pay_type']
            : '' ?>">

        <input type="text" class="form-control" placeholder="Сумма оплаты (руб.)" name="amount" value="<?= isset($arResult['PAY_DATA']['amount'])
            ? $arResult['PAY_DATA']['amount']
            : '' ?>">

        <div class="miniform_checkbox">
            <input type="checkbox" class="form-checkbox" checked required>
            <label>
                Отправляя заявку, я соглашаюсь на <a href="#">обработку персональных данных</a>
            </label>
        </div>
        <button class="btn btn-lg btn-warning" type="button" onclick="PayFormSubmit(this)">
            Оплатить
        </button>
    </form>

<? } ?>

</div>



