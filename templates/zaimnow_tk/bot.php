<img src="/templates/zaimnow_tk/icon.png" alt="icon.png" id="help_button" class="response">
<div class="chat" id="chat">
  <div class="chat-title">
    <h1>Елена</h1>
    <h2>онлайн-консультант</h2>
    <figure class="avatar">
      <img src="/templates/zaimnow_tk/assets/img/bot.jpg" /></figure>
      <span class="close-btn" id="close">Закрыть</span>
  </div>
  <div class="messages">
    <div class="messages-content"></div>
  </div>
  <div class="message-box">
    <textarea type="text" class="message-input" placeholder="Введите текст..."></textarea>
    <button type="submit" class="message-submit">Отправить</button>
  </div>

</div>
<div class="bg"></div>
<script>
var is_start_bot = true;
// 0 - standart, 1 - loans, 2 - question
var behavior = 0;

var name = ''
var email = '';
var phone = '';
var sum = 0;
var is_form_start = true;
var is_q_start = true;

var question = '';
</script>