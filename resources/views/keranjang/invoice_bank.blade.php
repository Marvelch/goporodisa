@extends('layouts.app_out')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Invoice</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Invoice Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="form-group">
                        <p>NO TRANSAKSI #{{$transaksi->kode_transaksi}}</p>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-center mb-5">
                    <div class="form-group pt-4">
                        <table class="table table-border">
                            <tbody>
                                <tr>
                                    <td>Tanggal Transaksi</td>
                                    <td>: <?php echo date("d-m-Y", strtotime($transaksi->tanggal_transaksi)); ?></td>
                                </tr>
                                <tr>
                                    <td>Biaya Layanan</td>
                                    <td>: Rp <?php echo number_format($transaksi->biaya_layanan,0,',','.'); ?> </td>
                                </tr>
                                <tr>
                                    <td>Biaya Pengiriman</td>
                                    <td>: Rp <?php echo number_format($transaksi->biaya_pengiriman,0,',','.'); ?></td>
                                </tr>
                                <tr>
                                    <td>Total Bayar</td>
                                    <td>: Rp <?php echo number_format($transaksi->total_bayar,0,',','.'); ?></td>
                                </tr>
                                <tr>
                                    <td>Pengiriman</td>
                                    <td>:
                                        <?php
                                            if($transaksi->ketegori_pengiriman == 1)
                                            {
                                                echo "Normal - Pengiriman 1 s/d 3 Hari";
                                            }else{
                                                echo "Pengiriman Tidak Tersedia";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Metode Pembayaran</td>
                                    <td>:
                                        <?php
                                            if($transaksi->metode_pembayaran == 2)
                                            {
                                                echo "COD (Cash On Delivery)";
                                            }else{
                                                echo "Transfer Bank BRI & Bank BSG";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengiriman</td>
                                    <td>: <?php echo date("d-m-Y", strtotime($transaksi->batas_waktu_pengiriman)); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <p class="ml-1"><i><small>* Pembayaran dilakukan dengan metode COD (Cash On Delivery) <br> harap menyediakan pembayaran tunai pada saat kurir datang.</small></i></p>
                        </div>
                        <div class="form-group ml-2 pt-5">
                            <button class="btn btn-primary">Kembali</button>
                            <a class="btn btn-primary" href="{{URL('ka_riwayat_pemesanan/riwayat_pemesanan_transaksi/'.$transaksi->kode_transaksi)}}">Cek Paket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
