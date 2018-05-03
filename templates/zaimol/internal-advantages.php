<section class="ex-single-article">
    <div class="container">
        <h1>Преимущества сервиса <br>
            по подбору микрозаймов</h1>
        <div class="row">
            <article class="col-lg-9 col-md-8">
                <div class="ex-wrapper">
                    <img src="/templates/zaimol/assets/img/article4-large.jpg" alt="missed">
                </div>
                <p>
                    Основной ценный ресурс человека – его время. Замечательно, когда есть возможность без спешки заняться самостоятельным поиском нужных услуг, однако большинство людей неограниченным запасом времени не обладают. На помощь приходят сервисы, которые способны подобрать множество нужных вариантов за короткий срок. Такая же схема действует и в отношении онлайн микрозаймов.
                </p>
                <h2>Безопасность</h2>
                <p>Сервис по подбору микрозаймов имеет партнерские отношения с большим количеством МФО, включенных
                    в государственный реестр. Для клиента это означает высокую степень безопасности: он обратится только
                    в официально зарегистрированную компанию. Проверить надежность МФО можно и самостоятельно – но в этом случае нужно последовательно сверять со списком каждую из организаций, которая вас заинтересовала.</p>
                <h2>Широкий выбор</h2>
                <p>«Изюминка» сервиса в том, что клиент заполняет анкету однократно, а система автоматически рассылает ее во все партнерские компании.  Таким образом, вы получаете не один положительный отклик на свое обращение, а 10 и больше. Представьте, что все это придется сделать самому:</p>
                <ul style="margin-bottom: 10px;">
                    <li>найти 10 благонадежных МФО;</li>
                    <li>проверить их в реестре;</li>
                    <li>заполнить 10 разных анкет;</li>
                    <li>подождать отклик, и увидеть, к примеру, 7 отказов.</li>
                </ul>
                <p>Остается 3 доступных предложения, на поиск которых потрачено 2-3 часа. И не факт, что условия онлайн займа вам подойдут. А если нужно просмотреть 20-30 сайтов?</p>
                <h2>Простота</h2>
                <p>Пользоваться сервисом очень просто: на кредитном  калькуляторе нужно выбрать требуемую сумму займа
                    и желаемый срок, после чего однократно заполнить анкету. Вам будет предложен список МФО, которые готовы выдать вам микрозайм онлайн на карту или наличными. Выбирайте лучшее предложение!</p>
                <h2>Скорость обработки</h2>
                <p>Время одобрения заявки и выдачи вариантов занимает 5-7 минут. Это несравнимо с самостоятельным поиском, даже если вы – компьютерный гений.</p>
                <h2>Снижение вероятности отказа</h2>
                <p>Не секрет, что микрозаймы – единственно доступная возможность получить финансовую помощь для людей
                    с плохой кредитной историей, студентов и официально нетрудоустроенных лиц. Но далеко не каждая МФО готова на такие риски. Подавая заявку через сервис, вы существенно снижаете вероятность отказа – ведь заявку одновременно рассмотрят десятки компаний.</p>
                <h2>Возможность сэкономить</h2>
                <p>Когда перед вами несколько предложений, из них несложно выбрать займ с самыми выгодными условиями, просто сравнив % ставки. Если вы оформляете займ самостоятельно, то можете пропустить более выгодные варианты. Зачем переплачивать, когда можно сэкономить?</p>
                <h2>А еще</h2>
                <p>Услуги сервиса по подбору займа бесплатны для клиента. Если вы оформите подписку на рассылку от МФО,
                    то сервис 2-3 раза в неделю будет информировать вас о самых интересных акциях и предложениях.</p>
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
                <button type="submit" class="ex-main-btn">Получить деньги</button>
                </form>
            </aside>
        </div>
    </div>
</section>