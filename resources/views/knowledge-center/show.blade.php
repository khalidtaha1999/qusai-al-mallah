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


    <div class="container mt-4 mb-4">
        <div class="row">
            <!-- First PDF -->

            @foreach($knowledgeCenter->files as $file)
                <div class="col-md-3">
                    <div class="card pdf-card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mt-4 p-2">{{' '}} {{Config::get('app.locale')=='ar'?$file->title_ar:$file->title_en}}</h5>
                        </div>
                        <div class="card-footer">
                            <a href="{{'/download/'.$file->file}}" class="btn btn-primary">
                                View <i class="fas fa-arrow-right ml-2 p-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Add more columns as needed -->
        </div>
    </div>


    @include('layouts.footer')
@endsection
