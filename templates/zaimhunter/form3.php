<div class="ex-anketa-head">
    <img src="/templates/zaimhunter/assets/img/active3.png" alt="active3.png">
    <h2 class="">
        Данные о работе
    </h2>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="ex-anketa-main">
            <div class="form-group has-feedback ex-arrow-on">
                <select class="form-control ec" id="work" name="work" required>
                    <option value="ШТАТНЫЙ СОТРУДНИК">Штатный сотрудник</option>
                    <option value="ИНДИВИДУАЛЬНЫЙ ПРЕДПРИНИМАТЕЛЬ">Индивидуальный предприниматель</option>
                    <option value="СТУДЕНТ">Студент</option>
                    <option value="ПЕНСИОНЕР">Пенсионер</option>
                    <option value="БЕЗРАБОТНЫЙ">Безработный</option>
                </select>
            </div>
            <div class="has-feedback form-group ">
                <input type="text" class="form-control ec tip" name="work_name" id="work_name" placeholder="Место работы" title="Укажите, ваше место работы"
                    data-sanitize="capitalize" data-validation="custom" data-validation-regexp='^[А-Яа-яЁё\d\s\-\,\№\#\.\+\(\)"]+$'
                    data-validation-error-msg="Укажите, ваше место работы" required>
                <span id="work_namestatus" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="has-feedback form-group ">
                <input type="text" class="form-control ec tip" name="work_occupation" id="work_occupation" placeholder="Должность" title="Укажите, вашу должность"
                    data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^[А-Яа-яЁё\d\s\-\,\#\.\+\(\)]+$"
                    data-validation-error-msg="Укажите, вашу должность" required>
                <span id="work_occupationstatus" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="tel" class="form-control ec tip" name="work_phone" placeholder="Рабочий телефон" title="Введите ваш рабочий телефон"
                    id="work_phone" data-validation="custom" data-validation-regexp="^[8]\s\([0-9]{3}\)\s[0-9]{3}\s[0-9]{4}$"
                    data-validation-error-msg="Введите ваш рабочий телефон" data-validation-optional="true">
                <span id="work_phonestatus" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="tel" class="form-control ec tip" min="0" max="360" placeholder="Стаж работы в месяцах" name="work_experience"
                    id="work_experience" title="Введите ваш стаж работы в месяцах" data-validation="number" data-validation-error-msg="Введите ваш стаж работы в месяцах"
                    required>
                <span id="work_experiencestatus" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="tel" class="form-control ec tip" name="work_salary" id="work_salary" maxlength="6" placeholder="Зарплата в рублях"
                    title="Введите вашу среднюю зарплату" data-validation="number" data-validation-error-msg="Введите среднюю зарплату"
                    required>
                <span id="work_salarystatus" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback ex-arrow-on">
                <select class="form-control ec tip" name="work_region" id="work_region" autocomplete="off" required>
                    <option value="0">!!! Выберите регион места работы !!!</option>
                    <?php
                                if (isset($regions) && is_array($regions))
                                {
                                    foreach($regions as $region)
                                    echo '<option value="'.$region['name'].'" data-id="'.$region['region_id'].'"'.((isset($region_name) && $region_name == $region['name'])? ' selected' : '').'>'.$region['name'].'</option>';
                                }
                            ?>
                </select>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control ec tip" name="work_city" placeholder="Город" title="Укажите населенный пункт"
                    id="work_city" value="<?php echo isset($city_name)? $city_name : ''; ?>" data-sanitize="capitalize" data-validation="custom"
                    data-validation-regexp="^[А-Яа-яЁё\-\.\(\)\s]+$" data-validation-error-msg="Укажите, населенный пункт"
                    required>
                <span id="work_citystatus" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control ec tip" name="work_street" placeholder="Улица" title="Укажите улицу" id="work_street"
                    data-sanitize="capitalize" data-validation="custom" data-validation-regexp="^[А-Яа-яЁё\d\s\-\,\#\.\+\(\)]+$"
                    data-validation-error-msg="Укажите, улицу" required>
                <span id="work_streetstatus" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control ec tip" name="work_house" placeholder="Номер дома" title="Укажите номер дома"
                    id="work_house" data-validation="custom" data-validation-regexp="^[А-Яа-яЁё0-9\-\.\(\)\s]+$" data-validation-error-msg="Укажите, номер дома"
                    required>
                <span id="work_housestatus" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control ec tip" name="work_office" placeholder="Номер офиса" title="Укажите номер офиса"
                    id="work_office" data-validation="custom" data-validation-regexp="^[А-Яа-яЁё0-9\-\.\(\)\s]+$" data-validation-error-msg="Укажите, номер офиса"
                    data-validation-optional="true">
                <span id="work_officestatus" class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group text-right">
                <a class="btn ex-main-btn" id="getmoney">Получить заем</a>
            </div>
        </div>

    </div>
    <div class="col-sm-6 hidden-xs hidden-sm">
        <div class="ex-form-image">
            <img src="/templates/zaimhunter/assets/img/creditcard-pic.png" alt="creditcard-pic.png">
        </div>
        <p class="text-right">Заполнение этого блока данных
            <br> значительно повышает степень одобрения займа.</p>
    </div>
</div>