@extends('layouts.master')

@section('content')

    @include('layouts.header')



    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
             style="background-image: url({{asset('frontend/img/services-header.jpg')}}">
            <div class="container position-relative d-flex flex-column align-items-center">

                <h2>{{__('general.ourServices')}}</h2>
                <ol>
                    <li><a href="/{{Config::get('app.locale')}}/">{{__('general.home')}}</a></li>
                    <li>{{' '}}{{__('general.ourServices')}}</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Our Services Section ======= -->
            <section id="services-list" class="services-list">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <h2>{{__('general.ourServices')}}</h2>
                    </div>
                    <div class="row gy-5">
                        @foreach($services as $service)
                            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
                                <div class="service-content">
                                    <img class="img-fluid service-image " width="100px"
                                         src="{{asset('storage/'.$service->image)}}">
                                    <h4 class="title"><a class="stretched-link">{{Config::get('app.locale')=='ar'?$service->title_ar:$service->title_en}}</a></h4>
                                    <p class="description" style="{{Config::get('app.locale')=='ar'?'text-align: right':'text-align: left'}}">{{Config::get('app.locale')=='ar'?$service->content_ar:$service->content_en}}</p>
                                </div>
                            </div><!-- End Service Item -->
                        @endforeach
                    </div>
                </div>

            <div class="blog-pagination text-center">

                {{$services->links()}}

            </div><!-- End blog pagination -->
        </section><!-- End Our Services Section -->
    </main><!-- End #main -->

    @include('layouts.footer')
@endsection
