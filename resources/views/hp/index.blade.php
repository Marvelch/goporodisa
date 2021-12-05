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
            <div class="alert alert-primary mb-5" role="alert">
                PEMBERITAHUAN - Layanan OTP akan mengalami gangguan, sebagai solusi kami mengalikan layanan OTP ke
                Whatsapp <i>(Sementara)</i>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <img src="{{asset('assets/img/otp.jpg')}}" alt="" srcset="" style="width: 100%;">
                </div>
                @if($getOTP->otp_code == null)
                <div class="col-md-7">
                    <p>Periksa kode OTP pada kontak SMS sesuai dengan nomor terdaftar dibawah :
                    </p>
                    <div class="form-group mt-4">
                        <form action="{{ROUTE('nomor_hp.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="mt-2">NOMOR HP</h4>
                                </div>
                                <div class="col">
                                    <input name="phone" type="text" class="form-control"
                                        style="border-top: none; border-left: none; border-right: none;">
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
                @else
                <div class="col-md-7">
                    <p>Periksa kode OTP pada kontak SMS sesuai dengan nomor terdaftar dibawah :
                    </p>
                    <form action="{{URL('ka_nomor_hp/nomor_hp/'.$getOTP->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group mt-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="mt-2">KODE OTP</h4>
                                </div>
                                <div class="col">
                                    <input name="otp_code" type="text" class="form-control"
                                        style="border-top: none; border-left: none; border-right: none;">
                                    @error('otp_code')
                                    <small>
                                        <p class="text-danger pt-1">* {{ $message }}</p>
                                    </small>
                                    @enderror
                                    <div class="form-group mt-1">
                                        <small>Belum menerima kode otp ? <a href="{{URL('ka_nomor_hp/permintaan_otp')}}">Kirim Ulang</a> - <a href="{{URL('/ka_nomor_hp/nomor_hp/'.$getOTP->id.'/edit')}}">Ganti
                                                Nomor HP</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <button type="submit" class="btn btn-primary">VERIFIKASI<i
                                    class="fas fa-paper-plane ml-2"></i></button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </section>
</main>
@endsection
