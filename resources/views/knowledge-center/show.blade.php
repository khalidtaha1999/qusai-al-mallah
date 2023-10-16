@extends('layouts.master')

@section('content')

    @include('layouts.header')
    <div class=" breadcrumbs d-flex align-items-center mb-4"
         style="background-image: url({{asset('frontend/img/blog-header.jpg')}});">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>{{Config::get('app.locale')=='ar'?$knowledgeCenter->title_ar:$knowledgeCenter->title_en}}</h2>
            <ol>
                <li><a href="/{{Config::get('app.locale')}}/">{{__('general.home')}}</a></li>
                <li>{{' '}} {{Config::get('app.locale')=='ar'?$knowledgeCenter->title_ar:$knowledgeCenter->title_en}}</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <div class="container mb-4">
        <div class="row">
            @foreach($knowledgeCenter->files as $file)
            <div class="col-md-offset-3 col-md-6 mt-4">
                <div class="panel panel-default bootcards-file shadow-sm">
                    <div class="panel-heading">
                    </div>
                    <div class="list-group">
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading mt-4">
                                <a href="#">
                                    {{' '}} {{Config::get('app.locale')=='ar'?$file->title_ar:$file->title_en}}
                                </a>
                            </h4>
                        </div>
                        <div class="list-group-item">
                            <p class="list-group-item-text">This ebook covers the basics of creating a card-based UI with Bootcards. Bootcards is based on Bootstrap. It includes stylesheets to give your apps a native look, whether that's on iOS, Android or desktop.    </p>
                            <a href="{{'/download/'.$file->file}}" class="btn btn-default shadow-sm mb-4" style={{Config::get('app.locale')=='ar'?'float:left':'float:right'}}>
                                @if(Config::get('app.locale')=='ar')
                                تحميل
                                    <i class="fa-solid fa-download fa-lg"></i>
                                @else
                                    <i class="fa-solid fa-download fa-lg"></i>
                                    Download
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('layouts.footer')
@endsection
