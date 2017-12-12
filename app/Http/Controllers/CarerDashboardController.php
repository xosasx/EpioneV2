<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\FirebaseController;

class CarerDashboardController extends Controller
{
    public function __construct()
    {
        $this->firebase = new FirebaseController();        
    }

    /**
     * Show the carer dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $clients = array();
        //$profile = "";//json_decode(Cookie::get('providerInfo'), true);
        $profile = $this->firebase->get('info');

        if($this->firebase->exists('clients')){
            $_clients = $this->firebase->get('clients');
            
            foreach($_clients as $client)
                array_push($clients, $this->firebase->getClient($client));
        }

        $team = $this->firebase->getTeamMembers();

        return view('carer_dashboard')->with('profile', $profile)
                                        ->with('clients', $clients)
                                        ->with('team', $team);
    }

    public function notification()
    {
        $notiy = "";
        if($this->firebase->exists('notification')){
            $notiy = $this->firebase->get('notification');
        }

        return response()->json(array('notifications' => $notiy), 200);
    }    

    public function update_response_notification(Request $request)
    {
        $this->firebase->set('notification/'.$request->id.'/response', true);
        return response()->json(array('status' => 'notification updated'), 200);
    }

    public function getNotes(Request $request)
    {
        $notes = $this->firebase->get('notes/'.$request->id);
        return response()->json(array('notes' => $notes), 200);
    }

    public function sendNote(Request $request)
    {
        $_data = [
            'note' => $request->note,
        ]; 
        $this->firebase->add('notes/'.$request->id, $_data);
    }

    public function deleteNote(Request $request)
    {
        $this->firebase->remove('notes/'.$request->id.'/'.$request->note_id);
    }
}
