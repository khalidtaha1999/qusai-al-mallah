
@extends('layouts.master')

@section('content')

    @include('layouts.header')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center">

                <h2>{{__('general.projectDetails')}}</h2>
                <ol>
                    <li><a href="/{{Config::get('app.locale')}}/">{{__('general.home')}}</a></li>
                    <li>{{' '}} {{__('general.projectDetails')}}</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Details Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row g-5 justify-content-center">

                    <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="200">

                        <article class="blog-details">

                            <div class="post-img text-center">
                                <img src="{{asset('storage/'.$project->image)}}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{Config::get('app.locale')=='ar'?$project->title_ar:$project->title_en}}</h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a ><time datetime="2020-01-01">{{ \Carbon\Carbon::parse($project->created_at)->format('j-F-Y') }}</time></a></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! Config::get('app.locale')=='ar'?$project->content_ar:$project->content_en !!}
                            </div><!-- End post content -->


                        </article><!-- End blog post -->

                    </div>

                </div>

            </div>
        </section><!-- End Blog Details Section -->

    </main><!-- End #main -->





    @include('layouts.footer')
@endsection
