<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AboutUsController extends Controller
{
    public function __invoke()
    {

        $aboutUs=AboutUs::select('image','content_'.Config::get('app.locale'))->first();
        $ourTeams=OurTeam::select('image','position','name')->get();

        return view('about-us.index')->with(['aboutUs'=>$aboutUs,'ourTeams'=>$ourTeams]);
    }
}
