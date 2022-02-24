<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class PageController extends Controller
{
    // About Us
    function aboutus(){
        return view('aboutus');
    }

    // Contact Us Form
    function contactus(){
        return view('contactus');
    }

    // Save Contact Us Form
    function save_contactus(Request $request){
        $request->validate([
            'full_name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'msg'=>'required',
        ]);

        $data = array(
            'name'=>$request->full_name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'msg'=>$request->msg,
        );

        Mail::send('mail', $data, function($message){
            $message->to('yourbookings72@gmail.com', 'Hasan')->subject('Contact Us Query');
            
        });

        return redirect('/contactus')->with('success','Mail has been sent.');
    }
}
