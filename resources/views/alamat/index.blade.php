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
            @if($getAlamat == null)
            <form action="{{URL('ka_alamat/alamat')}}" method="post">
                @csrf
                <div class="row mt-3 mb-5" style="padding-bottom: 7%;">
                    <div class="col-md-6">
                        <img src="{{asset('assets/img/address.png')}}" alt="" srcset="" style="width: 100%;">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Pilih Kecamatan</label>
                            <select name="getKecamatan" id="" class="form-control">
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
                            <textarea name="getAlamat" id="" cols="30" rows="10" class="form-control"></textarea>
                            <small>* Pastikan mengisi alamat selangkap mungkin untuk menghindari salah kirim.</small>
                            @error('getAlamat')
                            <small>
                                <p class="text-danger pt-1">* {{ $message }}</p>
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </form>
            @else
            <div class="row mt-3 mb-5" style="padding-bottom: 7%;">
                <div class="col-md-6">
                    <img src="{{asset('assets/img/address-true.svg')}}" alt="" srcset="" style="width: 100%;">
                </div>
                <div class="col-md-6">
                    <h5>Informasi Alamat</h5>
                    <ul>
                        <li>Kepada {{Auth::User()->name}} pastikan pengisian alamat rumah sudah benar, paket yang dibeli
                            akan kami kirimkan ke alamat yang terdaftarkan.</li>
                        <li>Pasti pengisian alamat sudah benar agar <b>menghindari salah kirim paket</b>. Dibawah ini
                            adalah alamat lengkat penerima paket :</li>
                    </ul>
                    <div class="form-group pt-3">
                        <p><i class="fas fa-street-view mr-2"></i> Kecamatan : {{$getAlamat->Lokasis->nama_desa}}</p>
                    </div>
                    <div class="form-group pt-2">
                        <p><i class="icofont-home mr-2"></i> Lokasi alamat : {{$getAlamat->alamat}}</p>
                    </div>
                    <div class="form-group pt-2">
                        <?php
                            $id_alamat = encrypt($getAlamat->id);
                        ?>
                        <!-- <a class="btn btn-primary" href="{{URL('/home')}}">Kembali</a> -->
                        <a class="btn btn-primary" href="{{URL('ka_alamat/alamat/'.$id_alamat.'/edit')}}"><span class="ml-1 mr-1"><i class="fas fa-map-marker-alt"></i> UBAH</span></a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</main>

@endsection
