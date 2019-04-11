<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-10
 * Time: 14:07
 */

namespace App\AfricasTalkingSMS;




use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class ShortCodeNotification
{
    public function __construct()
    {
//        $linkId = $_POST['linkId'];
//        $text = $_POST['text'];
//        $id = $_POST['id'];
        $from = $_POST['from'];
//        $date = $_POST['date'];

        $user = new User();

        $user->phone_number = $from;

        $user->save();

        dd($_POST);

        Log::info($_POST);

        return $user;
    }
}