<?php
/*
 * Botman.io VkontakteDriver
 * opiy 2017
 * license: freebsd
 *
 */

namespace BotMan\Drivers\Vkontakte;

use Illuminate\Support\Collection;
use BotMan\BotMan\Drivers\HttpDriver;
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


    protected $vkontakteProfileEndpoint = 'https://api.vk.com/method/users.get?v=5.730&user_ids=';

    const DRIVER_NAME = 'Vkontakte';
    protected $myData = [];

    protected $endpoint = 'messages.send';

    /**
     * @param Request $request
     * @return void
     */
    public function buildPayload(Request $request)
    {
        $this->payload = new ParameterBag( (array) json_decode($request->getContent(), true) );
        $this->myData = $request->request->all();
        $this->event = Collection::make($this->payload->get('object'));
        $this->config = Collection::make($this->config->get('vkontakte'));
        //   \Log::debug('Driver buildPayload: mydata' . print_r($this->myData, true));
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
            'user_ids' => $matchingMessage->getSender(),
            'fields' => 'screen_name,sex,bdate,city,country,contacts',
        ]);

        if ((!$resp) or (!$resp->isOk())) return false;
        $resp_data = json_decode($resp->getContent(), true);


        $profileData = $this->array_get($resp_data, 'response.0');

        $id = $this->array_get($profileData, 'id', null);
        $firstName = $this->array_get($profileData, 'name', null);
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


        return new User($matchingMessage->getSender(), 'Tom', 'Nolane', 'tomnolane', $udata);
    }


    /**
     * Determine if the request is for this driver.
     *
     * @return bool
     */
    public function matchesRequest()
    {
        $check = (( $this->array_get($this->myData, 'type', null)) === 'message_new');

        // \Log::debug('mydata: ' . print_r($this->myData, true));

        $attachs = $this->array_get($this->myData, 'object.attachments', []);
        if (count($attachs) > 0) {
            $check = false;
        }

        // This method detects if the incoming HTTP request should be handled with this driver class.
        return true;

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
        $sender = $this->array_get($this->myData, 'object.user_id');
        $recipient = $this->array_get($this->myData, 'group_id');
        $text = $this->array_get($this->myData, 'object.body');


        $messages = [new IncomingMessage($text, $sender, $recipient, $this->event)];
        // \Log::debug('Driver getMessages: ' . print_r($message, true));
        // Return the message(s) that are inside the incoming request.
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
            'v' => '5.73',
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
            'user_id' => $recipient,
            'access_token' => $this->config->get('token'),
        ], $additionalParameters);

        // Send a reply to the messaging service.
        // Replies can either be strings, Question objects or IncomingMessage objects.
        if ($message instanceof Question) {
            $parameters['message'] = $message->getText();
        } elseif ($message instanceof OutgoingMessage) {
            $parameters['message'] = $message->getText();
        } else {
            $parameters['message'] = $message;
        }

        return $this->http->get('https://api.vk.com/method/messages.send', $parameters);
    }

    /**
     * @param mixed $payload
     * @return Response
     */
    public function sendPayload($payload)
    {
        $response = $this->http->post('https://api.vk.com/method/' . $this->endpoint, [], [ 'user_id' => '352996081' , 'message' => 'Test%20message', 'v'=>'5.80'], [
            "Authorization: Bearer {$this->config->get('token')}",
            'Content-Type: application/json',
            'Accept: application/json',
        ], true);
    
        return $response;
        // $r =  $this->http->get('https://api.vk.com/method/' . $this->endpoint, [ 'user_id' => '359095515' , 'message' => 'Test%20message', 'v'=>'5.80'] );//$payload);
        // return 'OK';
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
        // \Log::debug('VK sendRequest: ' . $endpoint . '  ---- ' . print_r($parameters, true));
       
        return $request;

    }

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