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
                <li><a href="services.html">Services</a></li>
                <li><a href="team.html">Team</a></li>
                <li><a href="blog.html">Blog</a></li>

                <li><a href="contact.html">Contact</a></li>

                <li class="dropdown "><a href="#" ><span><i class="lang fa-solid fa-globe fa-2xl"></i></span></a>
                    <ul>
                        <li><a href="{{LaravelLocalization::getLocalizedURL('ar')}}">العربية</a></li>
                        <li><a href="{{LaravelLocalization::getLocalizedURL('en')}}">English</a></li>
                    </ul>
                </li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
