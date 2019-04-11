<?php

namespace App\Http\Controllers;

use App\AfricasTalkingSMS\SMS;
use App\MessageResponse;
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
        $phone_number = '+254701618000';
        $short_code = env('SHORT_CODE');
        $message = MessageResponse::where('slug', 'activation')->first()->response;

        $sms = new SMS($phone_number, $message, $short_code);

        $sms->send();
    }

    public function retrieveSMS()
    {
        Log::info('here at the callback');

        $sms = new SMS('', '', '');

        $sms->retrieveSMSAndSaveToDatabase();
    }
}
