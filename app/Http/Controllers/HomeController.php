<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Alliance;
use App\Models\Blog;
use App\Models\OurCustomers;
use App\Models\Project;
use App\Models\Service;
use App\Models\TechnicalSystem;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $aboutUs = AboutUs::select('image', 'content_' . Config::get('app.locale'))->first();
        $services = Service::select('image', 'title_' . Config::get('app.locale'), 'content_' . Config::get('app.locale'))->limit(6)->get();
        $blogs = Blog::select('id', 'slug', 'image', 'title_' . Config::get('app.locale'), 'brief_' . Config::get('app.locale'), 'created_at')->where('status', 1)->limit(4)->get();
        $whyChooseUs = WhyChooseUs::first();
        $ourCustomers = OurCustomers::select('image')->get();
        $alliances = Alliance::get();
        $technicalSystems = TechnicalSystem::get();
        $projects = Project::select('slug', 'image', 'title_' . Config::get('app.locale'))->where('status',1)->limit(10)->get();

        return view('home')->with([
            'aboutUs' => $aboutUs,
            'services' => $services,
            'blogs' => $blogs,
            'whyChooseUs' => $whyChooseUs,
            'ourCustomers' => $ourCustomers,
            'alliances' => $alliances,
            'technicalSystems' => $technicalSystems,
            'projects' => $projects
        ]);
    }
}
