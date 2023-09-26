@extends('layouts.master')

@section('content')

    @include('layouts.header')



    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('frontend/img/blog-header.jpg')}});">
            <div class="container position-relative d-flex flex-column align-items-center">

                <h2>{{__('general.blog')}}</h2>
                <ol>
                    <li><a href="/{{Config::get('app.locale')}}/">{{__('general.home')}}</a></li>
                    <li>{{__('general.blog')}}</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row g-5">

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                        <div class="row gy-5 posts-list">

                            @foreach($blogs as $blog)
                            <div class="col-lg-6">
                                <a href="/{{Config::get('app.locale')}}/blog/{{$blog->slug}}">
                                <article class="d-flex flex-column">

                                    <div class="post-img">
                                        <img src="{{asset('storage/'.$blog->image)}}" alt="" class="img-fluid">
                                    </div>
                                    <h2 class="title">
                                        <a >{{Config::get('app.locale')=='ar'?$blog->title_ar:$blog->title_en}}</a>
                                    </h2>
                                    <div class="meta-top">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time >{{ \Carbon\Carbon::parse($blog->created_at)->format('j-F-Y') }}</time></a></li>
                                        </ul>
                                    </div>

                                    <div class="content">
                                        <p>
                                            {{Config::get('app.locale')=='ar'?$blog->brief_ar:$blog->brief_en}}
                                        </p>
                                    </div>

                                    <div class="read-more mt-auto align-self-end">
                                        <a href="/{{Config::get('app.locale')}}/blog/{{$blog->slug}}">{{__('general.readMore')}}
                                            @if(Config::get('app.locale')=='ar')
                                                <i class="bi bi-arrow-left"></i>
                                            @else
                                                <i class="bi bi-arrow-right"></i>
                                            @endif
                                        </a>
                                    </div>

                                </article>
                                </a>
                            </div><!-- End post list item -->

                            @endforeach



                        </div><!-- End blog posts list -->
                        <div class="blog-pagination text-center">

                                {{$blogs->links()}}

                        </div><!-- End blog pagination -->

                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

                        <div class="sidebar ps-lg-4">

                            <div class="sidebar-item search-form">
                                <h3 class="sidebar-title">Search</h3>
                                <form action="" class="mt-3">
                                    <input type="text" name="title">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->


                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Recent Posts</h3>
                                <div class="mt-3">
                                    @foreach($recentBlogs as $blog)
                                        <a href="/{{Config::get('app.locale')}}/blog/{{$blog->slug}}">
                                        <div class="post-item mt-3">
                                        <img src="{{asset('storage/'.$blog->image)}}"  alt="" class="flex-shrink-0 img-fluid" style="    padding-left: 5px;">
                                        <div>
                                            <h4><a href="/{{Config::get('app.locale')}}/blog/{{$blog->slug}}">{{Config::get('app.locale')=='ar'?$blog->title_ar:$blog->title_en}}</a></h4>
                                            <time datetime="2020-01-01">{{ \Carbon\Carbon::parse($blog->created_at)->format('j-F-Y') }}</time>
                                        </div>
                                    </div><!-- End recent post item-->
                                    </a>
                                    @endforeach

                                </div>

                            </div><!-- End sidebar recent posts-->


                        </div><!-- End Blog Sidebar -->

                    </div>

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->



    @include('layouts.footer')
@endsection
