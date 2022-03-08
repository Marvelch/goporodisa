@extends('layouts.app_out')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Goporodisa.com </h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Cari keperluan tanpa pusing.<b> Goporodisa siap
                        membantu</b>.</h2>
                <div data-aos="fade-up" data-aos-delay="800">
                    <a href="{{URL::to('//www.warung.goporodisa.com')}}" class="btn-get-started scrollto" target="_blank">Jualan Sekarang</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                <img src="{{asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">



    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Layanan Kami</h2>
                <p>Menghadirkan layanan yang mempermudah pengguna</p>
            </div>

            <div class="row">
                <!-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-box"></i></div>
                        <h4 class="title"><a href="">Basah</a></h4>
                        <small class="description">Basah adalah layanan bank sampah untuk wilayah Talaud</small>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bxs-ship"></i></div>
                        <h4 class="title"><a href="">Jastip</a></h4>
                        <small class="description">Jastip adalah layanan jastip untuk pembelian barang wilayah
                            Manado</small>
                    </div>
                </div> -->

                <!-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-box"></i></div>
                        <h4 class="title"><a href="">Jasaput</a></h4>
                        <small class="description">Jasaput adalah layanan antar - jemput barang untuk wilayah
                            Talaud</small>
                    </div>
                </div> -->

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-box"></i></div>
                        <h4 class="title"><a href="">SECOM</a></h4>
                        <small class="description">Service komputer langsung jemput ditempat dan tidak perlu repot lagi.</small>
                    </div>
                </div>


                <!-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-box"></i></div>
                        <h4 class="title"><a href="">Arine</a></h4>
                        <small class="description">Arine adalah layanan arisan online tersedia untuk wilayah
                            Talaud</small>
                    </div>
                </div> -->
                <!-- <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                    <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4 class="title"><a href="">Magni Dolores</a></h4>
                    <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                    <div class="icon"><i class="bx bx-world"></i></div>
                    <h4 class="title"><a href="">Nemo Enim</a></h4>
                    <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                        blanditiis</p>
                </div>
            </div> -->

            </div>

        </div>
    </section>


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Produk Terbaru</h2>
                <small>
                    <p>
                        Temukan produk terbaru untuk memenuhi kebutuhan kamu. Yuk cek sekarang
                    </p>
                </small>
            </div>

            <div class="row d-flex justify-content-center" data-aos="fade-up" data-aos-delay="400">
                @foreach($getJualanku as $key => $item)
                <div class="col-lg-2 portfolio-item filter-app col-md-push-3 cold-xs-12 ml-2 shadow"
                    style="border-radius: 6px;">
                    <div class="portfolio-wrap mt-1" style="border-radius: 10px;">
                        <img src="{{ env('BACKEND_URL') . "storage/$item->gmbr_depan"}}" class="img-fluid" alt="">
                        <!-- <div class="portfolio-info">
                        <h4>{{$item->nama_barang}}</h4>
                        <p><?php echo "Rp " . number_format($item->harga,0,',','.'); ?></p>
                        <div class="portfolio-links">
                            <a href="{{ env('BACKEND_URL') . "storage/$item->gmbr_depan"}}"></a>
                        </div>
                    </div> -->
                    </div>
                    <div class="form-group mt-2 text-capitalize">
                        <p><small>
                                <?php
                            $id = Crypt::encrypt($item->id);
                        ?>
                                <b><a href="{{ url('informasi_barang/'.$id)}}"
                                        class="text-dark"><?php echo substr($item->nama_barang,0,20) ?></a></b>
                                <br>
                                <?php echo "Rp " . number_format($item->harga,0,',','.'); ?>
                                <br>
                                <i class="fas fa-award text-primary mr-1"></i> {{$item->Lokasis->nama_desa}}
                            </small></p>
                        <p></p>
                    </div>
                    <?php
                            $id = Crypt::encrypt($item->id);
                        ?>
                    <!-- <a class="btn btn-outline-primary col-md-12 mb-3" href="{{ url('informasi_barang/'.$id)}}"><i
                            class="fas fa-shopping-cart mr-1"></i> Beli</a> -->
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Rekomendasi</h2>
                <small>Barang - barang yang sesuai dengan kebutuhan, temukan barang terbaik sesuai selera</small>
            </div>

            <div class="row d-flex justify-content-center" data-aos="fade-up" data-aos-delay="400">
                @foreach($getRandom as $item)
                <div class="col-lg-2 portfolio-item filter-app col-md-push-3 cold-xs-12 ml-2 shadow"
                    style="border-radius: 6px;">
                    <div class="portfolio-wrap mt-1" style="border-radius: 10px;">
                        <img src="{{ env('BACKEND_URL') . "storage/$item->gmbr_depan"}}" class="img-fluid" alt="">
                        <!-- <div class="portfolio-info">
                        <h4>{{$item->nama_barang}}</h4>
                        <p><?php echo "Rp " . number_format($item->harga,0,',','.'); ?></p>
                        <div class="portfolio-links">
                            <a href="{{ env('BACKEND_URL') . "storage/$item->gmbr_depan"}}"></a>
                        </div>
                    </div> -->
                    </div>
                    <div class="form-group mt-2">
                        <p><small>
                                <?php
                            $id = Crypt::encrypt($item->id);
                        ?>
                                <b><a href="{{ url("informasi_barang/".$id) }}"
                                        class="text-dark"><?php echo substr($item->nama_barang,0,20);?></a></b>
                                <br>
                                <?php echo "Rp " . number_format($item->harga,0,',','.'); ?>
                                <br>
                                <i class="fas fa-award text-primary"></i> {{$item->Lokasis->nama_desa}}
                            </small></p>
                        <p></p>
                    </div>
                    <!-- <button class="btn btn-outline-primary col-md-12 mb-3"
                        onclick="window.location='{{ url("informasi_barang/".$id) }}'"><i
                            class="fas fa-shopping-cart mr-1"></i> Beli</button> -->
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Kategori</h2>
                <small><i>Pilih kategori sesuai dengan kebutuhan kamu. Banyak kategori tersedia silahkan kamu pilih yang
                        sesuai kebutuhan.</i></small>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="300">
                <div class="col-lg-3 col-md-4">
                    <div class="icon-box">
                        <i class="icofont-girl-alt" style="color: #ffbb2c;"></i>
                        <?php
                            $pakaian_wanita = encrypt('1');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$pakaian_wanita)}}">Pakaian Wanita</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="icofont-waiter" style="color: #5578ff;"></i>
                        <?php
                            $pakaian_pria = encrypt('2');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$pakaian_pria)}}">Pakaian Pria</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                    <div class="icon-box">
                        <i class="icofont-pills" style="color: #e80368;"></i>
                        <?php
                            $kesehatan = encrypt('4');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$kesehatan)}}">Kesehatan</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                    <div class="icon-box">
                        <i class="icofont-ui-cell-phone" style="color: #e361ff;"></i>
                        <?php
                            $elektronik = encrypt('5');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$elektronik)}}">Elektronik</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="icofont-audio" style="color: #47aeff;"></i>
                        <?php
                            $audio = encrypt('12');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$audio)}}">Audio</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="icofont-apple-watch" style="color: #ffa76e;"></i>
                        <?php
                            $jam_tangan = encrypt('11');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$jam_tangan)}}">Jam Tangan</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="icofont-fast-food" style="color: #11dbcf;"></i>
                        <?php
                            $makan_minum = encrypt('13');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$makan_minum)}}">Makan & Minuman</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="icofont-book-alt" style="color: #4233ff;"></i>
                        <?php
                            $buku = encrypt('17');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$buku)}}">Buku & Alat Tulis</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="icofont-boot-alt-2" style="color: #b2904f;"></i>
                        <?php
                            $olahraga = encrypt('16');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$olahraga)}}">Olahraga & Outdoor</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="icofont-ticket" style="color: #b20969;"></i>
                        <?php
                            $tiket = encrypt('19');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$tiket)}}">Tiket & Voucher</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="icofont-computer" style="color: #ff5828;"></i>
                        <?php
                            $komputer = encrypt('21');
                        ?>
                        <h3><a href="{{URL('ka_halaman/kategori/'.$komputer)}}">Komputer & Aksesoris</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box">
                        <i class="icofont-navigation-menu" style="color: #29cc61;"></i>
                        <h3><a href="" disabled>Lainnya</a></h3>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Lebih Banyak</h2>
            </div>

            <div class="row d-flex justify-content-center" data-aos="fade-up" data-aos-delay="400">
                @foreach($getBigRandom as $item)
                <div class="col-lg-2 portfolio-item filter-app col-md-push-3 cold-xs-12 ml-2 shadow"
                    style="border-radius: 6px;">
                    <div class="portfolio-wrap mt-1" style="border-radius: 10px;">
                        <img src="{{ env('BACKEND_URL') . "storage/$item->gmbr_depan"}}" class="img-fluid" alt="">
                        <!-- <div class="portfolio-info">
                        <h4>{{$item->nama_barang}}</h4>
                        <p><?php echo "Rp " . number_format($item->harga,0,',','.'); ?></p>
                        <div class="portfolio-links">
                            <a href="{{ env('BACKEND_URL') . "storage/$item->gmbr_depan"}}"></a>
                        </div>
                    </div> -->
                    </div>
                    <div class="form-group mt-2">
                        <p><small>
                                <?php
                            $id = Crypt::encrypt($item->id);
                        ?>
                                <b><a href="{{ url("informasi_barang/".$id) }}"
                                        class="text-dark"><?php echo substr($item->nama_barang,0,20);?></a></b>
                                <br>
                                <?php echo "Rp " . number_format($item->harga,0,',','.'); ?>
                                <br>
                                <i class="fas fa-award text-primary"></i> {{$item->Lokasis->nama_desa}}
                            </small></p>
                        <p></p>
                    </div>
                    <!-- <button class="btn btn-outline-primary col-md-12 mb-3" style="border-radius: 3px 3px 3px 3px;"
                        onclick="window.location='{{ url("informasi_barang/".$id) }}'"><i
                            class="fas fa-shopping-cart"></i> BELI</button> -->
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-about">
                        <h3>Goporodisa</h3>
                        <p>Belanja apapun dan kapapun bersama goporodisa untuk Talaud.</p>
                        <img src="{{asset('assets/img/playstore.png')}}" alt="" srcset="" class="playstore">
                        <div class="social-links">
                            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                            <a href="https://web.facebook.com/Goporodisa/" class="facebook" target="_blank"><i
                                    class="icofont-facebook"></i></a>
                            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">

                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="info">
                        <div>
                            <i class="ri-map-pin-line"></i>
                            <p class="text-secondary">Dusun 1 Desa Moronge</p>
                        </div>

                        <div>
                            <i class="ri-mail-send-line"></i>
                            <p><a href="mailto:info@goporodisa.com" class="text-secondary">info@goporodisa.com</a></p>
                        </div>

                        <div>
                            <i class="ri-phone-line"></i>
                            <p class="text-secondary">+62 8221-7797-7018</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="info">
                        <div>
                            <a href="{{URL('ka_halaman/tentang_kami')}}">
                                <i class="ri-file-list-3-line"></i>
                                <p class="text-secondary">Tentang Goporodisa</p>
                            </a>
                        </div>

                        <div>
                            <a href="{{URL('ka_halaman/karir')}}">
                                <i class="ri-user-search-fill"></i>
                                <p class="text-secondary">Karir</p>
                            </a>
                        </div>

                        <!-- <div>
                            <i class="ri-folders-fill"></i>
                            <p>Mitra Goporodisa</p>
                        </div> -->

                    </div>
                </div>

            </div>

        </div>
    </section>

</main>
@endsection
