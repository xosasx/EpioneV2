<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Socialite;
use Illuminate\Support\Facades\Cookie;

class FirebaseController extends Controller
{
    protected $serviceAccount;
    protected $firebase;
    protected $database;
    protected $user;
    protected $userType;

    public function __construct()
    {
        $this->serviceAccount = ServiceAccount::fromJsonFile('../.epione-6b357-firebase-adminsdk-yttnz-7acd790a9d.json');

        $this->firebase = (new Factory)
            ->withServiceAccount($this->serviceAccount)
            ->create();

        $this->database = $this->firebase->getDatabase();

        
        $provider = Cookie::get('provider');//$request->session()->get('provider');
        

        //$_p = Request::cookie('provider');
        $this->userType = 'Carer';//Cookie::get('userType');//Socialite::driver('google')->stateless()->user();
        $this->user['id'] = '1222';// '100215073596927610169';//json_decode(Cookie::get('providerInfo'), true);
        // $json = json_decode(Cookie::get('providerInfo'), true);
        // $this->user['id'] = $this->userType == 'Carer' ? '1222' : $json['id'];
    }

    public function set($key, $value)
    {
        $this->database->getReference($this->userType.'/'.$this->user['id'].'/'.$key)
            ->set($value);
    }

    public function get($key)
    {
        $reference = $this->database->getReference($this->userType.'/'.$this->user['id'].'/'.$key);
        $value = $reference->getValue();
        return $value;
    }

    public function exists($key)
    {
        $reference = $this->database->getReference($this->userType.'/'.$this->user['id'].'/'.$key);        
        return $reference->getSnapshot()->exists();
    }

    public function getClient($client_id)
    {
        $reference = $this->database->getReference('Client'.'/'.$client_id);        
        return $reference->getValue();
    }

    public function availableCarers()
    {
        $reference = $this->database->getReference('Carer');        
        return $reference->getValue();
    }

    public function remove($key)
    {
        $this->database->getReference($this->userType.'/'.$this->user['id'].'/'.$key)->remove();
    }

    public function add($key, $postData)
    {
        $this->database->getReference($this->userType.'/'.$this->user['id'].'/'.$key)->push($postData);
    }

    public function addNotification($key, $postData)
    {
        $this->database->getReference('Carer/'.$key)->push($postData);
    }

    public function getDeviceToken($key)
    {
        $reference = $this->database->getReference('Carer/'.$key.'/device_token');        
        return $reference->getValue();
    }

    public function clientSetCarer($key, $value)
    {
        $this->database->getReference('Carer/'.$key.'/clients'.'/'.$value)
        ->set($value);
    }

    public function getCarerDetails($key)
    {
        $reference = $this->database->getReference('Carer/'.$key.'/info');        
        return $reference->getValue();
    }

    public function getTeamMembers()
    {
        $reference = $this->database->getReference('Team');
        $value = $reference->getValue();
        return $value;
    }

    public function test()
    {
        $user = $this->get('');
        
        var_dump($user);
        // $json = json_decode(Cookie::get('providerInfo'), true);
        // $user['id'] = $this->userType == 'Carer' ? '1222' : $json['id'];
        // return response()->json(array('notifications' => $user['id']), 200);
        // $fm = new FirebaseMessagingController();
        // $fm->send

    }
}