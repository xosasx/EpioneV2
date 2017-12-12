<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use djchen\OAuth2\Client\Provider\Fitbit;
use Socialite;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\FirebaseController;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = "";
        $minutes = 60;
        try
        {
            $user = Socialite::driver('google')->stateless()->user();
            //$minutes = 3600;//$user->expiresIn;   
            
        }catch(\GuzzleHttp\Exception\ClientException $ex){

        }

        if ($request->cookie('userType') == 'Client')
        {
            $route_name = 'dashboard.client';

            if ($request->cookie('providerInfo') == null){
                return redirect()->route('confirm.fitbit')->cookie('providerInfo', json_encode($user), $minutes);
            }
            else if ($request->cookie('fitbit_token') == null)
            {
                if (isset($_GET['code']))
                {
                    try
                    {
                        $provider = new Fitbit([
                            'clientId'          => '22CK9X',
                            'clientSecret'      => '50f843929b2b4b6142c2d3007a0e7cd2',
                            'redirectUri'       => 'https://epione.oobazee.com/dashboard'
                        ]);

                        // Try to get an access token using the authorization code grant.
                        $accessToken = $provider->getAccessToken('authorization_code', [
                            'code' => $_GET['code']
                        ]);

                        //$minutes_fitbit = 3600;//86400;
                        Cookie::queue(Cookie::make('fitbit_token', $accessToken->getToken(), $minutes));

                        $this->firebase = new FirebaseController();
                        $this->firebase->set('fitbit_token', $accessToken->getToken());
                        $this->firebase->set('fitbit_refresh_token', $accessToken->getRefreshToken());
                        $this->firebase->set('fitbit_expires', $accessToken->getExpires());
                        $this->firebase->set('fitbit_has _expired', $accessToken->hasExpired());

                        return redirect()->route($route_name);
                    }catch(\League\OAuth2\Client\Provider\Exception\IdentityProviderException $ex){
                        
                    }    
                }
                else
                {
                    return redirect()->route('confirm.fitbit');
                }                            
            }

            return redirect()->route($route_name);
                        
        } //End of client
        else{
            $route_name = 'dashboard.carer';
            return redirect()->route($route_name);
        }
    }
}
