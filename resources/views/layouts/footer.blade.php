<footer id="footer" class="footer">
    <div class="footer-content">
        <div class="container">
            <div class="col">
                @php
                    $contact = \App\Models\AboutUs::select('email', 'location', 'phone','phone2')->first();
                @endphp
                <div class="row">

                    <div class="col-md-2">
                        <h4>{{__('general.contactUs')}}</h4>
                    </div>

                    <div class="col-md-2">
                        <p>
                            <strong>{{__('general.location')}}:</strong> {{$contact?->location}}
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p>
                            <strong>{{__('general.phone')}}:</strong> {{$contact?->phone}}
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p>
                            <strong>{{__('general.phone')}}:</strong> {{$contact?->phone2}}
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p>
                            <strong>{{__('general.email')}}:</strong> {{$contact?->email}}
                        </p>

                    </div>
                    <div class="col-md-2">
                        <div class="social-links d-flex">
                            <a href="https://twitter.com/q_almallah" class="twitter"><i class="bi bi-twitter"></i></a>

                            <a href="https://wa.me/966595447669" class="facebook"><i class="fa-brands fa-whatsapp"></i></a>

                            <a href="https://www.linkedin.com/in/qusai-al-mallah-6b1841a1/" class="linkedin"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>
                    </div>


                </div>

                <!-- Column 1 (lg: 4 columns, md: 6 columns, sm: 12 columns) -->
                <div class="col-lg-4 col-md-6 col-sm-12 footer-info">

                </div>

                <!-- Column 2 (lg: 4 columns, md: 6 columns, sm: 12 columns) -->


                <!-- Column 3 (lg: 4 columns, md: 12 columns, sm: 12 columns) -->
                <div class="col-lg-12 footer-links">
                    <h4>{{__('general.usefulLinks')}}</h4>
                    <ul class="grid-container">
                        @php
                            $usefulLinks = \App\Models\UsefulLinks::select('link', 'title_' . Config::get('app.locale'))->get();
                        @endphp
                        @foreach($usefulLinks as $link)
                            <li><i class="bi bi-dash"></i> <a href="{{$link->link}}"
                                                              target="_blank">{{Config::get('app.locale')=='ar' ?$link->title_ar:$link->title_en}}</a>
                            </li>
                        @endforeach
                    </ul>
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
</footer><!-- End Footer -->
