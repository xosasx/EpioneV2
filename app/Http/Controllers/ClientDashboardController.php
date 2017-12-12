<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use djchen\OAuth2\Client\Provider\Fitbit;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Socialite;   
use Illuminate\Support\Facades\Cookie;
use Validator;
use Exception;
use App\Http\Controllers\FirebaseController;

class ClientDashboardController extends Controller
{
    protected $client;
    protected $firebase;
    protected $firebaseMessage;

    public function __construct()
    {
        $this->client = new FitbitUserDataController();
        $this->firebase = new FirebaseController();
        $this->firebaseMessage = new FirebaseMessagingController();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$firebase = new FirebaseController();
         $client = new Client(); //GuzzleHttp\Client
        // // $result = $client->get(Fitbit::BASE_FITBIT_API_URL . '/1/user/-/profile.json', [
        // //     'headers' => [
        // //         'Authorization' => 'Bearer '.$firebase->get('fitbit_token'),
        // //     ],
        // //     'form_params' => [
        // //         'sample-form-data' => 'value'
        // //     ]
        // // ]);

        $result = $client->get('https://www.epione.oobazee.com/profile-test.json', [
            'form_params' => [
                'sample-form-data' => 'value'
            ]
        ]);

        //return response()->json('success');
        
        // $obj = $result->getBody();

        // $obj = json_decode($result->getBody(), true);
        
        // $json = utf8_encode($result->getBody()->getContents());
        // $profile = json_decode($json);


        $profile = json_decode($result->getBody());

        
        //$profile = $this->client->profile();        
        $lastSyncDate = Carbon::now()->format('d-m-Y H:i:s');
        $isNeedCarer = '';

        if ($this->firebase->exists('isCarerReq')){
            if($this->firebase->get('isCarerReq')){
                $isNeedCarer = true;
            }else{
                $isNeedCarer = false;
            }
        }else {
            $isNeedCarer = true;
        }            
        // else if ($this->firebase->get('isNeedCarer')){
        //     $isNeedCarer = true;
        // }
        
        // $lastSyncDate = Carbon::today()->format('d-m-Y H:i:s');
        // $lastSyncDate->toDateTimeString();
        
        // return view('welcome', ['userFName' => $userFName, 'cookie' => 'no']);
        //$fitbit = new FitbitUserDataCollection();

        // $isNeedCarer = true;
        $user = json_decode(Cookie::get('providerInfo'), true);
        $user_id = (string)$user['id'];

        if($user_id != null && $user_id != '')
            $this->firebase->set('id', $user_id);
            
        $this->firebase->set('name', $profile->user->fullName);
        $this->firebase->set('avatar', $profile->user->avatar);
        $team = $this->firebase->getTeamMembers();

        $carer_details = '';
        if ($this->firebase->exists('carer/id')){
            $carer_id = $this->firebase->get('carer/id');
            $carer_details = $this->firebase->getCarerDetails($carer_id);
        }

        return view('client_dashboard')->with('profile', $profile)
                                ->with('lastSyncDate', $lastSyncDate)
                                ->with ('isNeedCarer', $isNeedCarer)
                                ->with('team', $team)
                                ->with('carer', $carer_details);
    }


    public function refreshInfo()
    {
        // $client = new Client(); //GuzzleHttp\Client
        // $result = $client->get('https://www.epione.oobazee.com/profile-test.json', [
        //     'form_params' => [
        //         'sample-form-data' => 'value'
        //     ]
        // ]);
        
        // $obj = json_decode($result->getBody());

        // $lastSyncDate = Carbon::now()->format('d-m-Y H:i:s');

        $profile = $this->client->profile();        
        $lastSyncDate = Carbon::now()->format('d-m-Y H:i:s');
        
        return response()->json(array('profile' => $profile, 'lastSyncDate' => $lastSyncDate), 200);

        /*return view('dashboard')->with('data_p', $obj)
                                ->with('lastSyncDate', $lastSyncDate);*/
    }

    public function updateInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            //'gender' => 'required',
        ]);

        try
        {            
            if ($validator->fails())
                throw new Exception($validator->errors());            

            $params = array(            
                    'fullname'=> $request->name
                    //'gender' => $request->gender
                );

            $errMeg = $this->client->updateProfile($params);
            if (!$errMeg)
                throw new Exception($errMeg); 

            $status = 'change_good';
            $status_message = 'Update Successful';

        }catch (Exception $e){
            $status = 'change_bad';
            $status_message = $e->getMessage();

            // return response()->withErrors($validator)
            //                 ->with($status, $status_message);
            return response()->json(array($status => $status_message), 401);
        }
        return response()->json(array($status => $status_message), 200);        
    }

    public function sleepInfo(Request $request)
    {
        // $client = new Client(); //GuzzleHttp\Client

        // $result = $client->get('https://www.epione.oobazee.com/sleep-test.json', [
        //     'form_params' => [
        //         'sample-form-data' => 'value'
        //     ]
        // ]);

        // $json = utf8_encode($result->getBody()->getContents());
        // //$data = json_decode($json);

        
        // $sleep = json_decode($json);
        // return response()->json(array('sleep' => $sleep), 200);


        //var_dump($result);
        //console.log($request->getBody());
        //console.log($sleep);
        
        $sleep = $this->client->sleep($request->beforeDate, $request->afterDate);
        return response()->json(array('sleep' => $sleep), 200);
        //return response()->json(array('sleep' => $sleep, 'lastSyncDate' => $lastSyncDate), 200);
        //return response()->json(array('bD' => $request->beforeDate, 'aD' => $request->afterDate), 200);
    }

    public function selectCarer(Request $request)
    {
        $user = json_decode(Cookie::get('providerInfo'), true);
        $user_id = (string)$user['id'];

        try
        {   
            $this->firebase->set('isCarerReq', $request->isNeedCarer);
            $this->firebase->set('mobile', $request->mobile);
            
            if($request->isNeedCarer){
                $this->firebase->set('carer/id', $request->carerId);
                $this->firebase->clientSetCarer($request->carerId, $user_id);
            }                

            $status = 'change_good';
            $status_message = 'Update Successful';

        }catch (Exception $e){
            $status = 'change_bad';
            $status_message = $e->getMessage();
            return response()->json(array($status => $status_message), 401);
        }
        index();
        //return response()->json(array($status => $status_message), 200);
    }

    public function loadCarers(Request $request)
    {
        try
        {   
            $carers = $this->firebase->availableCarers();

        }catch (Exception $e){
            $status = 'change_bad';
            $status_message = $e->getMessage();
            return response()->json(array($status => $status_message), 401);
        }
        return response()->json(array('availableCarers' => $carers), 200);
    }

    public function send_notification(Request $request)
    {
        $this->firebaseMessage->send($request->type, $request->message);
        //return response()->json(array('status' => 'changes made'), 200);
    }
}