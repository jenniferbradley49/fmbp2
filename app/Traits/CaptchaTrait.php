<?php namespace App\Traits;

//use Input;
use \ReCaptcha\ReCaptcha;
use Storage;

trait CaptchaTrait 
{

    public function captchaCheck($response)
    {
//        $response = Input::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = env('RE_CAP_SECRET');
Storage::put("captcha_response_raw.txt", "response object = ".$response);
Storage::put("captcha_remoteip.txt", "remoteip = ".$remoteip);
Storage::put("captcha_secret.txt", "secret = ".$secret);
$recaptcha = new ReCaptcha($secret);
//$recaptcha = (string)$recaptcha;
//Storage::put("captcha_recaptcha.txt", "recaptcha object = ".$recaptcha);
$resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) 
        {
        	return true;
        } 
        
        else 
        {
        	return false   ;
        }
    }
}
