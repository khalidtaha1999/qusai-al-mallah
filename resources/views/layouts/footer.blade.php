
<footer id="footer" class="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <!-- Column 1 (lg: 4 columns, md: 6 columns, sm: 12 columns) -->
                <div class="col-lg-4 col-md-6 col-sm-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <img src="{{asset('frontend/img/logo.png')}}">
                    </a>
                    @if(Config::get('app.locale')=='en')
                    <p>Qusai Al-Maliah Office for Administrative, Accounting and Tax Consultations was
                        established to be one of the leading distinguished offices in providing cloud advisory
                        services in the fields of zakat, taxes, accounting and administrative fields, which aims
                        to serve the business sector in the Kingdom of Saudi Arabia. United Arab Emirates and
                        Kuwait, by an advisory team led by Counselor Qusai Al-Maliah.</p>
                    @else
                        <p>
                            تــم تأســيس مكتــب قصــي الــملاح للاستشــارات الإداريــة والمحاســبية والضريبيــة ليكــون مــن
                            المكاتـب الاقليميـة الرائـدة والمتـميزة فـي تقديـم الخدمـات الاستشـارية السـحابية فـي مجـالات
                            الـزكاة والضرائـب والمجـالات المحاسـبية والإداريـة والتـي تهـدف إلـى خدمـة قطـاع الأعمـال فـي
                            المملكــة العربيــة الســعودية، الامــارات العربيــة المتحــدة ودولــة الكويــت، بواســطة فريــق
                            إستشاري متميز وبقيادة المستشار قصي الملاح.
                        </p>
                    @endif
                    <div class="social-links d-flex mt-3">
                        <a href="https://twitter.com/q_almallah" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/qusai-al-mallah-6b1841a1/" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <!-- Column 2 (lg: 4 columns, md: 6 columns, sm: 12 columns) -->
                <div class="col-lg-4 col-md-6 col-sm-12 footer-contact">
                    <h4>{{__('general.contactUs')}}</h4>
                    @php
                        $contact = \App\Models\AboutUs::select('email', 'location', 'phone')->first();
                    @endphp
                    <p>
                        <strong>{{__('general.location')}}:</strong>  {{$contact->location}} <br>
                        <strong>{{__('general.phone')}}:</strong> {{$contact->phone}}<br>
                        <strong>{{__('general.email')}}:</strong> {{$contact->email}}<br>
                    </p>
                </div>

                <!-- Column 3 (lg: 4 columns, md: 12 columns, sm: 12 columns) -->
                <div class="col-lg-4 col-md-6 col-sm-12 footer-links">
                    <h4>{{__('general.usefulLinks')}}</h4>
                    <ul class="grid-container">
                        @php
                            $usefulLinks = \App\Models\UsefulLinks::select('link', 'title_' . Config::get('app.locale'))->get();
                        @endphp
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
</footer><!-- End Footer -->
