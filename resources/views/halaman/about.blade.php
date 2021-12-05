@extends('layouts.app_out')

@section('content')
<main id="main" class="space">
    <section data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="400">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{URL('assets/img/shipping.png')}}" alt="" srcset="" class="card-img">
                            </div>
                            <div class="col-md-8 mt-5">
                                <p style="text-align: justify;">
                                    Helo,
                                    <?php
                                        date_default_timezone_set("Asia/Makassar");

                                        $waktu = date('Hm');

                                        if($waktu >= 0600 AND $waktu <= 1259){
                                            echo "Selamat Pagi";
                                        }else if($waktu >= 1300 AND $waktu <= 1459){
                                            echo "Selamat Siang";
                                        }else if($waktu >= 1500 AND $waktu <= 1759){
                                            echo "Selamat Sore";
                                        }else if($waktu >= 1800){
                                            echo  "Selamat Malam";
                                        }else{
                                            echo "Sobat ...";
                                        }
                                    ?>
                                    <br>
                                    <br>
                                    Perkenalkan kami adalah Goporodisa, suatu layanan marketplace untuk Talaud. Kami
                                    menghadirkan
                                    layanan
                                    yang
                                    berbasis
                                    toko daring yang membantu lebih banyak orang untuk berjualan dan
                                    mempromosikan
                                    produk -
                                    produk jualan mereka ke lebih banyak lagi calon pembeli.
                                    <br>
                                    <br>
                                    Kami harap penjual <i>(seller)</i> akan mendapat penghasilan yang
                                    lebih baik lagi dan menemukan peluang "pasar" yang lebih besar. Kami selalu mengharapkan berbagai inovasi dalam dunia
                                    digital
                                    untuk
                                    merubah
                                    cara transaksi lama dengan cara bertansaksi baru.
                                    <br>
                                    <br>
                                    Goporodisa ingin menuliskan
                                    perjalanan
                                     yang lebih baik lagi dalam melakukan pemerataan ekonomi
                                    secara
                                    digital.
                                    Dengan memberdayakan UMKM (Usaha Mikro Kecil Menengah) untuk meningkatkan lebih banyak lagi transaksi bersama Goporodisa.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </section>
</main>
@endsection
