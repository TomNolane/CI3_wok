<section class="ex-single-article">
   <div class="container">
       <h1>Микрозаймы vs кредиты: <br>
           преимущества и недостатки</h1>
       <div class="row">
           <article class="col-lg-9 col-md-8">
               <div class="ex-wrapper">
                   <img src="/templates/zaimol/assets/img/article1-large.jpg" alt="missed">
               </div>
               <p class="ex-mb"> По статистике, около 75% россиян хотя бы однократно прибегали к услугам банком и МФО, чтобы взять кредит
                   или микрозайм. Что же выбрать, если вам срочно потребовались деньги? Ответ на этот вопрос неоднозначен:
                   он зависит от ваших целей и возможностей.</p>
               <p>Общие особенности для этих кредитных продуктов:</p>
               <ul>
                   <li>Деньги выдаются на конкретный срок;</li>
                   <li>И банк, и МФО берут % за использование денежных средств;</li>
                   <li>При выдаче кредита или займа оформляется договор;</li>
                   <li>При невозврате средств кредитор вправе требовать их в законном порядке.</li>
               </ul>
               <p class="ex-mb">Разница между займом и кредитом, на первый взгляд, заключается в % ставке: у банков она ниже, у МФО выше. Однако есть и другие существенные отличия. Прежде всего в том, что банку выгодно выдать крупную сумму
                   на длительный период, а МФО – небольшую сумму на короткий срок. То есть кредит на сумму 10-30 000 рублей банку просто невыгоден.</p>
               <h2>Кто может получить деньги</h2>
               <p>У банков существуют жесткие ограничения. Заемщику должно быть не менее 21 года, а стабильность его дохода должна подтверждаться соответствующими документами. Таким образом, из категории банковских заемщиков «выпадают» студенты, пенсионеры, а главное – люди, получающие «серую зарплату». Которых до сих пор в стране большинство.
                   МФО, напротив, хорошо понимают эту проблему, поэтому займ может взять любой совершеннолетний человек,
                   а также человек с неподтвержденными доходами. Единственное ограничение – злостным неплательщикам, имеющим плохую кредитную историю, тоже будет отказано. Однако непогашенный кредит или проблемы
                   с погашением не станут препятствием для получения займа – а вот в банке при таком раскладе вам откажут
                   с вероятностью 100%.</p>
               <h2>Необходимые документы</h2>
               <p>Банку потребуется не только паспорт, но и СНИЛС, справка 2 НДФЛ, а еще он может потребовать залог или поручительство. Найти поручителей непросто даже среди родных и друзей: люди напуганы многочисленными судебными разбирательствами и вовсе не собираются брать ответственность за чужие кредиты. При оформлении займа онлайн требуется только паспорт.</p>
               <h2>Срочность</h2>
               <p>Кредит срочно не получить: банки работают по определенному графику, поэтому вам придется потратить несколько часов на поездки – а если банк откажет, добавьте к этому поездки в другие банки. В этом отношении у МФО неоспоримое преимущество: все заявки на микрокредиты подаются онлайн и рассматриваются в течение нескольких минут. Если вы оформляете микрозайм на карту или кошелек, деньги приходят в течение получаса.</p>
               <h2>Подытожим сравнение</h2>
               <p>Если вам требуется крупная сумма денег (более 50 000 рублей) на длительный срок, и вы отвечаете всем требованиям банков, выгоднее взять кредит на срок от 1 года. Во всех остальных случаях, когда требуется небольшая сумма «до зарплаты», оптимально обратить внимание на микрозаймы. Ставка для новичков здесь варьируется обычно в пределах 1,5-2% в день, но для постоянных клиентов она понижается, к тому же увеличивается кредитный лимит.</p>
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