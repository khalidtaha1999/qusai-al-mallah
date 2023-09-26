<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    public function __invoke()
    {

        $ourTeams = OurTeam::select('image', 'position', 'name')->get();

        return view('our-team.index')->with(['ourTeams'=>$ourTeams]);
    }
}
