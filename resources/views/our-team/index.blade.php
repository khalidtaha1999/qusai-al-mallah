@extends('layouts.master')

@section('content')

    @include('layouts.header')



    <main id="main">


        <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('frontend/img/team-header.jpg')}});">
            <div class="container position-relative d-flex flex-column align-items-center">

                <h2>{{__('general.ourTeam')}}</h2>
                <ol>
                    <li><a href="/{{Config::get('app.locale')}}/">{{__('general.home')}}</a></li>
                    <li>{{__('general.ourTeam')}}</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

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
                                <img src="{{asset('storage/'.$ourTeam->image)}}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>{{Config::get('app.locale')=='ar'?$ourTeam->name_ar:$ourTeam->name_en}}</h4>
                                <span>{{$ourTeam->position}}</span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach


            </div>

        </div>
    </section><!-- End Team Section -->

    </main>



    @include('layouts.footer')
@endsection
