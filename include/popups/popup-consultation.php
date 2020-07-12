<div style="display: none">

    <div class="base-popup popup-form popup-catalog-consultation" id="popup-catalog-consultation">
        <form class="miniform_box" method="POST" data-ajax="true" data-hashtag="catalog-consultation" data-popup="thanks">
            <input type="hidden" name="schema" value="catalog-consultation">
            <input type="hidden" name="product_name" value="<?=htmlspecialcharsbx($product_name)?>">
            <p class="miniform_title">Нужна консультация <br> или помощь в выборе?</p>
            <p class="miniform_text">
                Заполните форму и наши менеджеры свяжутся с Вами
            </p>
            <input type="text" name="name" class="form-control" placeholder="Ваше имя">
            <input type="text" name="phone" class="form-control" placeholder="+7 (___) ___-__-__">
            <div class="miniform_checkbox">
                <input type="checkbox" class="form-checkbox" name="user-consent" value="1" checked required>
                <label>
                    Отправляя заявку, я соглашаюсь на обработку персональных данных
                </label>
            </div>
            <button class="btn btn-lg btn-warning" type="submit">
                Заказать
            </button>
        </form>
    </div>

</div>