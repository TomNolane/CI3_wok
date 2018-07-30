<?php  
require_once 'vendor/autoload.php';

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Cache\CodeIgniterCache; 

$config = [
    'facebook' => [
      'token' => 'EAAZAT6dcgYDQBAC6ыфвыфвыфвфывdMJQVY8nqKxiOakLXLUZBCSavncCljoe5IAZDZD',
      'app_secret' => 'b52517фывыфвывыфвdca657',
      'verification'=>'my_exфывыфвыфвoken',
      // test server
      //'token' => 'EAADlMuXubzYBANWT3Bv1Ha8фвыфвыфвыфвnjGrT5EtLATHN79JzKWndGitwiUJh7pcQL3C5Iw6bPL9d0HNnoUj0dLRPfoqwZDZD',
      //'app_secret' => '9f65a02bdфывыфвыфвыфв222b55996c9e',
      //'verification'=>'myфвфывыфвыфвtoken',
    ],
    "vkontakte" => [
       "token" => "9af81c610faf0ea31978фвыфвфывf3b18cc1b9d4e422fd15db046594139078",
       "verify" => 'фывыфвыфв'
    ],
    'telegram' => [
        'token' => '6017ыфвыфвыфвыфвфы3IblR72siiyfbebv7wgqCn8tc'
    ]
];

DriverManager::loadDriver(\BotMan\Drivers\Vkontakte\VkontakteDriver::class);
DriverManager::loadDriver(\BotMan\Drivers\Facebook\FacebookDriver::class);
DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);

$this->load->driver('cache');

$botman = BotManFactory::create($config, new CodeIgniterCache($this->cache->file));

// текст
$botman->hears('([А-я0-9\s\!\?,.-]{2,})', '\MyBotCommands@main');

// step
$botman->hears('(^[0-9]{1,1}|^[#№][0-9]{1,1})', '\MyBotCommands@step');

// DELETE
$botman->hears('del', '\MyBotCommands@delete');

// EMAIL
$botman->hears('([a-zA-z0-9.-]+\@[a-zA-z0-9.-]+.[a-zA-Z]+)', '\MyBotCommands@email');

// PHONE
// '([\+?0-9(?)?-])+' 
$botman->hears('([\+?\d-\)\(]{6,18})', '\MyBotCommands@phone');

$botman->fallback(function($bot) 
{
    $bot->reply('На данный момент мы не готовы овтетить на этот вопрос, но не переживайте, он уже отправлен нашему администратору, который наверняка сможет дать ответ. Для продолжения в2ыберите:<br>1) Оформить займ<br>2) Ответить на вопрос<br>Какой № Вы выбираете?');
    $bot->userStorage()->save([
        'step' => null,
        'name' => 0,
        'phone' => 0,
        'email' => 0,
        'agree' => 0
    ]); 
}); 
$botman->listen();

class MyBotCommands
{ 
    function __construct() 
    { 
        $CI =& get_instance();
        $CI->load->database();
        $this->db = $CI->db;
    }

    public function delete($bot) {
        $bot->userStorage()->save([
            'step' => null,
            'name' => 0,
            'phone' => 0,
            'email' => 0,
            'agree' => 0
        ]); 
        $bot->reply("Данные очищены"); 
    }

    public function step($bot, $numb) 
    {
        $_text = (array)  ( $bot->getMessage()->getPayload() );
        // if, it's facebook
        if(!empty($_text['message'])) $source = 'facebook'; //$d =  $text['message']['text'];
        else $source = 'vk'; //$d =  current($_text)['text']; // if, it's vk 

        $user = $bot->getUser();
        $rr_id = $user->getId();
        $rrFirstName = $user->getFirstName();

        if(!empty($numb)) 
        { 
            switch($numb)
            {
                case 1: 
                { 
                    $bot->reply('Напишите ваше полное имя:');
                    $d = 'Напишите ваше полное имя:';
                    $bot->userStorage()->save([
                        'step' => 1,
                        'name' => 0,
                        'phone' => 0,
                        'email' => 0,
                        'agree' => 0
                    ]); 
                    break;
                } 
                case 2: 
                { 
                    $bot->userStorage()->save([
                        'step' => 2
                    ]);
                    $bot->reply('Задайте вопрос');
                    $d = 'Задайте вопрос';
                    break;
                } 
                case 3: 
                {
                    $name = $bot->userStorage()->get('name');
                    $bot->userStorage()->save([
                        'step' => null
                    ]);
                    $bot->reply(' Ваше имя '.$rrFirstName); 
                    $d = ' Ваше имя '.$rrFirstName;
                    break;
                }
                default: 
                {
                    $bot->userStorage()->save([
                        'step' => null
                    ]);
                    break;
                } 
            }
        }
        else
        {
            $bot->userStorage()->save([
                'step' => 1
            ]);
            $bot->reply('Здравствуйте! Я могу:<br>1) Оформить займ<br>2) Ответить на вопрос<br>Какой № Вы выбираете?');
            $d = 'Здравствуйте! Я могу:<br>1) Оформить займ<br>2) Ответить на вопрос<br>Какой № Вы выбираете?';
        }
        $data = [
            'answer' => $d,
            'fingerprint' => $rr_id,
            'question' => $numb,
            'source' =>  $source,
            'procent' => 777
        ]; 
        $this->post_request('https://zaimnow.tk/send-bot2',$data);
    }

    public function main($bot, $text) {
        $procent = 777;
        $step = $bot->userStorage()->get('step'); 
        $user = $bot->getUser();
        $rr_id = $user->getId();
        $rrFirstName = $user->getFirstName();

        //$text = strtolower($text);

        $_text = (array)  ( $bot->getMessage()->getPayload() );

        // if, it's facebook
        if(!empty($_text['message'])) $source = 'facebook'; //$d =  $text['message']['text'];
        else $source = 'vk'; //$d =  current($_text)['text']; // if, it's vk 

        if(!empty($step))
        {
            switch($step)
            {
                case 1:
                {
                    $name = $bot->userStorage()->get('name');
                    $phone = $bot->userStorage()->get('phone');
                    $email = $bot->userStorage()->get('email');
                    $agree = $bot->userStorage()->get('agree');

                    if($name == '0')
                    {
                        $bot->userStorage()->save([
                            'name' => $text
                        ]);
                        $bot->reply("Благодарю $text! Теперь напишите Ваш контактный номер телефона:");
                        $d = "Благодарю $text! Теперь напишите Ваш контактный номер телефона:";
                    }
                    else if($agree == '0' && ($text == 'да' || $text == 'согласен'))
                    {
                        $bot->reply("$name, Ваша заявка отправлена. С вами свяжуться по указанным реквизитам.<br>Если у Вас остались ещё и вопросы, нажмите \"2\", для оформления займа, нажмите \"1\".");
                        $d = "$name, Ваша заявка отправлена. С вами свяжуться по указанным реквизитам.<br>Если у Вас остались ещё и вопросы, нажмите \"2\", для оформления займа, нажмите \"1\".";
                        $bot->userStorage()->save([
                            'step' => null,
                            'name' => 0,
                            'phone' => 0,
                            'email' => 0,
                            'agree' => 0
                        ]);
                    }
                    else
                    {
                        if($name == '0') {  
                            $again = "Напишите ваше полное имя:"; 
                            $bot->userStorage()->save([
                                'step' => 1,
                                'name' => 0,
                                'phone' => 0,
                                'email' => 0,
                                'agree' => 0
                            ]);
                        }
                        if($phone == '0')
                        {
                            $again = "Напишите Ваш контактный номер телефона:";
                            $bot->userStorage()->save([ 
                                'phone' => 0,
                                'email' => 0,
                                'agree' => 0
                            ]);
                        } 
                        if($email == '0') 
                        {
                            $again = "Напишите Ваш контактный адрес электронной почты:";
                            $bot->userStorage()->save([ 
                                'email' => 0,
                                'agree' => 0
                            ]);
                        }
                        if($agree == '0' && ($text != 'да' || $text != 'согласен'))
                        {
                            $again = "Вы согласны с публичной офертой ( https://bankmoney.su/publichnaya-oferta/ )? Да или Нет?";
                            $bot->userStorage()->save([ 
                                'email' => 0,
                                'agree' => 0
                            ]);
                        }
                        $bot->reply("Попробуйте снова: $again"); 
                        $d = "Попробуйте снова: $again";
                    }
                    $data = [
                        'answer' => $d,
                        'fingerprint' => $rr_id,
                        'question' => $text,
                        'source' =>  $source,
                        'procent' => 777
                    ];  
                    break;
                } 
                case 2: { 
                    $d = $text;
                    include 'internal-backend-bot-api.php';
                    if(strpos($temp2,"ваше имя"))
                    {
                        $bot->userStorage()->save([
                            'step' => 1
                        ]);
                    }
                    $bot->reply($temp2);
                    $d = $temp2;
                    if(strpos($temp2,"ваше имя") == false && strpos($temp2,"опробуйте снова") == false)
                        $bot->reply('Если у Вас остались ещё вопросы, нажмите "2", для оформления займа, нажмите "1".');
                        $d = $temp2.' Если у Вас остались ещё вопросы, нажмите "2", для оформления займа, нажмите "1".';
                    
                    break;
                }
                default: {
                    $bot->userStorage()->save([
                        'step' => null
                    ]);
                    break;
                } 
            }
        }
        else
        {
            $bot->userStorage()->save([
                'step' => null
            ]);
            
            $bot->reply("Здравствуйте $rrFirstName ! Я могу:<br>1) Оформить займ<br>2) Ответить на вопрос<br>Какой № Вы выбираете?");
            //var_dump($user->getUsername());
            $d = 'Здравствуйте $rrFirstName! Я могу:<br>1) Оформить займ<br>2) Ответить на вопрос<br>Какой № Вы выбираете?';
        } 
        $data = [
            'answer' => $d,
            'fingerprint' => $rr_id,
            'question' => $text,
            'source' =>  $source,
            'procent' => $procent
        ];  
        $this->post_request('https://zaimnow.tk/send-bot2',$data);
    }

    public function email($bot, $email) 
    {
        $_text = (array)  ( $bot->getMessage()->getPayload() );
        $user = $bot->getUser();
        $rr_id = $user->getId();
        $rrFirstName = $user->getFirstName();

        if(!empty($_text['message'])) $source = 'facebook';
        else  $source = 'vk';

        $_email = $bot->userStorage()->get('email');

        if($_email == '0')
        {
            $name = $bot->userStorage()->get('name');
            $bot->reply("Спасибо $name, вы указали почту: $email! Вы согласны с публичной офертой ( https://bankmoney.su/publichnaya-oferta/ )? Да или Нет?");
            $d = "Спасибо $name, вы указали почту: $email! Вы согласны с публичной офертой ( https://bankmoney.su/publichnaya-oferta/ )? Да или Нет?";
            $bot->userStorage()->save([
                'email' => $email
            ]);
            $data = [
                'fingerprint' => $rr_id,
                'answer' => $d,
                'question' => $email,
                'source' =>  $source,
                'procent' => 777
            ]; 
            $this->post_request('https://zaimnow.tk/send-bot2',$data);
        }
    }

    public function phone($bot, $numb) 
    {
        $_text = (array)  ( $bot->getMessage()->getPayload() );
        $user = $bot->getUser();
        $rr_id = $user->getId();
        $rrFirstName = $user->getFirstName();

        if(!empty($_text['message'])) $source = 'facebook';
        else  $source = 'vk';

        $phone = $bot->userStorage()->get('phone');
        $name = $bot->userStorage()->get('name');
        if($phone == '0' && $name != '0')
        {
            $bot->reply("Вы ввели телефон: $numb. Теперь напишите Ваш контактный адрес электронной почты:");
            $d = "Вы ввели телефон: $numb. Теперь напишите Ваш контактный адрес электронной почты:";
            $bot->userStorage()->save([
                'phone' => $numb
            ]);
            $data = [
                'fingerprint' => $rr_id,
                'answer' => $d,
                'question' => $numb,
                'source' =>  $source,
                'procent' => 777
            ]; 
            $this->post_request('https://zaimnow.tk/send-bot2',$data);
        }
    }

    private function post_request($url, array $params) {
        $query_content = http_build_query($params);
        $fp = fopen($url, 'r', FALSE, // do not use_include_path
          stream_context_create([
          'http' => [
            'header'  => [ // header array does not need '\r\n'
              'Content-type: application/x-www-form-urlencoded',
              'Content-Length: ' . strlen($query_content)
            ],
            'method'  => 'POST',
            'content' => $query_content
          ]
        ]));
        if ($fp === FALSE) {
          fclose($fp);
          return json_encode(['error' => 'Failed to get contents...']);
        }
        $result = stream_get_contents($fp); // no maxlength/offset
        fclose($fp);
        return $result;
    }
}