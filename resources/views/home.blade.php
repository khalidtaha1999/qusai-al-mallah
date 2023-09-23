@extends('layouts.master')

@section('content')

    @include('layouts.header')

    <main id="main">


        <section id="hero" class="hero d-flex align-items-center">

        </section><!-- End Hero Section -->
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


        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>{{__('general.aboutUs')}}</h2>

                </div>

                <div class="row gy-4" data-aos="fade-up">
                    <div class="col-lg-4">
                        <img src="storage/{{$aboutUs->image}}" class="img-fluid mx-auto d-block" alt="">
                    </div>
                    <div class="col-lg-8">
                        <div class="content ps-lg-5">
                            {!! Config::get('app.locale')=='ar' ? $aboutUs->content_ar :$aboutUs->content_en !!}
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Our Services Section ======= -->
        <section id="services-list" class="services-list">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>{{__('general.ourServices')}}</h2>

                </div>

                <div class="row gy-5">

                    @foreach($services as $service)

                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">

                            <img class="img-fluid service-image " width="100px" src="storage/{{$service->image}}">


                            <div>
                                <h4 class="title"><a
                                        class="stretched-link">{{Config::get('app.locale')=='ar'?$service->title_ar:$service->title_en}}</a>
                                </h4>
                                <p class="description">{{Config::get('app.locale')=='ar'?$service->content_ar:$service->content_en}}</p>
                            </div>
                        </div><!-- End Service Item -->

                    @endforeach


                </div>

            </div>
        </section><!-- End Our Services Section -->


        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-posts" class="recent-posts">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>{{__('general.recentBlogPosts')}}</h2>

                </div>

                <div class="row gy-5">

                    @foreach($blogs as $blog)


                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="post-box">
                                <div class="post-img"><img src="storage/{{$blog->image}}" class="img-fluid" alt="">
                                </div>
                                <div class="meta">
                                    <span class="post-date">{{ \Carbon\Carbon::parse($blog->created_at)->format('j-F-Y') }}</span>
                                </div>
                                <h3 class="post-title">{{Config::get('app.locale')=='ar'?$blog->title_ar:$blog->title_en}}</h3>
                                <p>{{Config::get('app.locale')=='ar'?$blog->brief_ar:$blog->brief_en}}</p>
                                <a href="/{{Config::get('app.locale')}}/blogs/{{$blog->slug}}"
                                   class="readmore stretched-link"><span>{{__('general.readMore')}}</span>
                                    @if(Config::get('app.locale')=='ar')
                                    <i class="bi bi-arrow-left"></i>
                                @else
                                        <i class="bi bi-arrow-right"></i>

                                    @endif
                                </a>

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </section><!-- End Recent Blog Posts Section -->
    </main><!-- End #main -->
    @include('layouts.footer')

@endsection

