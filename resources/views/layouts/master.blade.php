<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Qusai Al Mallah</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset("frontend/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/vendor/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/vendor/aos/aos.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/vendor/glightbox/css/glightbox.min.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/vendor/swiper/swiper-bundle.min.css")}}" rel="stylesheet">
    <link href="{{asset("frontend/vendor/remixicon/remixicon.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <!-- Template Main CSS File -->
    <link href="{{asset("frontend/css/main.css")}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Nova
    * Updated: Aug 30 2023 with Bootstrap v5.3.1
    * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="page-index">
@if( Config::get('app.locale') =='ar')
    <style>
        body{
            direction: rtl;
            font-family: Alexandria, serif ;
        }
    </style>
@else
    <style>
        body{
            font-family: myriad pro, serif ;
        }
    </style>
@endif


@yield('content')

{{--@if(Config::get('app.locale')=='ar')--}}
{{--    <script type="text/javascript">--}}
{{--        var replaceDigits = function() {--}}
{{--            var map = ["٠","١","٢","٣","٤","٥","٦","٧","٨","٩"];--}}
{{--            var elements = document.body.getElementsByTagName("*");--}}

{{--            for (var i = 0; i < elements.length; i++) {--}}
{{--                var element = elements[i];--}}
{{--                for (var j = 0; j < element.childNodes.length; j++) {--}}
{{--                    var node = element.childNodes[j];--}}
{{--                    if (node.nodeType === 3) {--}}
{{--                        node.textContent = node.textContent.replace(/\d/g, function(match) {--}}
{{--                            return map[parseInt(match)];--}}
{{--                        });--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--        }--}}
{{--        window.onload = replaceDigits;--}}
{{--    </script>--}}
{{--@endif--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<!-- Vendor JS Files -->
<script src="{{asset("frontend/vendor/bootstrap/js/bofrontendotstrap.bundle.min.js")}}"></script>
<script src="{{asset("frontend/vendor/aos/aos.js")}}"></script>
<script src="{{asset("frontend/vendor/glightbox/js/glightbox.min.js")}}"></script>
<script src="{{asset("frontend/vendor/swiper/swiper-bundle.min.js")}}"></script>
<script src="{{asset("frontend/vendor/isotope-layout/isotope.pkgd.min.js")}}"></script>
<script src="{{asset("frontend/vendor/php-email-form/validate.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/fontawesome.min.js" integrity="sha512-64O4TSvYybbO2u06YzKDmZfLj/Tcr9+oorWhxzE3yDnmBRf7wvDgQweCzUf5pm2xYTgHMMyk5tW8kWU92JENng==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Template Main JS File -->
<script src="{{asset("frontend/js/main.js")}}"></script>

</body>





