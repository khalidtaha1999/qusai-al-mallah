<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ServiceController extends Controller
{
    public function __invoke(){
        $services = Service::select('image', 'title_' . Config::get('app.locale'), 'content_' . Config::get('app.locale'))->simplePaginate(10);
        return view('service.index')->with(['services'=>$services]);

    }
}
