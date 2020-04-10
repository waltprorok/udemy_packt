<?php

namespace App\Http\Controllers;

use App\Mail\ContactFrom;
use Illuminate\Http\Request;
use Mail;

class PageController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ]);

        Mail::to('admin@domain.com')->send(new ContactFrom($request));

//        redirect('/contact')->with('success', 'The email was sent successfully');
    }
}
