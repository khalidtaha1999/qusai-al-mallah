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
                                <img class="img-fluid service-image" width="100px" src="storage/{{$service->image}}">
                                <h4 class="title"><a class="stretched-link">{{Config::get('app.locale')=='ar'?$service->title_ar:$service->title_en}}</a></h4>
                                <p class="description">{{Config::get('app.locale')=='ar'?$service->content_ar:$service->content_en}}</p>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>
            </div>
        </section><!-- End Our Services Section -->


        <div class="container">
            <div class="section-header">
                <h2>{{__('general.technicalSystems')}}</h2>
            </div>
            <div class="row">
                @foreach($technicalSystems as $key => $technical)
                    @if($key % 3 == 0)
            </div> <!-- Close the previous row -->
            <div class="row justify-content-center"> <!-- Start a new centered row -->
                @endif
                <div class="col-md-4
                @if(Config::get('app.locale')=='ar')
                column-border_ar
                border-bottom-small_ar
                @else
                border-bottom-small
                  column-border
                @endif
                 text-center ">
                    <div>
                        <h5 class="card-title text-center mb-4">{{Config::get('app.locale')=='ar'?$technical->title_ar:$technical->title_en}}</h5>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach($technical->images as $image)
                                    <div class="col-md-4 mb-3  ">
                                        <img src="{{'storage/'.$image}}"
                                             class=" card-img-top technicalImage rounded img-fluid" alt="Image 1">
                                    </div>
                                @endforeach
                                <!-- Add more columns as needed -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <section id="services-list" class="services-list">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2 class="mb-5">{{__('general.alliances')}}</h2>
                </div>
                <div class="row gy-5 ">
                    @foreach($alliances as $key => $alliance)
                        @if($key % 3 == 0)
                </div> <!-- Close the previous row -->
                <div class="row justify-content-center"> <!-- Start a new centered row -->
                    @endif
                    <div class="col-lg-4 col-md-6 service-item d-flex mb-5" data-aos="fade-up" data-aos-delay="600">
                        <img class="img-fluid alliance-image" width="100px" src="storage/{{$alliance->image}}">
                        <div>
                            <h4 class="title alliance-title"><a
                                    class="stretched-link">{{Config::get('app.locale')=='ar'?$alliance->title_ar:$alliance->title_en}}</a>
                            </h4>
                            <p class="description">{{Config::get('app.locale')=='ar'?$alliance->content_ar:$alliance->content_en}}</p>
                        </div>
                    </div><!-- End Service Item -->
                    @endforeach
                </div>
            </div>
        </section><!-- End Our Services Section -->


        <div class="container mb-4" style="direction: ltr">
            <div class="row">
                <div class="col-12">
                    <div class="section-header">
                        <h2>{{__('general.projects')}}</h2>
                    </div>
                    <div class="owl-carousel owl-theme" id="project">
                        @foreach($projects as $project)
                            <a style="text-decoration: none; color: black"
                               href="/{{Config::get('app.locale')}}/projects/{{$project->slug}}">
                                <div class="item image-opacity" id="projectImages">
                                    <img src="storage/{{$project->image}}" alt="Logo 1">
                                    <br>
                                    <p class="text-center">{{Config::get('app.locale')=='ar'?$project->title_ar:$project->title_en}}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4 "><a href="{{Config::get('app.locale').'/projects'}}"
                                          class="btn btn-outline-primary "
                                          style="text-decoration:none">{{__('general.showAllProjects')}}</a></div>

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-posts" class="recent-posts">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>{{__('general.recentBlogPosts')}}</h2>
                </div>
                <div class="row gy-5 justify-content-center">
                    @foreach($blogs as $blog)
                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <a href="/{{Config::get('app.locale')}}/blog/{{$blog->slug}}">
                                <div class="post-box">
                                    <div class="post-img"><img src="storage/{{$blog->image}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="meta">
                                        <span
                                            class="post-date">{{ \Carbon\Carbon::parse($blog->created_at)->format('j-F-Y') }}</span>
                                    </div>
                                    <h3 class="post-title">{{Config::get('app.locale')=='ar'?$blog->title_ar:$blog->title_en}}</h3>
                                    <p>{{Config::get('app.locale')=='ar'?$blog->brief_ar:$blog->brief_en}}</p>
                                    <div class="readmore-wrapper ">
                                        <div style="height:55px !important;" class="align-bottom d-table-cell">
                                            <a href="/{{Config::get('app.locale')}}/blog/{{$blog->slug}}"
                                               class="readmore stretched-link">
                                                <span>{{__('general.readMore')}}</span>
                                                @if(Config::get('app.locale')=='ar')
                                                    <i class="bi bi-arrow-left"></i>
                                                @else
                                                    <i class="bi bi-arrow-right"></i>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Recent Blog Posts Section -->


        <div class="container" style="direction: ltr">
            <div class="row">
                <div class="col-12">
                    <div class="section-header">
                        <h2>{{__('general.ourCustomers')}}</h2>
                    </div>
                    <div class="owl-carousel owl-theme" id="ourCustomers">
                        @foreach($ourCustomers as $customer)
                            <div class="item" id="customerImages"><img src="storage/{{$customer->image}}" alt="Logo 1">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->
    @include('layouts.footer')

@endsection

