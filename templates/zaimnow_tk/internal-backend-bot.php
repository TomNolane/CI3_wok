<?php  
require_once 'vendor/autoload.php';

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Cache\CodeIgniterCache;

$config = [
    'facebook' => [
      'token' => 'EAAZAT6dcgYDQBAC6x7Xtn5L3PojYgoZB7JdgFon85SLSPF0BRфывыфвыфв45cOxx3rZAMZBc9Mb9UhB62gBSG2kXTo7ldyk2fTquadMJQVY8nqKxiOakLXLUZBCSavncCljoe5IAZDZD',
      'app_secret' => 'b52517eeфывыфв76dca657',
      'verification'=>'my_exaфывыфв_token',
      // test server
    //   'token' => 'EAADlMuXubzYBAфывфывaaWNUPrPN0nA3aJl3m9R52vZBmOZCnjGrT5EtLATHN79JzKWndGitwiUJh7pcQL3C5Iw6bPL9d0HNnoUj0dLRPfoqwZDZD',
    //   'app_secret' => '9f65a0фыв996c9e',
    //   'verification'=>'my_exфывыфвken',
    ],
    "vkontakte" => [
       "token" => "9af81c610faf0ea319ыфвыфвb046594139078",
       "verify" => 'eeфывфывddd5'
    ],
    'telegram' => [
        'token' => '60176991фывыфв7wgqCn8tc'
    ]
];

DriverManager::loadDriver(\BotMan\Drivers\Vkontakte\VkontakteDriver::class);
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);
DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class); 

$this->load->driver('cache');

$botman = BotManFactory::create($config, new CodeIgniterCache($this->cache->file));

$botman->hears('.*([0-9а-яА-Я?])+.*', function (BotMan $bot) { 
    $text = (array)  ( $bot->getMessage()->getPayload() );
    if(!empty($text['message']))
    {
        // if, it's facebook
        $d =  $text['message']['text'];
        $source = 'facebook';
    }
    else 
    {
        $d =  current($text)['text']; // if, it's vk 
        $source = 'vk';
    }
    
    require 'internal-backend-bot-api.php';

    $message_Response = $temp2;

    $bot->reply($message_Response); 
});

$botman->fallback(function($bot) {
    $bot->reply('Чё ??? ...');
});

$botman->listen();