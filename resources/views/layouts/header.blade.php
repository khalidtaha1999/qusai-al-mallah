<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="d-flex align-items-center">Nova</h1>
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

                <li><a href="/{{Config::get('app.locale')}}/contact-us">{{__('general.contactUs')}}</a></li>

                @if(Config::get('app.locale')=='en')
                    <li><a href="{{LaravelLocalization::getLocalizedURL('ar')}}">Ar</a></li>
                @else
                    <li><a href="{{LaravelLocalization::getLocalizedURL('en')}}">En</a></li>
                @endif
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
