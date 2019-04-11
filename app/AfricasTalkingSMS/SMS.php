<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-05
 * Time: 16:06
 */

namespace App\AfricasTalkingSMS;

use AfricasTalking\SDK\AfricasTalking;
use App\RequestMessage;

class SMS
{
    public $recipients;
    public $message;
    public $short_code;
    public $sms;


    public function __construct($recipients, $message, $short_code)
    {
        $this->username = env('AT_USERNAME');
        $this->apikey = env('AT_API_KEY');

        $this->recipients = $recipients;
        $this->message = $message;
        $this->short_code = $short_code;

        //SDK Initialization
        $AT = new AfricasTalking($this->username, $this->apikey);

        // SMS Service Retrieval
        $this->sms = $AT->sms();
    }

    public function send()
    {
        try {
            $this->sms->send([
                'to' => $this->recipients,
                'message' => $this->message,
                'from' => $this->short_code
                             ]);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function retrieveSMSAndSaveToDatabase()
    {
        $lastReceivedId = 0;

        try {
            // Fetch all messages using a loop
            do {
                $messages = $this->sms->fetchMessages(['lastReceivedId' => $lastReceivedId]);

                foreach ($messages['data']->SMSMessageData->Messages as $message) {
                    $existing_request_message = RequestMessage::where('text_id', $message->id)->first();

                    if (!$existing_request_message) {
                        //Save to db
                        $request_message = $this->saveMessage($message);

                        $this->sendResponseToUser($request_message);

                        // Reassign the lastReceivedId
                        $lastReceivedId = $message->id;
                    }
                }
            } while (count($messages) > 0);

            // NOTE: Be sure to save the lastReceivedId for next time
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function saveMessage($message)
    {
        $request_message = new RequestMessage();

        $request_message->linkId = $message->linkId;
        $request_message->text_id = $message->id;
        $request_message->text = $message->text;
        $request_message->to = $message->to;
        $request_message->date = $message->date;
        $request_message->from = $message->from;

        $request_message->save();

        return $request_message;
    }

    public function sendResponseToUser($request_message)
    {
        $message_body = $request_message->text;

        if ($message_body) {
//            TODO: Check
        }

        $sms = new SMS('+254701618000', 'Hellow! We made it again and again!', '50010');

        $sms->send();

        dd($request_message->toArray());
    }
}