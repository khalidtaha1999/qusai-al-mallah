@extends('layouts.master')

@section('content')

    @include('layouts.header')


    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('frontend/img/about-header.jpg')}});">
            <div class="container position-relative d-flex flex-column align-items-center">

                <h2>{{__('general.aboutUs')}}</h2>
                <ol>
                    <li><a href="/{{Config::get('app.locale')}}">{{__('general.home')}}</a></li>
                    <li>{{' '}} {{__('general.aboutUs')}}</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4" data-aos="fade-up">
                    <div class="col-lg-4">
                        <img src="{{asset('storage/'.$aboutUs->image)}}" class="img-fluid mx-auto d-block" alt="">
                    </div>
                    <div class="col-lg-8">
                        <div class="content ps-lg-5">
                            {!! Config::get('app.locale')=='ar' ? $aboutUs->content_ar :$aboutUs->content_en !!}
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Why Choose Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>{{__('general.whyChooseUs')}}</h2>
                </div>

                @isset($whyChooseUs)
                    <div class="row g-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-xl-5 img-bg"
                             style="background-image: url({{asset('storage/'.$whyChooseUs->image)}})"></div>
                        <div class="col-xl-7 slides  position-relative">
                            <div class="slides-1 swiper">
                                <div class="swiper-wrapper">
                                    @foreach($whyChooseUs?->sliders as $slider)
                                        <div class="swiper-slide">
                                            <div class="item">
                                                {!! Config::get('app.locale')=='ar' ? $slider['content_ar'] : $slider['content_en'] !!}
                                            </div>
                                        </div><!-- End slide item -->
                                    @endforeach
                                </div>


                                <div class="swiper-pagination"></div>

                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </div>
                    </div>
                @endisset

            </div>
        </section><!-- End Why Choose Us Section -->


        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>{{__('general.ourTeam')}}</h2>

                </div>

                <div class="row gy-4">

                    @foreach($ourTeams as $ourTeam)
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member">
                                <div class="member-img">
                                    <img src="{{ asset('storage/' . $ourTeam->image) }}" class="img-fluid team-image" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>{{ Config::get('app.locale') == 'ar' ? $ourTeam->name_ar : $ourTeam->name_en }}</h4>
                                    <span>{{ $ourTeam->position }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->



    @include('layouts.footer')

@endsection
