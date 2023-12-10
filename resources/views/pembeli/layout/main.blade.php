<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }} - Cervelo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">



    <link rel="stylesheet" href="{{ asset('pembeli/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pembeli/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('pembeli/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pembeli/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pembeli/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('pembeli/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('pembeli/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('pembeli/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('pembeli/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('pembeli/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('pembeli/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('pembeli/css/style.css') }}">



    @yield('scripts')
</head>

<body class="goto-here">

    @if (session('success'))
        <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" />

        <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });

            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}",
            });
        </script>
    @endif

    @if (session('error'))
        <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" />

        <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });

            Toast.fire({
                icon: "error",
                title: "{{ session('error') }}",
            });
        </script>
    @endif

    @include('pembeli.partials.header')

    @yield('container')

    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Cervelo</h2>
                        <p>Cervélo Cycles is a Canadian manufacturer of racing and track bicycles.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}" class="py-2 d-block">Home</a></li>
                            <li><a href="{{ route('shop') }}" class="py-2 d-block">Shop</a></li>
                            <li><a href="{{ route('keranjang.index') }}" class="py-2 d-block">Cart</a></li>
                            <li><a href="{{ route('pembeli.pemesanan', auth()->id()) }}" class="py-2 d-block">Ordering</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Help</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                <li><a href="#" class="py-2 d-block">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Gifted School : Jl.
                                        Jaani Nasir, RT.5/RW.11, Cawang, Kec. Kramat jati, Daerah Khusus Ibukota Jakarta
                                        13630</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span
                                            class="text">+6281212001521</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@smkn64-jkt.sch.id</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This website made by
                        <a href="https://instagram.com/rabbzp_" target="_blank">Rafly</a>,
                        <a href="https://instagram.com/_mfttuhhf" target="_blank">Futtuh</a>, 
                        <a href="https://instagram.com/_.fchri" target="_blank">Fachri</a>, 
                        <a href="https://instagram.com/farhannms2" target="_blank">Farhan</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('pembeli/js/jquery.min.js') }}"></script>
    <script src="{{ asset('pembeli/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('pembeli/js/popper.min.js') }}"></script>
    <script src="{{ asset('pembeli/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('pembeli/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('pembeli/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('pembeli/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('pembeli/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('pembeli/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('pembeli/js/aos.js') }}"></script>
    <script src="{{ asset('pembeli/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('pembeli/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('pembeli/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('pembeli/js/google-map.js') }}"></script>
    <script src="{{ asset('pembeli/js/main.js') }}"></script>

</body>

</html>
