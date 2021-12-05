@extends('layouts.app_out')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>SMS OTP</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details mt-5 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('assets/img/otp.jpg')}}" alt="" srcset="" style="width: 100%;">
                </div>
                <div class="col-md-6">
                    <p>Hindari melakukan permintaan OTP terlalu sering karena akan menyebabkan blokir akses oleh sistem.
                    </p>
                    <div class="form-group mt-4">
                        <form>
                            <div class="row">
                                <div class="col-md-4 text-center align-self-center">
                                    <h4 class="mt-2">Nomor HP</h4>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" style="border-top: none; border-left: none; border-right: none;">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-group pt-3">
                        <button class="btn btn-primary">Kirim Kode OTP</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="margin-bottom: 2%;">

    </section>

</main><!-- End #main -->
@endsection
