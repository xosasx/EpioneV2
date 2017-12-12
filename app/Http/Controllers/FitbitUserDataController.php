<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use djchen\OAuth2\Client\Provider\Fitbit;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp\Exception\GuzzleException;

class FitbitUserDataController extends Controller
{
    protected $firebase;
    //protected $resource_url; 
    protected $user_key;

    public function __construct(){
        $this->firebase = new FirebaseController();
        $this->user_key = $this->firebase->get('fitbit_token');
    }

    private function makeGetRequest($url, $params = null){
        $result;
        try{
            $client = new Client(); //GuzzleHttp\Client
            $result = $client->get(Fitbit::BASE_FITBIT_API_URL.$url, [
                'headers' => [
                    'Authorization' => 'Bearer '.Cookie::get('fitbit_token'),
                    [Fitbit::HEADER_ACCEPT_LANG => 'en_GB'], 
                    [Fitbit::HEADER_ACCEPT_LOCALE => 'en_GB'],
                ],
                'query' => $params
            ]);
            $json = utf8_encode($result->getBody()->getContents());
            $obj = json_decode($json);
            //$obj = json_decode($result->getBody());
            return $obj;
        }catch (Exception $ex){
            if ($result->getStatusCode() == 401){
                return redirect()->route('dashboard.client');
            }
            return $result->getStatusCode();
        }
    }

    private function makePostRequest($url, $params){
        $result;
        try{
            $client = new Client(); //GuzzleHttp\Client
            $result = $client->post(Fitbit::BASE_FITBIT_API_URL.$url, [
                'headers' => [
                    'Authorization' => 'Bearer '.Cookie::get('fitbit_token'),
                    [Fitbit::HEADER_ACCEPT_LANG => 'en_GB'], 
                    [Fitbit::HEADER_ACCEPT_LOCALE => 'en_GB'],
                ],
                'form_params' => $params
            ]);
            // $json = utf8_encode($result->getBody()->getContents());
            // $obj = json_decode($json);
            //$obj = json_decode($result->getBody());


            return true;
        }catch (\GuzzleHttp\Exception\ClientException $ex){ //Exception $ex
            // if ($result->getStatusCode() == 401){
            //     return redirect()->route('dashboard.client');
            // }
            //return false;
            $response = $ex->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            return $responseBodyAsString;//response()->json(array('Client Exception' => $responseBodyAsString), 401);
        }
    }

    public function profile(){
        $resource_url = "/1/user/-/profile.json";
        return $this->makeGetRequest($resource_url);
    }

    public function weight(){
        
    }

    public function updateProfile($details){
        $resource_url = "/1/user/-/profile.json";
        return $this->makePostRequest($resource_url, $details);
    }

    public function sleep($beforeDate, $afterDate){
        $resource_url = "/1.2/user/-/sleep/list.json";          
        $params = array(            
            'afterDate'=> $afterDate, 
            'sort' => 'desc',
            'offset' => 0,
            'limit' => 10);  
            // $paramsq = array('form_params' => array(
            // 'beforeDate'=> $beforeDate, 
            // 'afterDate'=> $afterDate, 
            // 'sort' => 'desc',
            // 'offset' => 0,
            // 'limit' => 10));
        // $params = [
        //     'beforeDate'=> $beforeDate, 
        //     'afterDate'=> $afterDate, 
        //     'sort' => 'desc',
        //     'offset' => 0,
        //     'limit' => 10]; 
        return $this->makeGetRequest($resource_url, $params);
    }
}