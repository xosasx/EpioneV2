<?php

namespace App\Http\Controllers\CustomAuth;

use Illuminate\Http\Request;
use djchen\OAuth2\Client\Provider\Fitbit;
use Socialite;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FirebaseController;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{

    protected $firebase;
    protected $minutes;

    public function __construct(Request $request)
    {
        $this->minutes = 60;
        /*$users_type = array("client", "carer", "gp");

        $error_message = 'Please select a user type';

        if (!in_array($request->user, $users_type)) {
            return redirect('/')->with('error', $error_message);
        } */
    }

    public function logout()
    {
        // $cookie[0] = Cookie::forget('provider');
        // $cookie[1] = Cookie::forget('userType');
        // $cookie[2] = Cookie::forget('fitbit_token');
        Cookie::queue(Cookie::forget('provider'));
        Cookie::queue(Cookie::forget('userType'));
        Cookie::queue(Cookie::forget('fitbit_token'));
        Cookie::queue(Cookie::forget('providerInfo'));        
        return view('welcome');//->withCookies($cookie);
    }

    /**
     * Redirect the user to the social authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request, $provider, $user_type)
    {
        // $request->session()->put('provider', $provider);
        // $minutes = 3600;
        Cookie::queue(Cookie::make('provider', $provider, $this->minutes));
        Cookie::queue(Cookie::make('userType', $user_type, $this->minutes));
        //return redirect('/')->cookie('accept_cookie','agreed', 129600);
        return Socialite::driver($provider)->redirect();
    }

    public function handleFitbitToLogin()
    {
        $user = json_decode(Cookie::get('providerInfo'), true);
        return view('loginFitbit')->with('user', $user);
    }

    /**
     * Obtain the user information from social.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        // $user = Socialite::driver($provider)->user();
        
        $user = Socialite::driver($provider)->stateless()->user();
        //$this->firebase->set('base_'.$provider.'_stuff', $user);
        // $user->token;
    }

    /**
    * Obtain user data from Fitbit
    *
    * @return Response
    */
    public function handleRedirectToFitbit()
    {
        
        $provider = new Fitbit([
            'clientId'          => '22CK9X',
            'clientSecret'      => '50f843929b2b4b6142c2d3007a0e7cd2',
            'redirectUri'       => 'https://epione.oobazee.com/dashboard'
        ]);

        // start the session
        session_start();

        // If we don't have an authorization code then get one
        if (!isset($_GET['code'])) {

            // Fetch the authorization URL from the provider; this returns the
            // urlAuthorize option and generates and applies any necessary parameters
            // (e.g. state).
            $authorizationUrl = $provider->getAuthorizationUrl();

            // Get the state generated for you and store it to the session.
            $_SESSION['oauth2state'] = $provider->getState();
            
            // Redirect the user to the authorization URL.
            header('Location: ' . $authorizationUrl);
            exit;

        // Check given state against previously stored one to mitigate CSRF attack
        } elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
            unset($_SESSION['oauth2state']);
            exit('Invalid state');

        } else {

            try {

                // Try to get an access token using the authorization code grant.
                $accessToken = $provider->getAccessToken('authorization_code', [
                    'code' => $_GET['code']
                ]);
                          
                $this->firebase = new FirebaseController();
                $this->firebase->set('fitbit_token', $accessToken->getToken());
                $this->firebase->set('fitbit_refresh_token', $accessToken->getRefreshToken());
                $this->firebase->set('fitbit_expires', $accessToken->getExpires());
                $this->firebase->set('fitbit_has _expired', $accessToken->hasExpired());

                // We have an access token, which we may use in authenticated
                // requests against the service provider's API.
                echo $accessToken->getToken() . "\n";
                echo $accessToken->getRefreshToken() . "\n";
                echo $accessToken->getExpires() . "\n";
                echo ($accessToken->hasExpired() ? 'expired' : 'not expired') . "\n";

                // Using the access token, we may look up details about the
                // resource owner.
                $resourceOwner = $provider->getResourceOwner($accessToken);

                var_export($resourceOwner->toArray());

                // The provider provides a way to get an authenticated API request for
                // the service, using the access token; it returns an object conforming
                // to Psr\Http\Message\RequestInterface.
                $request = $provider->getAuthenticatedRequest(
                    Fitbit::METHOD_GET,
                    Fitbit::BASE_FITBIT_API_URL . '/1/user/-/profile.json',
                    $accessToken,
                    ['headers' => [Fitbit::HEADER_ACCEPT_LANG => 'en_GB'], [Fitbit::HEADER_ACCEPT_LOCALE => 'en_GB']]
                    // Fitbit uses the Accept-Language for setting the unit system used
                    // and setting Accept-Locale will return a translated response if available.
                    // https://dev.fitbit.com/docs/basics/#localization
                );

                // $minutes_fitbit = 86400;
                Cookie::queue(Cookie::make('fitbit_token', $accessToken->getToken(), $this->minutes));
                // Cookie::queue(Cookie::make('userType', 'Client', $minutes));
                // Make the authenticated API request and get the parsed response.
                $response = $provider->getParsedResponse($request);

                // If you would like to get the response headers in addition to the response body, use:
                //$response = $provider->getResponse($request);
                //$headers = $response->getHeaders();
                //$parsedResponse = $provider->parseResponse($response);

            } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

                // Failed to get the access token or user details.
                exit($e->getMessage());

            }
        }

    }

}