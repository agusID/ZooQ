<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Input;
use App\School;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function index(){
        $schools = School::all();
        return view('mail', compact(['schools', 'schools']));
    }
    public function basic_email(){
        $schools = School::all();
        $emailTo = 'dwiagus105@gmail.com';
        $subject = 'Email Verification';
        $receiverName = 'Dwi Test';
        $senderName = 'School Team';
        $activation_code = 'adfasdf';
        $emailFrom = 'dwiagus105@gmail.com';
        $rand_code = str_random(60) . $emailTo;
        $data = [
            'name'       => $receiverName, 
            'emailTo'    => $emailTo,
            'emailFrom'  => $emailFrom,
            'schools'    => $schools,
            'senderName' => $senderName,
            'activation_code' => $rand_code,
        ];

        $this->sendEmail($data);
        return 'berhasil';
     }
     public function sendEmail($data){
        Mail::send('mail', $data, function($message){
            $message->to('dwiagus105@gmail.com', 'Dwi Agustianto')->subject
               ('Email Verification');
            $message->from('dwiagus105@gmail.com','Dwi Agustianto');
        });
    }
     public function html_email(){
        $schools = School::all();
        $emailTo = 'dwiagus105@gmail.com';
        $subject = 'Email Verification';
        $receiverName = 'Dwi Agustianto';

        $emailFrom = 'dwiagus105@gmail.com';
        $senderName = 'School Team';

        $data = [
            'name'       => $receiverName, 
            'emailTo'    => $emailTo,
            'emailFrom'  => $emailFrom,
            'schools'    => $schools,
            'senderName' => $senderName,
        ];

        Mail::send('mail', $data, function($message) {
           $message->to('dwiagus105@gmail.com', 'Tutorials Point')->subject
              ('Email Verification');
           $message->from('dwiagus105@gmail.com','Dwi Agustianto');
        });
        echo "HTML Email Sent. Check your inbox.";
     }
     
     public function attachment_email(){
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
           $message->to('abc@gmail.com', 'Tutorials Point')->subject
              ('Laravel Testing Mail with Attachment');
           $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
           $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
           $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "Email Sent with attachment. Check your inbox.";
     }
}
