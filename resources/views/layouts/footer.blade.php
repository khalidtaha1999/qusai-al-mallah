<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Nova</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex  mt-3">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>{{__('general.usefulLinks')}}</h4>
                    <ul>
                        <li><i class="bi bi-dash"></i> <a
                                href="/{{Config::get('app.locale')}}">{{__('general.home')}}</a></li>
                        <li><i class="bi bi-dash"></i> <a
                                href="/{{Config::get('app.locale')}}/about-us">{{__('general.aboutUs')}}</a></li>
                        <li><i class="bi bi-dash"></i> <a
                                href="/{{Config::get('app.locale')}}/services">{{__('general.services')}}</a></li>
                        <li><i class="bi bi-dash"></i> <a
                                href="/{{Config::get('app.locale')}}/our-team">{{__('general.ourTeam')}}</a></li>
                        <li><i class="bi bi-dash"></i> <a
                                href="/{{Config::get('app.locale')}}/blog">{{__('general.blog')}}</a></li>
                    </ul>
                </div>


                @php
                    $contact= \App\Models\AboutUs::select('email','location','phone')->first();
                @endphp
                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>{{__('general.contactUs')}}</h4>
                    <p>
                        {{$contact->location}} <br>
                        <strong>{{__('general.phone')}}:</strong> {{$contact->phone}}<br>
                        <strong>{{__('general.email')}}:</strong> {{$contact->email}}<br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Qusai Al Mallah</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
                Developed by <a href="https://www.linkedin.com/in/khalid-taha-556832210/">Khalid Taha</a>
            </div>
        </div>
    </div>
</footer><!-- End Footer --><!-- End Footer -->
