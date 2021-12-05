@extends('layouts.app_dashboard')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Bank</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Invoice Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" style="margin-bottom: 30%;">
        <div class="container">
            <form action="{{URL('ka_bank/buku_bank')}}" method="post">
                @csrf
            <div class="row mt-5 shadow">
                <div class="col-md-6">
                    <img src="{{asset('assets/img/bank.gif')}}" alt="" srcset="" style="width: 100%;">
                </div>
                <div class="col-md-6 mt-5">
                <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input name="nama_lengkap" type="text" class="col-md-10 form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">No Rekening</label>
                        <input name="nomor_rekening" type="text" class="col-md-10 form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Bank</label>
                        <select name="id_bank" id="" class="col-md-10 form-control">
                            @foreach($getBank as $item)
                            <option value="{{$item->id}}">{{$item->nama_bank}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pt-2">
                        <a href="{{URL('/home')}}" class="btn btn-primary">BATAL</a>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>

</main><!-- End #main -->
@endsection
