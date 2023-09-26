<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Create the initial query builder without applying pagination yet
        $query = Blog::select('slug', 'image', 'title_' . Config::get('app.locale'), 'brief_' . Config::get('app.locale'), 'created_at');

        // Apply search filter if the title is provided
        if (!empty($request->title)) {
            $query->where('title_'.Config::get('app.locale'), 'LIKE', '%' . $request->title . '%');
        }

        // Paginate the results
        $blogs = $query->simplePaginate(10);

        // Retrieve recent blogs
        $recentBlogs = Blog::select('slug', 'image', 'title_' . Config::get('app.locale'), 'created_at')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return view('blog.index')->with(['blogs' => $blogs, 'recentBlogs' => $recentBlogs]);
    }

    public function show($slug)
    {
        $blog=Blog::where('slug',$slug)->first();
        if (!$blog){
            abort(404);
        }
        return view('blog.show')->with(['blog'=>$blog]);
    }
}
