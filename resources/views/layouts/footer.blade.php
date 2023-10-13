<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span>Nova</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-3">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                @php
                    $contact = \App\Models\AboutUs::select('email', 'location', 'phone')->first();
                @endphp
                <div class="col-lg-4 col-md-12 footer-contact text-center ">
                    <h4>{{__('general.contactUs')}}</h4>
                    <p>
                        {{$contact->location}} <br>
                        <strong>{{__('general.phone')}}:</strong> {{$contact->phone}}<br>
                        <strong>{{__('general.email')}}:</strong> {{$contact->email}}<br>
                    </p>
                </div>

                @php
                    $usefulLinks = \App\Models\UsefulLinks::select('link', 'title_' . Config::get('app.locale'))->get();
                @endphp
                <div class="col-lg-4 col-12 footer-links">
                    <h4>{{__('general.usefulLinks')}}</h4>
                    <ul class="grid-container">
                        @foreach($usefulLinks as $link)
                            <li><i class="bi bi-dash"></i> <a href="{{$link->link}}"
                                                              target="_blank">{{Config::get('app.locale')=='ar' ?$link->title_ar:$link->title_en}}</a></li>
                        @endforeach
                    </ul>
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
