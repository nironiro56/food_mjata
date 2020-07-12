<div class="calculator">

    <?
    $product_name = isset($_GET['product']) ? htmlspecialcharsbx($_GET['product']) : '';
    ?>

    <form class="stepform_component" method="POST" data-ajax="true" data-hashtag="calculator">
        <input type="hidden" name="schema" value="calculator">
        <input type="hidden" name="product_name" value="<?=$product_name?>">

        <p class="stepform_title">Узнайте сколько будет стоить ваша кухня</p>
        <ul class="stepform_bullets step_indicator">
            <li href="#" class="stepform_bullets_item step_indicator_item active" data-step-bullet="1"></li>
            <li href="#" class="stepform_bullets_item step_indicator_item" data-step-bullet="2"></li>
            <li href="#" class="stepform_bullets_item step_indicator_item" data-step-bullet="3"></li>
            <li href="#" class="stepform_bullets_item step_indicator_item" data-step-bullet="4"></li>
            <li href="#" class="stepform_bullets_item step_indicator_item" data-step-bullet="5"></li>
        </ul>
        <div class="stepform_steps">
            <div class="stepform_box block step_1 current_step" data-step="1">
                <div class="stepform_part">
                    <p class="stepform_part_title title">
                        Выберите планировку
                    </p>
                    <div class="stepform_part_radio_group">
                        <div class="buildform_filter_type_items buildform_filter_type_items--stepform">
                            <div class="buildform_filter_type_item">
                                <div class="buildform_filter_type_icon buildform_filter_type_icon--straight"></div>
                                <input type="radio" name="ktype" value="Прямая" checked hidden
                                       data-change-part="straight">
                                <p>Прямая</p>
                            </div>
                            <div class="buildform_filter_type_item">
                                <div class="buildform_filter_type_icon buildform_filter_type_icon--angular"></div>
                                <p>Угловая</p>
                                <input type="radio" name="ktype" value="Угловая" hidden data-change-part="angular">
                            </div>
                            <div class="buildform_filter_type_item">
                                <div class="buildform_filter_type_icon buildform_filter_type_icon--quadro"></div>
                                <input type="radio" name="ktype" value="П-образная" hidden data-change-part="quadro">
                                <p>П-образная</p>
                            </div>
                            <div class="buildform_filter_type_item">
                                <div class="buildform_filter_type_icon buildform_filter_type_icon--islando"></div>
                                <input type="radio" name="ktype" value="Островная" hidden data-change-part="islando">
                                <p>Островная</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stepform_part c_validate validate-checkbox">
                    <p class="stepform_part_title title">
                        Выберите стиль
                    </p>
                    <div class="stepform_part_checkbox_group ">
                        <div class="stepform_part_checkbox_item">
                            <label class="s-radiobox">
                                <input type="radio" name="style" value="Классический">
                                <span><i></i>Классический</span>
                            </label>
                        </div>
                        <div class="stepform_part_checkbox_item">

                            <label class="s-radiobox">
                                <input type="radio" name="style" value="Лофт">
                                <span><i></i>Лофт</span>
                            </label>

                        </div>
                        <div class="stepform_part_checkbox_item">
                            <label class="s-radiobox">
                                <input type="radio" name="style" value="Hi tec">
                                <span><i></i>Hi tech</span>
                            </label>
                        </div>

                        <div class="stepform_part_checkbox_item">
                            <label class="s-radiobox">
                                <input type="radio" name="style" value="Модерн">
                                <span><i></i>Модерн</span>
                            </label>
                        </div>

                    </div>
                    <div class="stepform_part_checkbox_group">

                        <div class="stepform_part_checkbox_item">
                            <label class="s-radiobox">
                                <input type="radio" name="style" value="Минимализм">
                                <span><i></i>Минимализм</span>
                            </label>
                        </div>

                        <div class="stepform_part_checkbox_item">
                            <label class="s-radiobox">
                                <input type="radio" name="style" value="Прованс">
                                <span><i></i>Прованс</span>
                            </label>
                        </div>

                        <div class="stepform_part_checkbox_item">
                            <label class="s-radiobox">
                                <input type="radio" name="style" value="Катри">
                                <span><i></i>Кантри</span>
                            </label>
                        </div>

                        <div class="stepform_part_checkbox_item">
                            <label class="s-radiobox">
                                <input type="radio" name="style" value="Еще не знаю">
                                <span><i></i>Еще не знаю</span>
                            </label>
                        </div>

                    </div>
                </div>
                <div class="stepform_next">
                    <button type="button" class="btn btn-primary js-stepform-next ">Следующий шаг</button>
                </div>
            </div>
            <div class="stepform_box block step_2" data-step="2">
                <div class="stepform_col">

                    <!-- STRAIGHT -->
                    <div class="stepform_part stepform_part--stretch" data-part="straight">
                        <div class="stepform_col_icon">
                            <i class="icon icon_g_straight"></i>
                        </div>
                        <p class="stepform_title stepform_title--left">
                            Укажите размер
                        </p>
                        <p class="stepform_subtitle stepform_subtitle--left">
                            Прямая кухня
                        </p>
                        <div class="stepform_input">
                            <label>Длина (см)</label>
                            <input type="text" name="width1" class="form-control form-control--light"
                                   placeholder="________________________________">
                        </div>
                    </div>
                    <!-- ANGULAR -->
                    <div class="stepform_part" data-part="angular">
                        <div class="stepform_col_icon">
                            <i class="icon icon_g_angular"></i>
                        </div>
                        <p class="stepform_title stepform_title--left">
                            Укажите размер
                        </p>
                        <p class="stepform_subtitle stepform_subtitle--left">
                            Угловая кухня
                        </p>
                        <div class="stepform_input">
                            <label>Левая стена (см)</label>
                            <input type="text" name="width2" class="form-control form-control--light"
                                   placeholder="________________________________">
                        </div>
                        <div class="stepform_input">
                            <label>Правая стена (см)</label>
                            <input type="text" name="width3" class="form-control form-control--light"
                                   placeholder="________________________________">
                        </div>
                    </div>
                    <!-- QUADRO -->
                    <div class="stepform_part" data-part="quadro">
                        <div class="stepform_col_icon">
                            <i class="icon icon_g_quadro"></i>
                        </div>
                        <p class="stepform_title stepform_title--left">
                            Укажите размер
                        </p>
                        <p class="stepform_subtitle stepform_subtitle--left">
                            П-образная кухня
                        </p>
                        <div class="stepform_input">
                            <label>Левая стена (см)</label>
                            <input type="text" name="width4" class="form-control form-control--light"
                                   placeholder="________________________________">
                        </div>
                        <div class="stepform_input">
                            <label>Правая стена (см)</label>
                            <input type="text" name="width5" class="form-control form-control--light"
                                   placeholder="________________________________">
                        </div>
                        <div class="stepform_input">
                            <label>Центр (см)</label>
                            <input type="text" name="width6" class="form-control form-control--light"
                                   placeholder="________________________________">
                        </div>
                    </div>
                    <!-- ISLANDO -->
                    <div class="stepform_part" data-part="islando">
                        <div class="stepform_col_icon">
                            <i class="icon icon_g_islando"></i>
                        </div>
                        <p class="stepform_title stepform_title--left">
                            Укажите размер
                        </p>
                        <p class="stepform_subtitle stepform_subtitle--left">
                            Островная кухня
                        </p>
                        <div class="stepform_input">
                            <label>Левая стена (см)</label>
                            <input type="text" name="width7" class="form-control form-control--light"
                                   placeholder="________________________________">
                        </div>
                        <div class="stepform_input">
                            <label>Правая стена (см)</label>
                            <input type="text" name="width8" class="form-control form-control--light"
                                   placeholder="________________________________">
                        </div>
                        <div class="stepform_input">
                            <label>Центр (см)</label>
                            <input type="text" name="width9" class="form-control form-control--light"
                                   placeholder="________________________________">
                        </div>
                    </div>
                </div>
                <div class="stepform_col">
                    <div class="stepform_part  c_validate validate-checkbox">
                        <p class="stepform_title stepform_title--left title">
                            Выберите материал
                        </p>
                        <div class="stepform_input">
                            <div class="stepform_input_group">
                                <label class="s-radiobox">
                                    <input type="radio" name="material" value="Массив">
                                    <span><i></i>Массив</span>
                                </label>
                                <label class="s-radiobox">
                                    <input type="radio" name="material" value="МДФ-шпон дуба">
                                    <span><i></i>МДФ-шпон дуба</span>
                                </label>
                                <label class="s-radiobox">
                                    <input type="radio" name="material" value="МДФ-эмаль">
                                    <span><i></i>МДФ-эмаль</span>
                                </label>
                                <label class="s-radiobox">
                                    <input type="radio" name="material" value="МДФ-пленка ПВХ">
                                    <span><i></i>МДФ-пленка ПВХ</span>
                                </label>
                                <label class="s-radiobox">
                                    <input type="radio" name="material" value="МДФ-пластик">
                                    <span><i></i>МДФ-пластик</span>
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="stepform_next">
                        <button type="button" class="btn btn-primary js-stepform-next">Следующий шаг</button>
                    </div>
                </div>
            </div>
            <div class="stepform_box block step_3" data-step="3">
                <div class="stepform_col">
                    <div class="stepform_part stepform_part--stretch c_validate validate-checkbox">
                        <p class="stepform_title stepform_title--left title">
                            Выберите столешницу
                        </p>
                        <div class="stepform_input">
                            <div class="stepform_input_group row">
                                <div class="col-md-6 col-xs-12">
                                    <label class="s-radiobox">
                                        <input type="radio" name="stoleshnica" value="Пластик">
                                        <span><i></i>Пластик</span>
                                    </label>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label class="s-radiobox">
                                        <input type="radio" name="stoleshnica" value="Кварцовый агломерат">
                                        <span><i></i>Кварцевый агломерат</span>
                                    </label>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label class="s-radiobox">
                                        <input type="radio" name="stoleshnica" value="Акриловый камень">
                                        <span><i></i>Акриловый камень</span>
                                    </label>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label class="s-radiobox">
                                        <input type="radio" name="stoleshnica" value="Еще не знаю">
                                        <span><i></i>Еще не знаю</span>
                                    </label>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="stepform_col">
                    <div class="stepform_part">
                        <p class="stepform_title stepform_title--left title">
                            Выберите опции
                        </p>
                        <div class="stepform_input">
                            <div class="stepform_input_group row">
                                <div class="col-md-12 col-xs-12 flex-md-space-between">
                                    <label class="s-checkbox">
                                        <input type="checkbox" name="acesores[]" value="Фартук (стеновая панель)">
                                        <span><i></i>Фартук (стеновая панель)</span>
                                    </label>
                                    <label class="s-checkbox">
                                        <input type="checkbox" name="acesores[]" value="Мойка">
                                        <span><i></i>Мойка</span>
                                    </label>
                                    <label class="s-checkbox">
                                        <input type="checkbox" name="acesores[]" value="Бутылочница">
                                        <span><i></i>Бутылочница</span>
                                    </label>
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <label class="s-checkbox">
                                        <input type="checkbox" name="acesores[]" value="Мусорное ведро">
                                        <span><i></i>Мусорное ведро</span>
                                    </label>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label class="s-checkbox">
                                        <input type="checkbox" name="acesores[]" value="Волшебный уголок">
                                        <span><i></i>Волшебный уголок</span>
                                    </label>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label class="s-checkbox">
                                        <input type="checkbox" name="acesores[]" value="Смеситель">
                                        <span><i></i>Смеситель</span>
                                    </label>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label class="s-checkbox">
                                        <input type="checkbox" name="acesores[]" value="Освещение">
                                        <span><i></i>Освещение</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stepform_part">
                    <p class="stepform_part_title">
                        Выберите украшения
                    </p>
                    <div class="stepform_part_checkbox_group">
                        <div class="stepform_part_checkbox_item">
                            <label class="s-checkbox">
                                <input type="checkbox" name="ukrasheniya" value="Витражи">
                                <span><i></i>Витражи</span>
                            </label>
                        </div>
                        <div class="stepform_part_checkbox_item">
                            <label class="s-checkbox">
                                <input type="checkbox" name="ukrasheniya" value="Патина на фасадах">
                                <span><i></i>Патина на фасадах</span>
                            </label>
                        </div>
                        <div class="stepform_part_checkbox_item">
                            <label class="s-checkbox">
                                <input type="checkbox" name="ukrasheniya" value="Декоративные ножки">
                                <span><i></i>Декоративные ножки</span>
                            </label>
                        </div>
                        <div class="stepform_part_checkbox_item">
                            <label class="s-checkbox">
                                <input type="checkbox" name="ukrasheniya" value="Карниз нижний">
                                <span><i></i>Карниз нижний</span>
                            </label>
                        </div>
                        <div class="stepform_part_checkbox_item">
                            <label class="s-checkbox">
                                <input type="checkbox" name="ukrasheniya" value="Пилястры">
                                <span><i></i>Пилястры</span>
                            </label>
                        </div>
                    </div>
                    <div class="stepform_part_checkbox_group">
                        <div class="stepform_part_checkbox_item">
                            <label class="s-checkbox">
                                <input type="checkbox" name="ukrasheniya" value="Ручки со стразами">
                                <span><i></i>Ручки со стразами</span>
                            </label>
                        </div>
                        <div class="stepform_part_checkbox_item">
                            <label class="s-checkbox">
                                <input type="checkbox" name="ukrasheniya" value="Зеркала">
                                <span><i></i>Зеркала</span>
                            </label>
                        </div>
                        <div class="stepform_part_checkbox_item">
                            <label class="s-checkbox">
                                <input type="checkbox" name="ukrasheniya" value="Карниз верхний">
                                <span><i></i>Карниз верхний</span>
                            </label>
                        </div>
                        <div class="stepform_part_checkbox_item">
                            <label class="s-checkbox">
                                <input type="checkbox" name="ukrasheniya" value="Колонны">
                                <span><i></i>Колонны</span>
                            </label>
                        </div>
                        <div class="stepform_part_checkbox_item">
                            <label class="s-checkbox">
                                <input type="checkbox" name="ukrasheniya" value="Балюстрада из массива">
                                <span><i></i>Балюстрада из массива</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="stepform_next">
                    <button type="button" class="btn btn-primary js-stepform-next">Следующий шаг</button>
                </div>
            </div>
            <div class="stepform_box block step_4" data-step="4">
                <div class="stepform_part stepform_part--colpad flex-stretch">
                    <div class="flex-space-between aic m_fdc">
                        <div class="text_box">
                            <p>
                                Загрузите дизайн-проект, фотографию, макет<br>или эскиз вашей кухни <strong>(не
                                    обязательно)</strong>
                            </p>
                        </div>
                        <?$APPLICATION->IncludeComponent("bitrix:main.file.input", "green_btn",
                            array(
                                "INPUT_NAME"=>"anket_file",
                                "MULTIPLE"=>"N",
                                "MODULE_ID"=>"job",
                                "MAX_FILE_SIZE"=> '5242880',
                                "ALLOW_UPLOAD"=>"F",
                                "ALLOW_UPLOAD_EXT"=>"doc,docx,jpeg,jpg,png,xls,xlsx",
                                "INPUT_CAPTION" => "Загрузить план помещения",
                                "MULTIPLE" => "N"
                            ),
                            false
                        );?>
                        <!--<a href="#" class="btn btn-primary">Загрузить план помещения</a>-->
                    </div>
                </div>
                <div class="stepform_part stepform_part--colpad">
                    <p class="stepform_title stepform_title--left">
                        Выберите требуемую технику (по необходимости)
                    </p>
                    <div class="stepform_techs">
                        <div class="stepform_techs_item">
                            <div class="stepform_techs_img">
                                <img src="/assets/img/photos/goods/techs/1.png" alt="">
                            </div>
                            <label class="s-checkbox">
                                <input type="checkbox" name="tech" value="Встраиваемый духовой шкаф">
                                <span><i></i>Встраиваемый духовой шкаф</span>
                            </label>
                        </div>
                        <div class="stepform_techs_item">
                            <div class="stepform_techs_img">
                                <img src="/assets/img/photos/goods/techs/2.png" alt="">
                            </div>
                            <label class="s-checkbox">
                                <input type="checkbox" name="tech" value="Варочная поверхность">
                                <span><i></i>Варочная поверхность</span>
                            </label>
                        </div>
                        <div class="stepform_techs_item">
                            <div class="stepform_techs_img">
                                <img src="/assets/img/photos/goods/techs/3.png" alt="">
                            </div>
                            <label class="s-checkbox">
                                <input type="checkbox" name="tech" value="Посудомоечная машина">
                                <span><i></i>Посудомоечная машина</span>
                            </label>
                        </div>
                        <div class="stepform_techs_item">
                            <div class="stepform_techs_img">
                                <img src="/assets/img/photos/goods/techs/4.png" alt="">
                            </div>
                            <label class="s-checkbox">
                                <input type="checkbox" name="tech" value="Вытяжка">
                                <span><i></i>Вытяжка</span>
                            </label>
                        </div>
                        <div class="stepform_techs_item">
                            <div class="stepform_techs_img">
                                <img src="/assets/img/photos/goods/techs/5.png" alt="">
                            </div>
                            <label class="s-checkbox">
                                <input type="checkbox" name="tech" value="Стиральная машина">
                                <span><i></i>Стиральная машина</span>
                            </label>
                        </div>
                        <div class="stepform_techs_item">
                            <div class="stepform_techs_img">
                                <img src="/assets/img/photos/goods/techs/6.png" alt="">
                            </div>
                            <label class="s-checkbox">
                                <input type="checkbox" name="tech" value="Встраиваемый холодильник">
                                <span><i></i>Встраиваемый холодильник</span>
                            </label>
                        </div>
                        <div class="stepform_techs_item">
                            <div class="stepform_techs_img">
                                <img src="/assets/img/photos/goods/techs/7.png" alt="">
                            </div>
                            <label class="s-checkbox">
                                <input type="checkbox" name="tech" value="Встраиваемый холодильник">
                                <span><i></i>Встраиваемая СВЧ-печь</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="stepform_next">
                    <button type="button" class="btn btn-primary js-stepform-next">Следующий шаг</button>
                </div>
            </div>
            <div class="stepform_box block step_5" data-step="5">
                <div class="stepform_part stepform_part--colpad flex-stretch">
                    <div class="text_box text_box--center">
                        <p>
                            Заполните форму ниже, наш специалист свяжется с вами в удобное время и сообщит стоимость
                            кухни по вашим замерам, а также проконсультирует по всем возникшим вопросам.
                        </p>
                    </div>
                    <div class="stepform_contact">
                        <div class="stepform_input">
                            <label>Как к вам обращаться</label>
                            <input type="text" name="name" class="form-control form-control--light" placeholder="Ваше имя">
                        </div>
                        <div class="stepform_input jcfe">
                            <label>Введите номер телефона для связи</label>
                            <input type="text" name="phone" class="form-control form-control--light"
                                   placeholder="+7 (___) ___-__-__">
                        </div>
                    </div>
                </div>
                <div class="stepform_next">
                    <button class="btn btn-primary calc_submit_form" type="button">
                        Узнать стоимость
                    </button>
                </div>
            </div>
            <div class="stepform_box block step_6" data-step="6">
                <div class="stepform_part stepform_part--transparent">
                    <div class="text_box text_box--center">
                        <p>
                            Спасибо за обращение!<br>После окончания расчёта мы свяжемся с Вами
                        </p>
                        <a href="/projects/">Посмотреть наши работы</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>