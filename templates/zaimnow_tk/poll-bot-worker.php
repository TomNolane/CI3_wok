<?php
set_time_limit(0);
require_once 'PollBot.php';
define('BOT_TOKEN', '601769918:AAGFZfVCz43IblR72siiyfbebv7wgqCn8tc');
$bot = new PollBot(BOT_TOKEN, 'PollBotChat');
$bot->runLongpoll();