<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Goporodisa</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/gop.png')}}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <script src="{{asset('assets/js/axioa.js')}}"></script>

    <link href="{{asset('/css/all.css')}}" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="{{URL('/')}}"><span>Goporodisa</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="search-box">
                        <form action="{{URL('ka_pencarian/pencarian/')}}" method="get">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="search">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary" style="border-top-right-radius: 2px; border-bottom-right-radius: 2px;"><i class="icofont-ui-search m-2"></i></button>
                                </div>
                            </div>
                        </form>
                    </li>
                    <!-- <li class="get-started"><a id="search" class="search"><i class="icofont-ui-search"></i> <span>PENCARIAN</span></a> -->
                    </li>
                    <li class="drop-down"><a href="">Kategori</a>
                        <ul>
                            <?php
                                $kesehatan = encrypt('4');
                            ?>
                            <li><a href="{{URL('ka_halaman/kategori/'.$kesehatan)}}">Kesehatan</a></li>
                            <?php
                                $pakaian_wanita = encrypt('1');
                            ?>
                            <li><a href="{{URL('ka_halaman/kategori/'.$pakaian_wanita)}}">Pakaian Wanita</a></li>
                            <?php
                                $pakaian_pria = encrypt('2');
                            ?>
                            <li><a href="{{URL('ka_halaman/kategori/'.$pakaian_pria)}}">Pakaian Pria</a></li>
                            <?php
                                $elektronik = encrypt('5');
                            ?>
                            <li><a href="{{URL('ka_halaman/kategori/'.$elektronik)}}">Elektronik</a></li>
                            <?php
                                $buku = encrypt('17');
                            ?>
                            <li><a href="{{URL('ka_halaman/kategori/'.$buku)}}">Buku & Alat Tulis</a></li>
                        </ul>
                    </li>
                    <li id="keranjang"><a href="{{URL('/ka_keranjang/keranjang')}}"><i class="fas fa-shopping-bag fa-lg"
                                title="Keranjang Belanja"></i><span>Keranjang</span></a>
                    </li>
                    <li id="pemberitahuan"><a href="{{URL('ka_halaman/pemberitahuan')}}"><i
                                class="fas fa-bell fa-lg"></i><span>Pemberitahuan</span></a></li>
                    <li class="ml-3 pt-1 hide-menu"> | </li>
                    <li>
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/home') }}">
                            <!-- Beranda -->
                            <!-- <i class="fas fa-home fa-lg text-secondary"></i> -->
                            <img src="{{asset('assets/img/shipping.png')}}" alt="" srcset=""
                                style="width: 40px; margin-left: -1px; margin-top: -9px;">
                        </a>
                        <!-- <ul>
                            <li><a href="{{URL('/home')}}">Profil</a></li>
                            <li><a href="#">Riwayat Transaksi</a></li>
                            <li><a href="#">Keluar</a></li>
                        </ul> -->
                        @else
                        <a href="{{ route('login') }}"><span style="padding-right: 30px; color: #3498db;"><i
                                    class="fas fa-lock mr-1" style="font-size: 18px;" id="lock"></i> Login</span></a>

                        <!-- @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                        @endif -->
                        @endauth
        </div>
        @endif
        </li>
        </ul>
        </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" style="position: relative; bottom: 0; width: 100%;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>Goporodisa</strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a href="{{URL('/')}}">SSC Cloud Seven</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <!-- <a href="#intro" class="scrollto">Beranda</a> -->
                        <a href="https://www.blog.goporodisa.com" target="_blank" class="scrollto">Blog</a>
                        <a href="{{URL('ka_halaman/syarat_dan_ketentuan')}}">Syarat & Ketentuan</a>
                        <a href="{{URL('ka_halaman/kebijakan')}}">Kebijakan Privasi</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a> -->

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script>
        $("#lock").hover(function () {
            // $("#lock").toggle(300);
            $("#lock").toggleClass('fa-unlock');
        });

    </script>

</body>

</html>
