<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendMail;


class SentMail extends Controller
{
    public function home()
    {
    	return view('mail.home');
    }

    public function sendmail()
    {
    	$data='Mustafa';

    	Mail::to("test@example.com")->send( new SendMail($data));
    }
}
