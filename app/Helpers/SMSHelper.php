<?php

namespace App\Helpers;
use Twilio\Rest\Client;


class SMSHelper 
{
    public static function sms($request) {
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");

        $twilio = new Client($twilio_sid, $token);

        try {
            $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($request, "sms");

        } catch (\Exception $exception) {
            return back()->with(['phone_number' => $request, 'error' => $exception->getMessage()]);
        }
    }


    public static function smsVerify($request) {
        // /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);

        try {
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($request['verification_code'], array('to' =>$request['phone_number']));
            return $verification->valid;
        } catch (\Exception $exception) {

            return false;
        }
    }
}