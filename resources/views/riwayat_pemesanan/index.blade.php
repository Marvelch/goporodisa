@extends('layouts.app_dashboard')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Riwayat Transaksi</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Invoice Details Section ======= -->
    <section>
        <div class="container" style="margin-bottom: 120px;">
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($rincianTransaksiData as $key => $item)
                            <div class="card mt-2 mb-3 shadow" style="max-width: 100%; border: none;">
                                <div class="row no-gutters m-2">
                                    <div class="col-md-4">
                                        <img src="{{ env('BACKEND_URL') . "storage/$item->gmbr_depan"}}"
                                            class="card-img" alt="..." style="width: 50%;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h6 class="card-title">{{$item->nama_barang}} dan lainnya.</h6>
                                            <p class="small">{{$item->jumlah_pesanan}} barang x <?php echo "Rp " . number_format($item->harga,0,',','.'); ?> | + Produk Lainnya | INV {{$item->kode_transaksi}}</p>
                                            <div class="d-flex justify-content-end small">
                                                Total Transaksi
                                            </div>
                                            <div class="d-flex justify-content-end small font-weight-bold mr-4">
                                                <?php echo "Rp " . number_format($getTransaksi[$key]->total_bayar,0,',','.'); ?>
                                            </div>
                                            <div class="d-flex justify-content-end small mt-4 font-weight-bold">
                                                <a href="{{URL('ka_riwayat_pemesanan/riwayat_pemesanan_transaksi/'.$item->kode_transaksi)}}">Lihat Detail Transaksi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group m-3">
                            {{$getTransaksi->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
