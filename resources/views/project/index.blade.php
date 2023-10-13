@extends('layouts.master')

@section('content')

    @include('layouts.header')

    <div class=" breadcrumbs d-flex align-items-center"
         style="background-image: url({{asset('frontend/img/blog-header.jpg')}});">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>{{__('general.blog')}}</h2>
            <ol>
                <li><a href="/{{Config::get('app.locale')}}/">{{__('general.home')}}</a></li>
                <li>{{__('general.blog')}}</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container project-container">
        <div class="row">
            @foreach($projects as $project)
                <div class="col-sm-4 rounded-top mt-4 mb-4">
                    <div class="card project-image-index shadow-lg ">
                        <a style="text-decoration: none; color: black" href="/projects/{{$project->slug}}">
                            <div class="card-body project-card-body text-center">
                                <img src="{{asset('storage/'.$project->image)}}" class="card-img-top" alt="Image 1">
                                <h5 class="card-title">{{$project->title_en}}</h5>
                            </div>
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="blog-pagination text-center mb-4">

        {{$projects->links()}}

    </div><!-- End blog pagination -->


    @include('layouts.footer')
@endsection
