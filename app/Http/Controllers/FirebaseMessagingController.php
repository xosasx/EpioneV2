<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
use sngrl\PhpFirebaseCloudMessaging\Notification;
use Illuminate\Support\Facades\Cookie;

class FirebaseMessagingController extends Controller
{
    protected $server_key = 'AAAA1h-1J1I:APA91bEmFGrBa2WgGX_jyenyxb7AtcpV4ynzEMAlndAss9eulls5bbJlSpLjTSPvNArkt2u0rQMoW6Y8aw4vzXsjJM6vAcp8VKxLXAfL0DCjAkf3NKJMVptv6K13DfVvEkD-AYM_h2Xp';//'AAAAUpNS4v8:APA91bEVnQAo_4WelahQSm8vIMdZ70MnKvami7m-9wHRmSn3gFeC_4DNZ-5nQpoPhf-kJTypU5NW5FLFdgBNy2vxbw_S2byt87_GcM-IpA88n1L2Icl5tSI2-X-urWl9noeuUQGmY1wa';
    protected $client;
    protected $firebase;
    protected $user;
    // protected $fitbit;

    public function __construct(){
        $this->client = new Client();
        $this->firebase = new FirebaseController();
        // $this->fitbit = new FitbitUserDataController();
    }

    public function send($_type, $_message){   
        // $user = $this->fitbit->profile();  
        $this->client->setApiKey($this->server_key);
        $user = $this->firebase->get('');
        $device_token = $this->firebase->getDeviceToken($user['carer']['id']);

        $message = new Message();
        $message->setPriority('high');
        $message->addRecipient(new Device($device_token));
        $message->setNotification(new Notification($user['name'].' needs attention', $_message))
                ->setData(['mobile' => $user['mobile'], 'message' => $user['name'].' '.$_message]);

        $response = $this->client->send($message);
        $milliseconds = round(microtime(true) * 1000);
        
        $this->firebase->get('mobile');
        $_data = [
            'date' => '-'.$milliseconds,
            'message' => $_message,
            'name' => $user['name'],
            'mobile' => $user['mobile'],
            'response' => false,
            'type' => $_type,
        ]; 
        $this->firebase->addNotification($user['carer']['id'].'/notification'.'/'.$user['id'].'/', $_data);

        // var_dump($response->getStatusCode());
        // var_dump($response->getBody()->getContents());
    }
}
