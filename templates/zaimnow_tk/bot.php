<img src="/templates/zaimnow_tk/icon.png" alt="icon.png" id="help_button" class="response">
<div class="chat" id="chat">
  <div class="chat-title">
    <h1>Робокоп Елена</h1>
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
let is_start_bot = true;
// 0 - standart, 1 - loans, 2 - question
let behavior = 0;

let name = ''
let email = '';
let phone = '';
let sum = 0;
let is_form_start = true;
let is_q_start = true;
</script>