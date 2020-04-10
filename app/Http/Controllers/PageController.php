<?php

namespace App\Http\Controllers;

use App\Mail\ContactFrom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'message' => 'required|min:3',
        ]);

        Mail::to('admin@domain.com')->send(new ContactFrom($request));
        return redirect()->route('contact')->with('success', 'The email was sent successfully');
    }
}
