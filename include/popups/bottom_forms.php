<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div style="display: none">
    <div class="base-popup popUp-form popup-thanks" id="popup-thanks">
        <div class="inner text-center">
            <p class="title">Спасибо!</p>
            <p class="desc">
                Наш менеджер свяжется с Вами в ближайшее
                время </p>
        </div>
    </div>

    <div class="base-popup popup-form popup-gizyner" id="popup-gizyner">
        <form class="miniform_box" method="POST" data-ajax="true" data-hashtag="get_diz" data-popup="thanks">
            <input type="hidden" name="schema" value="get_diz">
            <p class="miniform_title">Хотите вызвать дизайнера?</p>
            <p class="miniform_text">
                Заполните форму и наши менеджеры свяжутся с Вами
            </p>
            <input type="text" name="name" class="form-control" placeholder="Ваше имя">
            <input type="text" name="phone" class="form-control" placeholder="+7 (___) ___ - __ - __">
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

    <div class="base-popup popup-form popup-zamershik" id="popup-zamershik">
        <form class="miniform_box" method="POST" data-ajax="true" data-hashtag="get_zamer" data-popup="thanks">
            <input type="hidden" name="schema" value="get_zamer">
            <p class="miniform_title">Хотите вызвать замерщика?</p>
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

    <div class="base-popup popup-form popup-callback" id="popup-callback">
        <form class="miniform_box" method="POST" data-ajax="true" data-hashtag="get_zamer" data-popup="thanks">
            <input type="hidden" name="schema" value="get_zamer">
            <p class="miniform_title">Хотите мы вам перезвоним?</p>
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
                Перезвоните мне
            </button>
        </form>
    </div>

    <div class="base-popup popup-form popup-callback" id="popup-consultation">
        <form class="miniform_box" method="POST" data-ajax="true" data-hashtag="popup-consultation" data-popup="thanks">
            <input type="hidden" name="schema" value="consultation">
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
                Перезвоните мне
            </button>
        </form>
    </div>

</div>

