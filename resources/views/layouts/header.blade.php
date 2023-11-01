<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center mobile_nav justify-content-between" >


        <a href="/{{Config::get('app.locale')}}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{asset('frontend/img/header_logo.png')}}"   alt="">

            <span class="text-white small mr-2 logo-dis-login">QUSAI AL MALLAH CONSULTING OFFICE<br><span>Accounting, administrative & Tax</span></span>

        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/{{Config::get('app.locale')}}" class="active">{{__('general.home')}}</a></li>
                <li><a href="/{{Config::get('app.locale')}}/about-us">{{__('general.aboutUs')}}</a></li>
                <li><a href="/{{Config::get('app.locale')}}/services">{{__('general.services')}}</a></li>
                <li><a href="/{{Config::get('app.locale')}}/our-team">{{__('general.ourTeam')}}</a></li>
                <li><a href="/{{Config::get('app.locale')}}/blog">{{__('general.blog')}}</a></li>
                <li><a href="/{{Config::get('app.locale')}}/knowledge-center">{{__('general.knowledgeCenter')}}</a></li>
                <li><a href="/{{Config::get('app.locale')}}/contact-us">{{__('general.contactUs')}}</a></li>
                <li>
                    <a href="{{Config::get('app.locale')=='en'?LaravelLocalization::getLocalizedURL('ar'):LaravelLocalization::getLocalizedURL('en')}}">
                        <i class="fa-solid fa-globe fa-2xl" style=" color: #f4f5f6;font-size: 18px"></i>
                    </a>
                </li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
