@extends('layouts.app_dashboard')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 5%;">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halam Utama</a></li>
                    <li>Alamat</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details mt-5">
        <div class="container">
            <div class="row mt-3 mb-5" style="padding-bottom: 7%;">
                <div class="col-md-6">
                    <img src="{{asset('assets/img/address.png')}}" alt="" srcset="" style="width: 100%;">
                </div>
                <div class="col-md-6">
                    <form action="{{URL('ka_alamat/alamat/'.$getAlamat->id)}}" method="post">
                    @method('PUT')
                        @csrf
                    <div class="form-group">
                        <label for="">Pilih Kecamatan</label>
                        <select name="getKecamatan" id="" class="form-control">
                            <option value="{{$getAlamat->id}}">Terpilih : {{$getAlamat->Lokasis->nama_desa}}</option>
                            @foreach($getLokasi as $item)
                            <option value="{{$item->id}}">{{$item->nama_desa}}</option>
                            @endforeach
                        </select>
                        @error('getKecamatan')
                        <small>
                            <p class="text-danger pt-1">* {{ $message }}</p>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group pt-2">
                        <label for="">Alamat</label>
                        <textarea name="getAlamat" id="" cols="30" rows="10"
                            class="form-control">{{$getAlamat->alamat}}</textarea>
                        <small>* Pastikan mengisi alamat selangkap mungkin untuk menghindari salah kirim.</small>
                        @error('getAlamat')
                        <small>
                            <p class="text-danger pt-1">* {{ $message }}</p>
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">SIMPAN</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5> -->
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Konfirmasi pembaharuan lokasi alamat pelanggan.
                                    <ul>
                                        <li>Perubahan alamat akan mempengaruhi perubahan tarif atau ongkos kirim.</li>
                                        <li>Kesalahan mengisi alamat dan <b>pengiriman gagal</b> selamat 2 kali maka
                                            akun pelanggan akan terblokir secara otomatis.</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </form>
        </div>
    </section>
</main>

@endsection
