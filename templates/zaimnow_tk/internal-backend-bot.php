<?php  
require_once 'vendor/autoload.php';

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Cache\CodeIgniterCache;

$config = [
    'facebook' => [
      'token' => 'EAAZAT6dcgYDQBAC6x7Xtn234324234sOAliTEztGPR45cOxx3rZAMZBc9Mb9UhB62gBSG2kXTo7ldyk2fTquadMJQVY8nqKxiOakLXLUZBCSavncCljoe5IAZDZD',
      'app_secret' => 'b52517ee8234234d71b6afa76dca657',
      'verification'=>'my_e42342345_token',
    ],
    "vkontakte" => [
       "token" => "9af81c610faf0ea3345435e7a1736d17b0b2b53b164ff3b18cc1b9d4e422fd15db046594139078",
       "verify" => 'ee444d5'
    ],
    'telegram' => [
        'token' => '60153454353R72siiyfbebv7wgqCn8tc'
    ]
];

DriverManager::loadDriver(\BotMan\Drivers\Vkontakte\VkontakteDriver::class);
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);
DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class); 

$this->load->driver('cache');

$botman = BotManFactory::create($config, new CodeIgniterCache($this->cache->file));

$botman->hears('.*([0-9а-яА-Я])+.*', function (BotMan $bot) { 
    $rr = (array)  ( $bot->getMessage()->getPayload() );
    $rrr = current($rr)['text'];


    if($rrr == 'привет')
        $bot->reply('Прпрпрпр.');
    else 
        $bot->reply('ну да..');
});

$botman->fallback(function($bot) {
    $bot->reply('Чё ??? ...');
});

$botman->listen();