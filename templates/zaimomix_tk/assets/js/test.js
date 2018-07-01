$(document).ready(function () {

                const url = 'https://zaimnow.tk/bot-api';
                var behavior = 0;

                $('#help_button').click(function () {
                    if (!$('#chat').is(':visible')) $('#chat').show();
                    else $('#chat').hide();

                    $('#help_button').hide();
                }) 

                $(document).mouseup(function (e) {
                    var container = $('#chat');
                    if (container.has(e.target).length === 0){
                        container.hide();
                        $('#help_button').show();
                    }
                });

                $('.close-btn').click(function () {
                    $('#chat').hide();
                    $('#help_button').show();
                });

                $('#chat').hide();
                var $messages = $('.messages-content'),
                    d, h, m,
                    i = 0;

                $(window).load(function () {
                    $messages.mCustomScrollbar();
                    setTimeout(function () {
                        fakeMessage();
                    }, 100);
                });

                function updateScrollbar() {
                    $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
                        scrollInertia: 10,
                        timeout: 0
                    });
                }

                function setDate() {
                    d = new Date()
                    if (m != d.getMinutes()) {
                        m = d.getMinutes();
                        $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($(
                            '.message:last'));
                    }
                }

                function insertMessage() {
                    msg = $('.message-input').val();
                    if ($.trim(msg) == '') {
                        return false;
                    }
                    $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container'))
                        .addClass('new');
                    setDate();
                    $('.message-input').val(null);
                    updateScrollbar();
                    setTimeout(function () {
                        fakeMessage(msg.toLowerCase());
                    }, 1000 + (Math.random() * 20) * 100);
                }

                $('.message-submit').click(function () {
                    insertMessage();
                });

                $(window).on('keydown', function (e) {
                    if (e.which == 13) {
                        insertMessage();
                        return false;
                    }
                }) 

                function fakeMessage(msg = '') {
                    

                    if ($('.message-input').val() != '') {
                        return false;
                    }
                    $('<div class="message loading new"><figure class="avatar"><img src="/templates/zaimnow_tk/assets/img/bot.jpg" /></figure><span></span></div>'
                    ).appendTo($('.mCSB_container'));
                    updateScrollbar();

                    setTimeout(function () {
                        $('.message.loading').remove();


                        var _t = (is_start_bot == true) ? 'Здравствуйте. ' : '';
                        var t =  _t +'Я вас не поняла. Для получения справки введите знак "?"';

                        if(msg == '')
                            t =  _t + 'Для получения справки введите знак "?"';


                        // if(msg == '1')
                        //     behavior = 1;
                        // else if(msg == '2')
                        //     behavior = 0;
                        // else if(msg == '3')
                        //     behavior = 2;

                        
                       

                        if(msg.charAt(0) == '?')
                        {
                            t =  _t + 'Здравствуйте! Я могу:<br>1) Оформить займ<br>2) Ответить на вопрос<br>3) Отправить вопрос администрации<br>Какой № Вы выбираете?';  
                        }
                        else if(behavior == 0)
                        { 
                            // var payload = {};
                            // payload.question = msg; 
                            var data = { 
                                "question": msg.toLowerCase().replace("  "," ")
                            }; 
                            fetch(url,
                            {
                                method: "POST",
                                body: "question=" + msg.toLowerCase().replace("  "," "),
                                mode: 'no-cors',
                                headers: {
                                "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
                                }
                            })
                            .then(function(res)
                            { 
                                if(res.ok)
                                    return res.json(); 
                            })
                            .then(function(data){ 

                                if(data === undefined)
                                    return;
                                    
                                t = JSON.parse(   data  ); 
                                alert( t.answers );  

                                $('<div class="message new"><figure class="avatar"><img src="/templates/zaimnow_tk/assets/img/bot.jpg" /></figure>' +
                                t.answers + '</div>').appendTo($('.mCSB_container')).addClass('new');
                                setDate();
                                updateScrollbar(); 
                                i++;

                            })
 

                            // if(msg.indexOf('нужен кредит') !== -1 || msg.indexOf('нужен займ') !== -1 || msg.indexOf('займешь') !== -1 || msg.indexOf('займёшь') !== -1  || msg.indexOf('получить займ') !== -1 || msg.indexOf('оформить') !== -1)
                            // {  
                            //      t = _t + 'Хорошо, для этого напишите ваше имя:';
                            //      behavior = 1;
                            // }
                            // else if(msg.indexOf('зовут') !== -1 || msg.indexOf('твое имя') !== -1 || msg.indexOf('твоё имя') !== -1 || msg.indexOf('ваше имя') !== -1)
                            //     t = _t  + 'Елена, ваш персональный менеджер';
                            // else if(msg.indexOf('фамилия') !== -1)
                            //     t = _t  + 'У меня нету фамиллии, только имя: Елена';
                            // else if(msg.indexOf('процентная ставка') !== -1 || msg.indexOf('ставка') !== -1 || msg.indexOf('%') !== -1 || msg.indexOf('процент') !== -1)
                            //     t = _t  + 'Максимальная процентная ставка по займу составляет 0,98% в день, а минимальная 0,08%.';
                            // else if(msg.indexOf('связаться') !== -1 || msg.indexOf('почта') !== -1 || msg.indexOf('вам написать') !== -1 || msg.indexOf('позвонить') !== -1|| msg.indexOf('приехать') !== -1)
                            //     t = _t  + 'Наши контакты: mail@zaimnow.tk';
                            // else if(msg.indexOf('что нужно') !== -1 || msg.indexOf('требования') !== -1 || msg.indexOf('паспорт') !== -1 || msg.indexOf('оформить') !== -1)
                            //     t = _t  + 'Чтобы оформить заявку на микрозайм, нужно заполнить простую анкету. Для этого выберите сумму займа и перейдите по кнопке "получить деньги"';
                            // else if(msg.indexOf('дура') !== -1)
                            //     t = _t  + 'Я не дура &#x1f625;';
                            // else if(msg.indexOf('дура') !== -1)
                            //     t = _t  + 'Я не дура &#x1f625;';
                        }
                        else if(behavior == 1)
                        {
                            if(is_form_start)
                            {
                                is_form_start = false;
                                t = _t + 'Хорошо, напишите ваше имя:';
                            }
                            else if(name.length < 2 || !re_name.test(name))
                            {
                                if (msg.length < 2 || !re_name.test(msg)) t = "Имя указано неверно. Введите ещё раз русскими буквами (например: 'Олег' или 'Лариса')";
                                else { name = msg; t = "Теперь введите номер мобильного телефона (например: '8(977)123 45 67')"}
                            }
                            else if (phone.replace(" ","").replace("(","").replace(")","").length != 11)
                            {
                                if (msg.replace(" ","").replace("+","").replace("(","").replace(")","").length != 11)
                                    t = "Номер телефона указано неверно. Введите ещё раз (пример: '8 (977) 123 45 67')";
                                else
                                {
                                    phone = msg.replace(" ","").replace("(","").replace(")","");
                                    t = "Отлично, теперь введите ваш электронный адрес (пример: 'mymail@yandex.ru')";
                                }
                            }
                            else if (email.length < 7 || !re_email.test(email)) {
                                if (msg.length < 7 || !re_email.test(msg)) {
                                    t = "Ваш электронный адрес указано неверно. Введите ваш электронный адрес (пример: 'mymail@yandex.ru')";
                                }
                                else
                                {
                                    email = msg;
                                    t = "Отлично! Осталось последнее: напишите сумму займа кратную 1 000 (от 1 000 до 100 000 рублей)";
                                }
                            }
                            else if (sum < 1000 || sum > 100000) {
                                if ((parseInt(msg.replace(" ",""),10) < 1000 || parseInt(msg.replace(" ",""),10) > 100000) && parseInt(msg.replace(" ",""),10) % 1000 != 0) {
                                    t = "Неверно указали сумму займа. Укажите в диапазоне от 1 000 до 100 000 (Например 25 000)";
                                }
                                else
                                {
                                    t = "Отлично! Секундочку...";
                                    sum = parseInt(msg.replace(" ",""),10);
                                    $('input[name="amount"]').val(sum);
                                    $('input[name="email"]').val(email);
                                    $('input[name="name"]').val(name);
                                    $('input[name="phone"]').val(phone);
                                    $('#anketa').submit();
                                }
                            } 
                        }
                        else if(behavior == 2)
                        {
                            if(is_q_start)
                            {
                                is_q_start = false;
                                t = _t + 'Введите Ваш вопрос ниже:';
                            }
                            else if(msg.length < 3)
                            {
                                t = _t + 'Введите Ваш вопрос ниже:';
                            }
                        } 

                        // is_start_bot = false;
                        // if(msg.indexOf('здравствуй') !== -1 || msg.indexOf('приве') !== -1)
                        //     t = 'Здравствуйте!';
                        // else if(msg.indexOf('пока') !== -1 || msg.indexOf('до свиданя') !== -1)
                        // { t = 'Счастливо!'; is_start_bot = true; }
 
                        //speak(t);
                        // $('<div class="message new"><figure class="avatar"><img src="/templates/zaimnow_tk/assets/img/bot.jpg" /></figure>' +
                        // t + '</div>').appendTo($('.mCSB_container')).addClass('new');
                        // setDate();
                        // updateScrollbar(); 
                        // i++;
                    }, 1000 + (Math.random() * 20) * 100);

                }

                function output(input) {
                    try {
                        var product = input + "=" + eval(input);
                    } catch (e) {
                        var text = (input.toLowerCase()).replace(/[^\w\s\d]/gi, ""); //remove all chars except words, space and 
                        text = text.replace(/ a /g, " ").replace(/i feel /g, "").replace(/whats/g, "what is").replace(
                            /please /g, "").replace(/ please/g, "");
                        if (compare(trigger, reply, text)) {
                            var product = compare(trigger, reply, text);
                        } else {
                            var product = alternative[Math.floor(Math.random() * alternative.length)];
                        }
                    }
                    //document.getElementById("chatbot").innerHTML = product;
                    speak(product);
                    //document.getElementById("input").value = ""; //clear input value
                } 

                function compare(arr, array, string) {
                    var item;
                    for (var x = 0; x < arr.length; x++) {
                        for (var y = 0; y < array.length; y++) {
                            if (arr[x][y] == string) {
                                items = array[x];
                                item = items[Math.floor(Math.random() * items.length)];
                            }
                        }
                    }
                    return item;
                }

                function speak(string) {
                    var utterance = new SpeechSynthesisUtterance();
                    utterance.voice = speechSynthesis.getVoices().filter(function (voice) {
                        return voice.name == "Agnes";
                    })[0];
                    utterance.text = string;
                    utterance.lang = "ru-RU";
                    utterance.volume = 1; //0-1 interval
                    utterance.rate = 1;
                    utterance.pitch = 2; //0-2 interval
                    speechSynthesis.speak(utterance);
                }


                ////////////////////////////////////////////////////////////////

                var slider3 = $('#rangeSlider').data('ionRangeSlider');
                var slider_plus = true;
                var n = 10;
                var slider_init = setInterval(function () {
                    if (slider_plus) {
                        n++;
                    } else {
                        n--;
                    }
                    if (n == 21 && n != <?php echo $from;?>) {
                        slider_plus = false;
                    } else if (n == <?php echo $from;?> && slider_plus == false) {
                        clearInterval(slider_init);
                    } else if (n == 21 && n == <?php echo $from;?>) {
                        clearInterval(slider_init);
                    }

                    slider3.update({
                        from: n
                    });

                    if (n <= 9) {
                        $('#period').val('7');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    } else if (n <= 14 && n > 9) {
                        $('#period').val('14');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    } else if (n <= 15 && n > 14) {
                        $('#period').val('21');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    } else if (n <= 17 && n > 15) {
                        $('#period').val('21');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    } else if (n <= 19 && n > 17) {
                        $('#period').val('30');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    } else if (n > 19) {
                        $('#period').val('30');
                        $('#form_slrd').val(n);
                        $('#amount').val(slider3.result.from_value);
                    }
                }, 50);
            });
            $('.owl-carousel').owlCarousel({
                stagePadding: 40,
                center: true,
                loop: true,
                margin: 120,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    1000: {
                        items: 2
                    }
                }
            });