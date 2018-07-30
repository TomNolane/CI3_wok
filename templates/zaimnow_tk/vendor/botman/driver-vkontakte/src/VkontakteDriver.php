<?php
/*
 * Botman.io VkontakteDriver
 * Tom Nolane 2018
 * license: freebsd
 *
 */

namespace BotMan\Drivers\Vkontakte;

use Illuminate\Support\Collection;
use BotMan\BotMan\Drivers\HttpDriver;
use BotMan\BotMan\Users\User;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Video;  

class VkontakteDriver extends HttpDriver
{
    protected $vkontakteProfileEndpoint = 'https://api.vk.com/method/users.get?v=5.800&user_ids=';

    const DRIVER_NAME = 'Vkontakte';
    protected $myData = [];

    protected $endpoint = 'messages.send';

    /**
     * @param Request $request
     * @return void
     */
    public function buildPayload(Request $request)
    {    
        $this->payload = new ParameterBag( (array) json_decode(  $request->getContent() , true)   );
        
        // var_dump(json_decode($request->getContent(), true));
        $this->myData = (array) json_decode( $request->getContent() , true); // $request->request->all();
        
        $this->event = Collection::make($this->payload->get('object'));
		//$rr = current(  (array)$this->event   ); 
		//var_dump(  $this->array_get( current(  (array)$this->event), 'peer_id', null)    );
        $this->config = Collection::make($this->config->get('vkontakte')); 
    }

    /**
     * Retrieve User information.
     * ++
     * @param IncomingMessage $matchingMessage
     * @return User|bool
     */
    public function getUser(IncomingMessage $matchingMessage)
    {  
        $udata = [];
        $resp = $this->sendRequest('users.get', [
            'user_ids' => $this->array_get( current(  (array)$this->event), 'peer_id', null),
            'fields' => 'screen_name,sex,bdate,city,country,contacts',
        ]);

        if ((!$resp) or (!$resp->isOk())) return false;
        $resp_data = json_decode($resp->getContent(), true);

        $profileData = $this->array_get($resp_data, 'response.0');

        $id = $this->array_get($profileData, 'id', null);
        $firstName = $this->array_get($profileData, 'first_name', null);
        $lastName = $this->array_get($profileData, 'last_name', null);
        $uname = $this->array_get($profileData, 'screen_name', null);

        if ($uname === null) {
            $uname = strlen(trim($firstName . $lastName)) > 0 ? trim($firstName . $lastName) : $id;
        }

        $sex = $this->array_get($profileData, 'sex', null);
        if ($sex != null) {
            $udata['gender'] = ($sex == 2) ? 'male' : 'female';
        }

        $bdate = $this->array_get($profileData, 'bdate', null);
        if ($bdate != null) {
            $age = date('Y') - date('Y', strtotime($bdate));
            $udata['age'] = $age;
        }

        $city = $this->array_get($profileData, 'city.title', null);
        if ($city != null) {
            $udata['city'] = $city;
        }

        $country = $this->array_get($profileData, 'country.title', null);
        if ($country != null) {
            $udata['country'] = $country;
        }

        $mobile_phone = $this->array_get($profileData, 'mobile_phone', null);
        if ($mobile_phone != null) {
            $udata['additional_phone'] = $mobile_phone;
        }

        $home_phone = $this->array_get($profileData, 'home_phone', null);
        if ($home_phone != null) {
            $udata['home_phone'] = $home_phone;
        }

        //$id = null, $first_name = null, $last_name = null, $username = null, $user_info = []
        return new User($id, $firstName, $lastName, $uname, $udata);
    }


    /**
     * Determine if the request is for this driver.
     *
     * @return bool
     */
    public function matchesRequest()
    {
        $check = (( $this->array_get($this->myData, 'type', null)) === 'message_new');
        $check2 = (( $this->array_get($this->myData, 'type', null)) === 'confirmation');
        $check3 = (( $this->array_get($this->myData, 'type', null)) === 'message_reply');

        // $attachs = $this->array_get($this->myData, 'object.attachments', []);
        // if (count($attachs) > 0) {
        //     $check = false;
        // }

        // global $is_vk;
        // if($check) $is_vk = true;

        if($check3)
        {
            return false;
        }
        else if($check)
        {
            header("HTTP/1.1 200 OK");
            echo 'OK';
        }
        else if ($check2)
        {
            header("HTTP/1.1 200 OK");
            echo $this->config->get('verify');
        }
        
        
        return $check;

    }

    /**
     * @param IncomingMessage $matchingMessage
     *
     * @return Answer
     */
    public function getConversationAnswer(IncomingMessage $matchingMessage)
    {
        
        // Return the given answer, when inside a conversation.
        return Answer::create($matchingMessage->getText())->setMessage($matchingMessage);
    }


    /**
     * Retrieve the chat message(s).
     *
     * @return array
     */
    public function getMessages()
    {
        $sender = $this->array_get($this->myData, 'group_id');
        $recipient = $this->array_get($this->myData, 'object.from_id');
        $text = $this->array_get($this->myData, 'object.text');  
       
        $messages = [new IncomingMessage($text, $sender, $recipient, $this->event)]; 

        return $messages;
    }

    /**
     * @return bool
     */
    public function isBot()
    {
        return false;
    }


    /**
     * @param IncomingMessage $matchingMessage
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function types(IncomingMessage $matchingMessage)
    {
        $parameters = [
            'user_id' => $matchingMessage->getSender(),
            'access_token' => $this->config->get('token'),
            'type' => 'typing',
            'v' => '5.80',
        ];
        
        return $this->http->get('https://api.vk.com/method/messages.setActivity', $parameters);
    } 

    /**
     * @param string|Question|IncomingMessage $message
     * @param \BotMan\BotMan\Messages\Incoming\IncomingMessage $matchingMessage
     * @param array $additionalParameters
     * @return Response
     */
    public function buildServicePayload($message, $matchingMessage, $additionalParameters = [])
    {
        $recipient = $matchingMessage->getSender(); 

        $parameters = array_merge_recursive([
            'peer_id' => $matchingMessage->getPayload()->get('peer_id'),
            'access_token' => $this->config->get('token'),
            'v' => '5.80',
            'random_id' =>  mt_rand(20, 99999999)
        ], $additionalParameters);
 
        if ($message instanceof Question) {
            $parameters['message'] = $message->getText();
        } elseif ($message instanceof OutgoingMessage) {
            $parameters['message'] = $message->getText();
        } else {
            $parameters['message'] = $message;
        } 
       
        return $parameters;
    }

    /**
     * @param mixed $payload
     * @return Response
     */
    public function sendPayload($payload)
    {   
        $r = $this->http->get('https://api.vk.com/method/' . $this->endpoint, $payload);//[ 'access_token' => '9af81c610faf0ea31978d0dae01ebe7a1736d17b0b2b53b164ff3b18cc1b9d4e422fd15db046594139078',  'random_id' =>  mt_rand(20, 99999999), 'peer_id' => '352996081' ,  'message' => 'Test message', 'v'=>'5.80'] );//$payload);
        return $r; 
    }

    /**
     * Return the driver name.
     *
     * @return string
     */
    public function getName()
    {  
        return 'Vkontakte';
    }

    /**
     * @return bool
     */
    public function isConfigured()
    {
        return !is_null($this->config->get('token'));
    }


    /**
     * Low-level method to perform driver specific API requests.
     * ++
     * @param string $endpoint
     * @param array $parameters
     * @param IncomingMessage $matchingMessage
     * @return Response
     */
    public function sendRequest($endpoint, array $parameters, IncomingMessage $matchingMessage = null)
    { 
        $parameters = array_replace_recursive([
            'access_token' => $this->config->get('token'),
            'v' => '5.80',
        ], $parameters);

        $request = $this->http->get('https://api.vk.com/method/' . $endpoint, $parameters); 
       
        return $request;
    }

    // public function getMessages()
    // {
    //     // Return the message(s) that are inside the incoming request.
    //     return [new Message($this->myData['text'], $this->myData['sender_id'], $this->myData['recipient_id'])];
    // }

    public function array_get($array, $key, $default = null) 
    { 
        if (is_null($key)) return $array;

        foreach (explode('.', $key) as $segment)
        {
            if ( !is_array($array) or !array_key_exists($segment, $array))
            {
                return value($default);
            }

            $array = $array[$segment];
        }

        return $array;
    }
}
