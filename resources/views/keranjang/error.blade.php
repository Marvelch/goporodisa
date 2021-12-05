@extends('layouts.app_out')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Error</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Invoice Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Sorry......</h3>
                    <p>Transaksi mengalami kegagalan pastikan kamu mengecek riwayat transaksi.</p>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
