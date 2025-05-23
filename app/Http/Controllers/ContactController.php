<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('front.contact');
    }

    public function store(Request $request)
    {

        \Mail::send('mail.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function ($message) {
                $message->from('ilunch@uowm.gr');
                $message->to('mdasyg@ieee.org', 'Admin')->subject('Website Feedback');
            });

        return \Redirect::route('front.contact')->with('message', 'Thanks for contacting us!');
    }
}
