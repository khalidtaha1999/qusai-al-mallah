

@extends('layouts.master')

@section('content')

    @include('layouts.header')


<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('frontend/img/contact-header.jpg')}});">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>{{__('general.contactUs')}}</h2>
            <ol>
                <li><a href="/{{Config::get('app.locale')}}/">{{__('general.home')}}</a></li>
                <li>{{__('general.contactUs')}}</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container position-relative" data-aos="fade-up">

            <div class="row gy-4 d-flex justify-content-end">

                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">

                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>{{__('general.location')}}:</h4>
                            <p>{{$aboutUs->location}}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>{{__('general.email')}}:</h4>
                            <a href="mailto:"{{$aboutUs->email}}>{{$aboutUs->email}}</a>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>{{__('general.phone')}}:</h4>
                            <a href="tel:"{{$aboutUs->phone}}>{{$aboutUs->phone}}</a>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="{{__('general.name')}}" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="{{__('general.email')}}" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="{{__('general.subject')}}" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="{{__('general.message')}}" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">{{__('general.send')}}</button></div>
                    </form>

                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->
<div class="text-center">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3363.096639152231!2d35.862559999999995!3d32.550266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21f6da0b6725e46d%3A0x3bec5cfa27d1c53b!2sQusai%20Al%20Mallah%20Consulting%20Office!5e0!3m2!1sen!2ssa!4v1696682899270!5m2!1sen!2ssa"        width="100%"
        height="450"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
</main><!-- End #main -->
    @include('layouts.footer')
@endsection
