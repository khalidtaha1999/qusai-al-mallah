<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Service;
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
        $aboutUs=AboutUs::select('image','content_'.Config::get('app.locale'))->first();
        $services=Service::select('image','title_'.Config::get('app.locale'),'content_'.Config::get('app.locale'))->limit(6)->get();
        $blogs= Blog::select('id','slug','image','title_'.Config::get('app.locale'),'brief_'.Config::get('app.locale'),'created_at')->limit(4)->get();


     return view('home')->with(['aboutUs'=>$aboutUs,'services'=>$services,'blogs'=>$blogs]);
    }
}
