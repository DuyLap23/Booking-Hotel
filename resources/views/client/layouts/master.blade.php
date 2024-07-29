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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
    {{-- <script src="{{ asset('themes/client/assets/js/vendor/particles.min.js') }}"></script> --}}
    <script src="{{ asset('themes/client/assets/js/vendor/app.js') }}"></script>

    <!-- Main-js -->
    <script src="{{ asset('themes/client/assets/js/main.js') }}"></script>
    @yield('section-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const particlesConfig = {
                particles: {
                    number: {
                        value: 80,
                        density: {
                            enable: true,
                            value_area: 800
                        }
                    },
                    color: {
                        value: "#ffffff"
                    },
                    shape: {
                        type: "circle"
                    },
                    opacity: {
                        value: 0.5,
                        random: false
                    },
                    size: {
                        value: 3,
                        random: true
                    },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: "#ffffff",
                        opacity: 0.4,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 6,
                        direction: "none",
                        random: false,
                        straight: false,
                        out_mode: "out",
                        bounce: false
                    }
                },
                interactivity: {
                    detect_on: "canvas",
                    events: {
                        onhover: {
                            enable: true,
                            mode: "repulse"
                        },
                        onclick: {
                            enable: true,
                            mode: "push"
                        }
                    },
                    modes: {
                        repulse: {
                            distance: 100,
                            duration: 0.4
                        },
                        push: {
                            particles_nb: 4
                        }
                    }
                },
                retina_detect: true
            };

            particlesJS('particles-js-1', particlesConfig);
            particlesJS('particles-js-2', particlesConfig);
            particlesJS('particles-js-3', particlesConfig);

            // Khởi tạo lại particles khi slide thay đổi
            $('#heroCarousel').on('slid.bs.carousel', function() {
                const activeSlide = this.querySelector('.active');
                const particlesId = activeSlide.querySelector('.particles-js').id;
                particlesJS(particlesId, particlesConfig);
            });
        });
        
    </script>
       <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html')}}-v22/luxurious-html')}}/index.html')}} by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 11:59:05 GMT -->

</html>
