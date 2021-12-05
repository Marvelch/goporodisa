@extends('layouts.app_dashboard')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Detail Transaksi</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Invoice Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" style="margin-bottom: 20%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    @if($getTransaksi->status_pengiriman == 2 AND $getTransaksi->status_pesanan == 3 AND $getTransaksi->konfirmasi_pelanggan == NULL)
                    <div class="form-group d-flex justify-content-end">
                        <a href="{{URL('ka_lapor/laporkan_transaksi/'.$getRincian_Transaksi[0]->kode_transaksi)}}"
                            class="text-secondary font-weight-bold small"><i class="fas fa-user-shield fa-lg m-1"></i>
                            Laporkan Transaksi</a>
                    </div>
                    @else
                    <!-- kosong -->
                    @endif
                    <div class="form-group">
                        {{ method_field('PUT') }}
                        <div class="table-responsive">
                            <table class="table table-border">
                                <tbody>
                                    <tr>
                                        <th>NAMA PRODUK</th>
                                        <th>BERAT</th>
                                        <th>QTY</th>
                                        <th>HARGA</th>
                                        <th>TOTAL (Q x T)</th>
                                        <th>LAINNYA</th>
                                    </tr>
                                    @foreach($getRincian_Transaksi as $key => $item)
                                    <tr>
                                        <input type="hidden" name="id_transaksi[]" value="{{$item->id}}">
                                        <input type="hidden" name="kode_transaksi" value="{{$item->kode_transaksi}}">
                                        </td>
                                        <td>{{$item->transaksi_jualanku->nama_barang}}</td>
                                        <td>{{$item->berat_barang}} Kg</td>
                                        <td>{{$item->jumlah_pesanan}}</td>
                                        <td><?php echo "Rp " . number_format($item->harga_barang,0,',','.'); ?>
                                        </td>
                                        <td><?php echo "Rp " . number_format($item->jumlah_pesanan *  $item->harga_barang,0,',','.'); ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($item->status_pesanan_per_transaksi == NULL AND $item->ket_stok == 2)
                                                {
                                                    echo "<span class='text-danger font-weight-bold'>KOSONG</span>";
                                                }else{

                                                }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>Biaya Pengiriman</td>
                                                    <td><?php echo "Rp " . number_format($getTransaksi->biaya_pengiriman,0,',','.'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Biaya Layanan</td>
                                                    <td><?php echo "Rp " . number_format($getTransaksi->biaya_layanan,0,',','.'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total Pembayaran</td>
                                                    <td><?php echo "Rp " . number_format($getTransaksi->total_bayar,0,',','.'); ?>
                                                        </li>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <!-- kosong -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Tujuan Pengiriman</td>
                                            <td>{{Auth::User()->name}} - {{$getPeneriman[$key]->nama_desa}}</td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Pengiriman Paket</td>
                                            <td><?php
                                                    if($getTransaksi->status_pengiriman == null && $getTransaksi->status_pesanan == "4"){
                                                        echo "Tidak Tersedia";
                                                    }elseif($getTransaksi->status_pengiriman == 1){
                                                        echo "Dalam Pengiriman";
                                                    }elseif($getTransaksi->status_pengiriman == null){
                                                        echo "Diproses oleh toko";
                                                    }else{
                                                        echo "Paket Diterima";
                                                    }
                                                ?>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                                <p class="small ml-3">Informasi pengiriman sesuai dengan alamat yang terdaftar oleh pelanggan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="row">
                        @if($getTransaksi->konfirmasi_pelanggan == NULL)
                            @if($getTransaksi->status_pesanan == 0 AND $getTransaksi->status_pembayaran != 1)
                            <div class="col mt-1">
                                <button class="btn btn-secondary col-md-4 m-1" data-toggle="modal"
                                    data-target="#pembatanModalLong">Batalkan</button>
                                <a class="btn btn-secondary m-1"
                                    href="{{URL('/ka_transaksi/invoice/'.$getTransaksi->kode_transaksi)}}">Cara
                                    Pembayaran</a>
                            </div>
                            <!-- <div class="col mt-1 ml-1">
                                    <p class="small">Menunggu konfirmasi dari seller toko</p>
                                </div> -->
                            <!-- gunakan @ untuk php elseif($getTransaksi->status_pesanan == "2" || $getTransaksi->status_pesanan == "3") -->
                            @elseif($getTransaksi->status_pengiriman == 2 AND $getTransaksi->status_pesanan == 3)
                            <div class="col m-1">
                                <button class="btn btn-secondary col-md-6" data-toggle="modal"
                                    data-target="#exampleModalLong">Terima Paket</button>
                            </div>
                            @elseif($getTransaksi->status_pesanan == 1)
                            <div class="col m-2 font-weight-bold">
                                PAKET DIPROSES OLEH TOKO
                            </div>
                            @elseif($getTransaksi->status_pesanan == 2)
                            <div class="col m-2 font-weight-bold">
                                PAKET TELAH DITERIMA OLEH KURIR
                            </div>
                            @elseif($getTransaksi->status_pesanan == 3)
                            <div class="col m-2 font-weight-bold">
                                PAKET DITERIMA OLEH PELANGGAN
                            </div>
                            @elseif($getTransaksi->status_pesanan == 4)
                            <div class="col m-2 font-weight-bold">
                                TRANSAKSI DIBATALKAN
                            </div>
                            @elseif($getTransaksi->status_pesanan == 5)
                            <div class="col m-2 font-weight-bold">
                                Laporan Diproses Hingga Tanggal
                                <?php echo date("d-m-Y", strtotime($getTransaksi->batas_konfirmasi_pesanan)); ?>
                            </div>
                            @else
                            <div class="col m-2 font-weight-bold">
                                PENGECEKAN PEMBAYARAN
                            </div>
                            @endif
                        @else   
                        <div class="col m-2 font-weight-bold">
                            PAKET TELAH DITERIMA
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pastikan semua paket telah diterima oleh pelanggan sudah sesuai dan tidak ada kerusahaan. <a
                        href="">Baca syarat & ketentuan</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="{{URL('ka_transaksi/konfirmasi_pesanan/'.$getTransaksi->kode_transaksi)}}"
                        method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Terima</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pembatalan-->
    <div class="modal fade" id="pembatanModalLong" tabindex="-1" role="dialog"
        aria-labelledby="pembatalanModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Transaksi yang telah dibatalkan oleh pelanggan tidak bisa kami proses kembali. <a href="">Baca
                        syarat & ketentuan</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <form action="{{URL('ka_transaksi/konfirmasi_pembatalan/'.$getTransaksi->kode_transaksi)}}"
                        method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary" id="konfirmasi_pembatalan">Iya. Batalkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- <script>
    $('#konfirmasi_pesanan').on('click', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var getID = $('input[name^=id_transaksi]').map(function (idx, log) {
            return $(log).val();
        }).get();

        var kode_transaksi = $('input[name=kode_transaksi]').val();

        var url = '/ka_riwayat_pemesanan/konfirmasi_pesanan/' + kode_transaksi
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",

                'getID': getID,
            },
            success: function (response) {
                window.location = response;
                // console.log(response)
            }
        });
    });

    $('#konfirmasi_pembatalan').on('click', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var kode_transaksi = $('input[name=kode_transaksi]').val();

        var url = '/ka_riwayat_pemesanan/konfirmasi_pembatalan/' + kode_transaksi
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",

                'kode_transaksi': kode_transaksi,
            },
            success: function (response) {
                window.location = response;
                // console.log(response)
            }
        });
    });

</script> -->
@endsection
