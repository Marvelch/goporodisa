@extends('layouts.app_out')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Stok</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Invoice Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" style="margin-bottom: 20%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="form-group">
                        <h3>Pesanan kamu tidak bisa kami proses karena stok barang sudah kosong !</h3>
                        <p>Kami Goporodisa akan membantu memberitahu penjualan untuk menambah stok barang kembali.</p>
                        <br>
                        <div class="form-group mt-5">
                            Terima kasih kami
                            <p class="mt-5">
                                <b>Goporodisa</b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
