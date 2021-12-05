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
    <section id="portfolio-details" class="portfolio-details mb-5">
        <div class="container mb-5">
            <div class="row mt-5">
                <div class="col-md-12">
                    <p class="ml-1"><b>NO TRANSAKSI #{{$transaksi->kode_transaksi}}</b></p>
                </div>
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            @if($transaksi->metode_pembayaran != 1)
                            <img src="{{asset('assets/img/hero-img.png')}}" alt="Icon Goporodisa" srcset=""
                                style="width 100%;">
                            <div class="form-group">
                                <p>
                                    <small>Hey terima kasih sudah berbelanja di Goporodisa. Belanja lebih mudah dengan
                                        pembayaran COD <i>(Cash On Delivery)</i>. <br><br> Jangan lupa siapakan uang
                                        tunai ya. Terima kasih.</small>
                                </p>
                            </div>
                            @else
                            <div>
                                <div class="form-group m-3">
                                    <div class="form-group">
                                        <img src="{{URL('assets/img/bri.png')}}" alt="Logo BRI" srcset=""
                                            style="width: 40%;">
                                    </div>
                                    <div class="pt-3">
                                        <p>
                                            Transfer Bank Rakyat Indonesia (BRI)
                                        </p>
                                        <p>
                                            A/N Marvel Christevan Wowiling
                                        </p>
                                        <p>
                                            Nomor Rekening : 5216-01-016899-53-0
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group m-3">
                                    <div class="form-group pt-4">
                                        <img src="{{URL('assets/img/bsg.png')}}" alt="Logo BRI" srcset=""
                                            style="width: 35%;">
                                    </div>
                                    <div class="pt-3">
                                        <p>
                                            Transfer Bank Sulawesi Utara dan Gorontalo (BGS)
                                        </p>
                                        <p>
                                            A/N Tryan Kevin Ada
                                        </p>
                                        <p>
                                            Nomor Rekening : -
                                        </p>
                                    </div>
                                </div>
                                <!-- <div class="card shadow">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                Konfirmasi Pembayaran
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="form-group m-1">
                                <p>
                                    <small>
                                        <p>
                                            <?php $pesan = "https//api.whatsapp.com/send?phone=+6281398739434&text=Goporodisa Konfirmasi Pembayaran Kode Transaksi ".$transaksi->kode_transaksi." Terima Kasih"; ?>
                                            1. Hubungi kami melalui Whatsapp pada <a href="{{$pesan}}" target="_blank">
                                                081398739434 (Official)</a>
                                        </p>
                                        <p>2. Kirim pesan dengan format No Transaksi dan Foto Bukti Transfer.</p>
                                        <p>3. Atau pelanggan tinggal mengirim bukti pembayaran dengan ketentuan
                                            telah mengisi informasi rekening bank</p>
                                        <div class="form-group mt-2">
                                            <img src="{{URL('assets/img/rekening.png')}}" alt="Rekening Bank" srcset=""
                                                style="width: 100%;">
                                        </div>
                                    </small>
                                </p>
                            </div> -->
                            @endif
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table-reponsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <!-- <tr>
                                            <td>Tanggal Transaksi</td>
                                            <td>
                                                <?php echo date("d-m-Y", strtotime($transaksi->tanggal_batas_konfirmasi_staff)); ?>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <td>Biaya Layanan</td>
                                            <td> Rp
                                                <?php echo number_format($transaksi->biaya_layanan,0,',','.'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Biaya Pengiriman</td>
                                            <td> Rp
                                                <?php echo number_format($transaksi->biaya_pengiriman,0,',','.'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Bayar</td>
                                            <td> Rp <?php echo number_format($transaksi->total_bayar,0,',','.'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Metode Pembayaran</td>
                                            <td>
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
                                            <td>
                                                <?php echo date("d-m-Y", strtotime($transaksi->batas_waktu_pengiriman)); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Batas Pembayaran</td>
                                            <td> <?php echo date("d-m-Y", strtotime($transaksi->tanggal_transaksi)); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </table>
                            <div class="form-group">
                                <p><small>Konfirmasi pembayaran sebelum batas waktu pembayaran berakhir. Pesanan
                                        pelanggan akan
                                        secara otomatis tidak akan diproses.</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ml-2 pt-4">
                        <!-- <a class="btn btn-secondary"
                            href="{{URL('/ka_riwayat_pemesanan/riwayat_pemesanan')}}">Kembali</a> -->
                        <a class="btn btn-secondary"
                            href="{{URL('ka_riwayat_pemesanan/riwayat_pemesanan_transaksi/'.$transaksi->kode_transaksi)}}">Rincian Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
