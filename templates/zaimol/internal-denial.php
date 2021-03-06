<section class="ex-single-article">
    <div class="container">
        <h1>В заеме отказано</h1>
        <div class="row">
            <article class="col-lg-9 col-md-8">
                <div class="ex-wrapper">
                    <img src="/templates/zaimol/assets/img/article2-large.jpg" alt="missed">
                </div>
                <p>Принято считать, что микрофинансовые организации никак не проверяют своих заемщиков, поэтому отказ
                    в выдаче онлайн займа вызывает у людей недоумение. Почему так происходит и всем ли на самом деле выдаются займы?
                    <br>
                    Высокая % ставка по микрозаймам действительно отчасти связана с высокими финансовыми рисками МФО
                    по невозврату. Но полагать, что организации простят и спишут ваш долг, не стоит – неплательщикам предстоят неприятные встречи с коллекторами, а затем и суд. Со своими деньгами никто не расстается – и МФО являются исключением.
                    <br>
                    На некоторые «грехи» клиентов МФО готовы смотреть сквозь пальцы. Не является препятствием для получения займа отсутствие официального трудоустройства или «серая» зарплата, наличие других непогашенных кредитов или займов. Но если человек является злостным неплательщиком, МФО нет смысла идти ему навстречу –
                    ведь вероятность, что он не вернет новый займ, максимально велика.</p>
                <h2>Просрочки по другим кредитам</h2>
                <p>При обращении в МФО проводится проверка с использованием скоринговой  системы. Проще говоря, система отправляет запрос и получает ответ из Бюро кредитных историй (БКИ). Если в кредитной истории потенциального заемщика присутствуют многочисленные просрочки, начисления пени и штрафов, заемщик, увы, может быть признан неблагонадежным.</p>
                <h2>Некорректное заполнение анкеты</h2>
                <p>Неправильно заполненная анкета на онлайн займ, особенно в части паспортных данных и номера телефона, также вызовет подозрение у службы безопасности МФО. Опечатки могут быть расценены как намеренное введение кредитора в заблуждение. Менеджеру МФО может потребоваться оперативная связь с клиентом, чтобы уточнить некоторые вопросы – если номер указан неправильно или не принадлежит заемщику, это повод для отказа.</p>
                <h2>Оценка платежеспособности</h2>
                <p>Система рассчитывает ее автоматически, поэтому ошибки возможны. В спорных случаях менеджер компании беседует с заемщиком лично и пересматривает решение. Возвращаемся к предыдущему пункту: в анкете должны быть указаны ваши достоверные данные.</p>
                <h2>Без объяснения причин</h2>
                <p>В стандартный перечень отказов входит возраст клиента (менее 18 лет) и отсутствие гражданства РФ. МФО не обязаны объяснять клиенту причину отказа в выдаче онлайн займа, поэтому узнать вы ее не сможете. Остается только сделать новую попытку.</p>
                <h2>Когда подавать новую заявку</h2>
                <p>Это зависит от правил МФО или сервисов по подбору мгновенных микрозаймов онлайн, через которые вы подавали предыдущую заявку.  Обратитесь в раздел «вопрос-ответ» (FAQ) или свяжитесь со службой поддержки, чтобы узнать, когда можно подать заявку повторно. Обычно это 1-3 дня, но некоторые сервисы предусматривают возможность повторного обращения уже через несколько часов. Если системой первоначально была допущена ошибка – скорее всего, решение будет положительным.</p>
            </article>
            <aside class="col-lg-3 col-md-4">
            <form id="anketa" action="/form" method="post">
                <input type="hidden" id="amount" name="amount" value="20000" />
                <input type="hidden" id="period" name="period" value="21" />
                <input type="hidden" id="form_slrd" name="form_slrd" value="15" />
                <input type="hidden" name="referer" value="<?php if (isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']; ?>">
                <?php if (!empty($_REQUEST['ad_id'])) echo '<input type="hidden" name="ad_id" value="'.$_REQUEST['ad_id'].'">'; ?>
                <div class="ex-display">
                    <div class="ex-slider-val"></div>
                </div>
                <input type="text" id="rangeSlider" name="rangeSlider" value="0" />
                <main class="ex-main-counter">
                    <div class="ex-draft">
                        <div class="ex-wrapper">
                            <h3>Zaimol</h3>
                            <i></i>
                            <table>
                                <tbody><tr>
                                    <td>Процентная ставка</td>
                                    <td class="ex-bet"></td>
                                </tr>
                                <tr>
                                    <td>Сумма</td>
                                    <td class="ex-current-val"><span></span></td>
                                </tr>
                                <tr>
                                    <td>Срок займа</td>
                                    <td class="ex-time"><span></span></td>
                                </tr>
                                <tr>
                                    <td>Комисссия</td>
                                    <td class="ex-Commission"><span></span></td>
                                </tr>
                                </tbody></table>
                            <table>
                                <tbody><tr>
                                    <td>К возврату</td>
                                    <td class="ex-total"><span></span></td>
                                </tr>
                                </tbody></table>
                            <p class="text-center">Спасибо</p>
                        </div>
                    </div>
                </main>
                <button  type="submit" class="ex-main-btn">Получить деньги</button>
            </form>
            </aside>
        </div>
    </div>
</section>