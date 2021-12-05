@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 3px 2px 2px #dcdbdb">
                <!-- <div class="card-header">{{ __('Register') }}</div> -->
                <div class="row m-5">
                    <div class="col-md-5 text-md-center mt-5">
                        <!-- <img src="{{asset('assets/img/login.gif')}}" alt="" srcset="" style="width: 100%;"> -->
                        <h1 class="font-weight-bold mt-5 mb-3">Register</h1>
                        <p class="text-capitalize pt-2"><small>mendaftarkan biodata dan dapatkan layanan
                                goporodisa</small></p>
                    </div>
                    <div class="col-md-7 mt-1">
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-left">Nama Lengkap</label>

                                    <div class="col-md-8">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-left">Email</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-left">Kata
                                        Sandi</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-left">Konfirmasi
                                        Password</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0 offset-md-4">
                                    <p><small class="ml-2">Kamu sudah terdaftar ? <a href="{{URL('/login')}}">Login
                                                sekarang</a></small></p>
                                    <div class="form-check ml-2">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                        <label class="form-check-label" for="exampleCheck1"><small>Setuju dengan <a
                                                    href="" data-toggle="modal" data-target=".bd-example-modal-lg">Baca
                                                    syarat
                                                    & ketentuan</a></small></label>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Syarat & ketentuan pelanggan
                <small>
                    <p class="mt-2">
                        Berikut adalah ketentuan penggunaan layanan Goporodisa sesuai dengan syarat dan ketentaun yang
                        telah dibuat sebagai berikut :
                        <p>
                            <ol>
                                <li>Pengguna dengan ini menyatakan bahwa pengguna adalah orang yang cakap dan mampu
                                    untuk
                                    mengikatkan dirinya dalam sebuah perjanjian yang sah menurut hukum. </li>
                                <li>Go Porodisa tidak memungut biaya pendaftaran kepada Pengguna.</li>
                                <li>Pengguna memahami bahwa 1 (satu) nomor telepon hanya dapat digunakan untuk mendaftar
                                    1
                                    (satu) akun Pengguna Go Porodisa, kecuali bagi Pengguna yang telah memiliki beberapa
                                    akun
                                    dengan 1 (satu) nomor telepon sebelumnya.</li>
                                <li>Pengguna yang telah mendaftar berhak bertindak sebagai:</li>
                                <ul>
                                    <li>Pembeli</li>
                                    <li>Penjual, dengan memanfaatkan layanan buka toko.</li>
                                </ul>
                                <li>Pengguna yang akan bertindak sebagai Penjual diwajibkan memilih pilihan menggunakan
                                    layanan buka toko. Setelah menggunakan layanan buka toko, Pengguna berhak melakukan
                                    pengaturan terhadap item-item yang akan diperdagangkan di etalase pribadi Pengguna.
                                </li>
                                <li>Pengguna yang telah melakukan tindakan buka toko diharapkan mengunggah konten produk
                                    yang
                                    akan diperdagangkan dalam jangka waktu 90 (sembilan puluh) hari kalender setelah
                                    toko
                                    berhasil dibuka. Apabila dalam jangka waktu 90 (sembilan puluh) hari kalender
                                    Pengguna masih
                                    tidak mengunggah konten produk, maka Pengguna menyetujui dan memahami bahwa Go
                                    Porodisa
                                    berhak untuk melakukan moderasi dan/atau penutupan toko tanpa pemberitahuan
                                    sebelumnya.</li>
                            </ol>
                        </p>
                    </p>
                    <div class="form-group">
                        <a href="{{URL('ka_halaman/syarat_dan_ketentuan')}}" target="_blank">Baca Selangkapnya...</a>
                    </div>
                </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection
