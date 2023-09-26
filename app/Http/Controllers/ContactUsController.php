<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __invoke(){

        $aboutUs=AboutUs::select('email','phone','location')->first();
        return view('contact-us.index')->with(['aboutUs' => $aboutUs]);
    }
}
