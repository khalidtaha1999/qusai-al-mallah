<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);




        // Send the email
      Mail::to('qusai@almallah-cloud.com')->send(new ContactMail($request->all()));

        // You can customize the response as per your needs
        return  trans('general.message_sent');
    }
}
