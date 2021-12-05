@extends('layouts.app_out')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Verifikasi Nomor HP</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details mt-5 mb-2" style="padding-bottom: 15%;">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{asset('assets/img/1.png')}}" alt="" srcset="" style="width: 100%;">
                </div>
                <div class="col-md-7">
                    <div class="form-group mt-4">
                        <p>
                            <small>Kepada pelanggan, menurut pengecekan sistem nomor telah digunakan sebelumnya. Pastikan menggunakan nomor yang belum terdaftar pada sistem. Terima kasih.</small>
                        </p>
                        <div class="form-group mt-3">
                            <h6>Duplikat Nomor HP : {{$nomor_hp}} <i>(Terdaftar)</i></h6>
                        </div>
                    </div>
                    <div class="form-group pt-3">
                        <a href="{{URL('/home')}}" class="btn btn-primary">KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
