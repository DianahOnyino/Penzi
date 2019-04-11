<?php

namespace App\Http\Controllers;

use App\AfricasTalkingSMS\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendSMS()
    {
        $message = "";
        $sms = new SMS('+254701618000','Hellow! We made it again and again!','50010');

        $sms->send();
    }

    public function retrieveSMS()
    {
        Log::info('here at the callback');

        $sms = new SMS('', '', '');

        $sms->retrieveSMSAndSaveToDatabase();
    }
}
