<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class OurTeamController extends Controller
{
    public function __invoke()
    {

        $ourTeams = OurTeam::select('image', 'position', 'name_'.Config::get('app.locale'))->get();

        return view('our-team.index')->with(['ourTeams'=>$ourTeams]);
    }
}
