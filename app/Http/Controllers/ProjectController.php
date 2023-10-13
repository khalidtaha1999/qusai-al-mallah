<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::select('slug', 'image', 'title_' . Config::get('app.locale'))->simplePaginate(10);

        return view('project.index')->with(['projects' => $projects]);
    }


    public function show($slug)
    {
        $project = Project::select('slug', 'image', 'content_en', 'content_ar', 'title_' . Config::get('app.locale'))->where('slug', '=', $slug)->first();
        return view('project.show')->with(['project' => $project]);
    }
}
