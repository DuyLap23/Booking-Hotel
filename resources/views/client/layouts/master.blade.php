<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html')}}-v22/luxurious-html')}}/index.html')}} by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 11:58:30 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Best Luxurious Hotel Booking Template.">
    <meta name="keywords"
        content="hotel, booking, business, restaurant, spa, resort, landing, agency, corporate, start up, site design, new business site, business template, professional template, classic, modern">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="icon" href="{{ asset('themes/client/assets/img/favicons/favicon.png') }}" type="image/x-icon">

    <!-- Css All Plugins Files -->
    <link rel="stylesheet" href="{{ asset('themes/client/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/client/assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/client/assets/css/vendor/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/client/assets/css/vendor/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/client/assets/css/vendor/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/client/assets/css/vendor/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/client/assets/css/vendor/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/client/assets/css/vendor/slick.min.css') }}">

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('themes/client/assets/css/style.css') }}">
    @yield('section-css')
</head>

<body>
  
    <!-- Overlay -->
    <div class="overlay"></div>
    <div class="lh-loader">
        <span class="loader"></span>
    </div>

    @include('client.layouts.header')

    <!-- banner -->
    <section class="section-hero">
        <div class="container-fulid">
            <div class="row hero-image">
                <div class="hero-section">
                    <div class="particles-bg" id="particles-js"></div>
                    <div class="lh-hero-contain container">
                        <h4 data-aos="fade-up" data-aos-duration="1000">Luxury Hotel & Best Resort</h4>
                        <h1 data-aos="fade-up" data-aos-duration="1500">A Symphony of Comfort & Convenience.</h1>
                        <a class="lh-buttons result-placeholder" href="#rooms">
                            Room & suites
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('client.search')

    <!-- Room -->
    @include('client.room')


    <!-- Amenities -->
    @include('client.amenities')

    <!-- Prices -->
    @include('client.price')

    <!-- Testimonials -->
    @include('client.testimonial')

    <!-- Blog -->
    @include('client.blog')
    @yield('content')
    <!-- Footer -->
    @include('client.layouts.footer')

    <!-- Tap to top -->
    <a href="#" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-double-line"></i>
    </a>



    <!-- Plugins JS -->
    <script src="{{ asset('themes/client/assets/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/client/assets/js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('themes/client/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/client/assets/js/vendor/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/client/assets/js/vendor/aos.js') }}"></script>
    <script src="{{ asset('themes/client/assets/js/vendor/semantic.min.js') }}"></script>
    <script src="{{ asset('themes/client/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('themes/client/assets/js/vendor/particles.min.js') }}"></script>
    <script src="{{ asset('themes/client/assets/js/vendor/app.js') }}"></script>

    <!-- Main-js -->
    <script src="{{ asset('themes/client/assets/js/main.js') }}"></script>
    @yield('section-js')
</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html')}}-v22/luxurious-html')}}/index.html')}} by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 11:59:05 GMT -->

</html>
