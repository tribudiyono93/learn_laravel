<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMailable;
use Log;

class HomeController extends Controller
{
    public function mail() {
        $name = 'Krunal';
        $email = new SendMailable($name);
        Log::info($email->render() . "");
        //Mail::to('tribudiyono93@gmail.com')->send(new SendMailable($name));
    
        return $email;
    }
}
