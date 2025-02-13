<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;

class MailController extends Controller
{
    public function sendMail(){

        $details = [
            'title' => 'Laravel',
            'body' => 'This is for testing email using smtp'
        ];
        error_log('Some message here.');
        Mail::to('m.martani@studenti.unibs.it')->send(new ForgotPassword($details));
        return view('auth.forgotPW');
    }

    public function basic_email() {
        $data = array('name'=>"Virat Gandhi");

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
            $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
}
