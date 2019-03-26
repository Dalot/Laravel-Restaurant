<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Notifications\MailResetPasswordSuccess;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use SendsPasswordResetEmails, ResetsPasswords {
        ResetsPasswords::broker insteadof SendsPasswordResetEmails;
    }
    

    public function forgot(Request $request) 
    {
 
        return $this->sendResetLinkEmail($request);
    }
    
    
    
    
    
    public function doReset(Request $request)
    {
        return $this->reset($request);
        
    }
}
