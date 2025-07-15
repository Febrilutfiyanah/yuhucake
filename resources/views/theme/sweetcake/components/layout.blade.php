<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Toko Online">
    <meta name="author" content="Sunny Go Team">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>@yield('title', 'Hexashop')</title>

    <!-- CSS Hexashop -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/' . $themeFolder . '/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/' . $themeFolder . '/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/' . $themeFolder . '/assets/css/templatemo-hexashop.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/' . $themeFolder . '/assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/' . $themeFolder . '/assets/css/lightbox.css') }}">

    <!-- CSS Khusus YuhuCake -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff8f3;
            color: #5d4037;
        }

        .bg-brown-light {
            background-color: #fbeee0 !important;
        }

        .text-brown-dark {
            color: #5d4037 !important;
        }

        .text-brown {
            color: #8d6e63 !important;
        }

        .hover-opacity-100 {
            opacity: 1 !important;
        }

        .hover-content {
            transition: 0.3s ease-in-out;
            opacity: 0;
        }

        .thumb:hover .hover-content {
            opacity: 1;
        }

        .item img {
            transition: transform 0.3s ease;
        }

        .item:hover img {
            transform: scale(1.03);
        }

        .stars i {
            color: #ffc107;
        }

        .item {
            margin: 15px;
            border-radius: 12px;
        }

        .section-heading h2 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        footer {
            background-color: #4e342e;
            color: #f5f5f5;
        }

        footer a {
            color: #d7ccc8;
        }

        footer a:hover {
            color: #ffcc80;
        }

        footer h4 {
            color: #ffe0b2;
        }

        .under-footer {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 30px;
        }

        .social-icons li {
            display: inline-block;
            margin: 0 10px;
        }

        .social-icons li a {
            color: #ffe0b2;
            font-size: 18px;
        }

        .social-icons li a:hover {
            color: #fff;
        }
    </style>

    @stack('styles')
</head>
<body>

    <!-- Preloader -->
    <div id="preloader">
        <div class="jumper">
            <div></div><div></div><div></div>
        </div>
    </div>

    <!-- Navbar -->
    @includeIf('theme.' . $themeFolder . '.components.navbar')

    <!-- Konten Utama -->
    @yield('content')

    <!-- Footer -->
    @includeIf('theme.' . $themeFolder . '.components.footer')

    <!-- JS Hexashop -->
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/jquery-2.1.0.min.js') }}"></script>
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/popper.js') }}"></script>
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/accordions.js') }}"></script>
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/imgfix.min.js') }}"></script> 
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/slick.js') }}"></script> 
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/lightbox.js') }}"></script> 
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/isotope.js') }}"></script> 
    <script src="{{ asset('theme/' . $themeFolder . '/assets/js/custom.js') }}"></script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function(){
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);
            });
        });
    </script>

    @stack('scripts')

</body>
</html>
