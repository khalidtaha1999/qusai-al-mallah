@extends('layouts.master')

@section('content')

    @include('layouts.header')

    <div class=" breadcrumbs d-flex align-items-center"
         style="background-image: url({{asset('frontend/img/KnowledgeCenter.png')}});">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>{{__('general.knowledgeCenter')}}</h2>
            <ol>
                <li><a href="/{{Config::get('app.locale')}}/">{{__('general.home')}}</a></li>
                <li>{{' '}} {{__('general.knowledgeCenter')}}</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container project-container">
        <div class="row">
            @foreach($knowledgeCenters as $knowledgeCenter)
                <div class="col-sm-4 rounded-top mt-4 mb-4">
                    <div class="card project-image-index shadow-lg ">
                        <a style="text-decoration: none; color: black"
                           href="/knowledge-center/{{$knowledgeCenter->id}}">
                            <div class="card-body project-card-body text-center">
                                <img src="{{asset('storage/'.$knowledgeCenter->image)}}" class="card-img-top"
                                     alt="Image 1">
                                <h5 class="card-title">{{$knowledgeCenter->title_en}}</h5>
                            </div>
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="blog-pagination text-center mb-4">

        {{$knowledgeCenters->links()}}

    </div><!-- End blog pagination -->


    @include('layouts.footer')
@endsection
