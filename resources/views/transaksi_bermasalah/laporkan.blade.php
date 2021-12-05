@extends('layouts.app_dashboard')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Laporkan Transaksi</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Invoice Details Section ======= -->
    <section>
        <div class="container" style="margin-bottom: 120px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            @forelse($getTransaksi as $item)
                            <div class="form-group mt-3">
                                <h6>Hey {{Auth::User()->name}}, kami mohon maaf karena pesanan tidak sesuai dengan
                                    harapan pelanggan.</h6>
                            </div>
                            <form action="{{URL('ka_lapor/laporkan')}}" method="post">
                                @csrf
                                <input type="hidden" name="kode_transaksi" value="{{$item->kode_transaksi}}">
                                <div class="form-group mt-3">
                                    <label for="" class="small">Pilih Masalah Transaksi</label>
                                    <select name="laporan" id="laporan" class="form-control col-md-8">
                                        <option value="Paket Rusak">Paket Rusak</option>
                                        <option value="Tidak Sesuai Ukuran / Warna">Tidak Sesuai Ukuran / Warna</option>
                                        <option value="Paket Belum Sampai">Paket Belum Sampai</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="4"
                                        class="form-control col-md-8"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-secondary" id="kirim"><span class="small">Kirim
                                            Laporan</span></button>
                                </div>
                            </form>
                            @empty
                            <div class="form-group mt-3">
                                <h6>Pengecek sistem kode transaksi tersebut tidak sah. Kami harap untuk tidak melakukan
                                    proses ilegal pada sistem.</h6>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    $(document).ready(function () {
        $('#keterangan').hide();

        $('#laporan').on('change', function () {
            var getLaporan = $('#laporan').val();

            if (getLaporan == 'Lainnya') {
                $('#keterangan').show();
            } else {
                $('#keterangan').hide();
            }
        })
    });

</script>
@endsection
