@extends('layouts.app_out')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Ubah Nomor HP</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details mt-5 mb-2" style="padding-bottom: 15%;">
        <div class="container">
            <div class="alert alert-primary mb-5 text-capitalize" role="alert">
                PEMBERITAHUAN - Layanan OTP akan mengalami gangguan, periksa kontak sms atau whatsapp untuk kode OTP
                pengguna.
            </div>
            <div class="row">
                <div class="col-md-5">
                    <img src="{{asset('assets/img/bank.gif')}}" alt="" srcset="" style="width: 100%;">
                </div>
                <div class="col-md-7">
                    <p>Periksa kode OTP pada kontak SMS sesuai dengan nomor terdaftar dibawah :
                    </p>
                    <div class="form-group mt-4">
                        <form action="{{URL('ka_nomor_hp/ganti_nomor_hp')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="mt-2">NOMOR HP</h4>
                                </div>
                                <div class="col">
                                    <input name="phone" type="text" class="form-control"
                                        style="border-top: none; border-left: none; border-right: none;"
                                        value="{{$getNomorHP->phone}}">
                                    @error('phone')
                                    <small>
                                        <p class="text-danger pt-1">* {{ $message }}</p>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                    </div>
                    <div class="form-group pt-3">
                        <button type="submit" class="btn btn-primary">KIRIM OTP</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
