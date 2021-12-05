@extends('layouts.app_out')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Keranjang</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row">
                {{ method_field('post') }}
                <div class="col-md-12">
                    @foreach($getKeranjang as $key => $item)
                    <div class="card shadow mt-2" style="max-width: 100%; border: none;">
                        <div class="row no-gutters">
                            <?php
                                $photo = $item->jualankus->gmbr_depan;
                            ?>
                            <div class="col-md-2" style="background: #868e96;">
                                <img src="{{ env('BACKEND_URL') . "storage/$photo"}}" class="card-img-top h-100"
                                    alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h5 class="card-title">{{$item->jualankus->nama_barang}}</h5>
                                        <p class="card-text">
                                            <small><?php echo "Rp " . number_format($item->jualankus->harga,0,',','.'); ?>

                                                 | Jumlah Pesanan : {{$item->jumlah_pesanan}} | Berat :
                                                {{$item->jualankus->berat}} Kg</small>
                                        </p>
                                        <p><small><span class="mr-5 pt-2">Lokasi Pengiriman :
                                                    {{$getLokasi[$key]->nama_desa}}</span></small></p>

                                        <!-- Khusus hidden area -->
                                        <input type="hidden" name="jualanku[]" value="{{$item->jualankus->id}}">
                                        <input type="hidden" name="id_seller[]" value="{{$item->jualankus->id_seller}}">
                                        <input type="hidden" name="harga[]" value="{{$item->jualankus->harga}}">
                                        <input type="hidden" name="jumlah_pesan[]" value="{{$item->jumlah_pesanan}}">
                                        <input type="hidden" name="berat[]" value="{{$item->jualankus->berat}}">
                                        <input type="hidden" name="id_toko[]" value="{{$getLokasi[$key]->id}}">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <form action="{{URL('ka_keranjang/keranjang/'.$item->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-primary mt-4 mr-3"
                                                style="border-radius: 7px;">
                                                Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </section>

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <h5 class="pb-2">Alamat Pengiriman Paket</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @forelse($getAlamat as $item)
                                <div class="form-group ml-3">
                                    <p>
                                        <i class="icofont-location-pin"></i> Kecamatan {{$item->Lokasis->nama_desa}}
                                    </p>
                                    <input type="hidden" name="getLokasiPelanggan" value="{{$item->id}}">
                                    <p><i class="icofont-home"></i> Lokasi Penerima Paket {{$item->alamat}}</p>
                                    <p><small>Lokasi pengiriman paket tidak sesuai ? <a
                                                href="{{URL('/ka_alamat/alamat')}}">Ganti lokasi penerima
                                                paket</a></small></p>
                                </div>
                                @empty
                                <div class="m-3">
                                    <p><span style="color: red;"><i class="fas fa-exclamation-triangle"></i></span> Hey
                                        {{Auth::User()->name}} kamu belum mengisi alamat tempat tinggal. Yuk lengkapi
                                        informasi <a href="{{URL('ka_alamat/alamat')}}">alamat tempat tinggal</a>.</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h5>Informasi Pingirman & Pembayaran</h5>
                    <div class="row">
                        <div class="col-md-6 pt-3">
                            <label for=""><small>Pilih Kategori Pengiriman</small></label>
                            <select name="ketegori_pengiriman" id="ketegori_pengiriman" class="form-control">
                                <option value="1">Normal - Pengiriman 1 s/d 3 Hari </option>
                            </select>
                        </div>
                        <div class="col-md-6 pt-3">
                            <label for=""><small>Metode Pembayaran</small></label>
                            <select name="" id="metode_pembayaran" class="form-control">
                                <option value="1">Transfer Bank BRI & Bank BSG</option>
                                <option value="2">COD (Cash on Delivery)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5">
                        <p>Pengiriman : Rp <span id="total_ongkir">
                                <?php echo number_format($total_ongkir,0,',','.'); ?></span></p>
                        <input type="hidden" name="total_ongkir" value="{{$total_ongkir}}">
                        <p>Harga Barang : Rp <span id="total"></span></p>
                        <input type="hidden" name="total_harga_barang" value="">
                        <p>
                            Biaya Layanan : Rp <span id="biaya_layanan"></span>
                            <input type="hidden" name="biaya_layanan" value="">
                        </p>
                        <hr>
                        Total : Rp <span id="total_bayar"></span>
                        <input type="hidden" name="total" id="" value="">
                    </div>
                </div>
            </div>
            @if($bankAccount AND Auth::User()->phone != null)
            <div class="form-group mt-5 d-flex justify-content-end">
                <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
            </div>
            @else
            <div class="form-group mt-5 d-flex justify-content-end text-primary font-weight-bold text-capitalize">
                <a href="{{URL('/home')}}">pembayaran belum tersedia, lengkapi profil pelanggan</a>
            </div>
            @endif
        </div>
    </section>
</main><!-- End #main -->
<script>
    $(document).ready(function () {

        var getJualanku = $('input[name^=jualanku]').map(function (idx, log) {
            return $(log).val();
        }).get();

        var getID_seller = $('input[name^=id_seller]').map(function (idx, log) {
            return $(log).val();
        }).get();

        var getHarga = $('input[name^=harga]').map(function (idx, log) {
            return $(log).val();
        }).get();

        var getjumlah_pesan = $('input[name^=jumlah_pesan]').map(function (idx, log) {
            return $(log).val();
        }).get();

        var getBerat = $('input[name^=berat]').map(function (idx, log) {
            return $(log).val();
        }).get();

        var getId_toko = $('input[name^=id_toko]').map(function (idx, log) {
            return $(log).val();
        }).get();

        var getKategoriPengiriman = $('#ketegori_pengiriman').val();

        var getKecamatan = $('input[name=kecamatan_penerima_paket]').val();

        var getLokasi = $('input[name=lokasi_penerima_paket]').val();

        var getLokasiPelanggan = $('input[name=getLokasiPelanggan]').val();

        var total = 0;
        var berat_barang = [];
        for (var i = 0; i < getHarga.length; i++) {
            total += getHarga[i] * getjumlah_pesan[i] << 0;

            berat_barang += getjumlah_pesan[i] * getBerat[i];
        }

        var reverse = total.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        total_change = ribuan.join('.').split('').reverse().join('');

        $('input[name=total]').val(total);

        $('#total').text(total_change);

        $('input[name=total_harga_barang]').val(total);

        // Menghitung biaya layanan dari goporodisa 
        var biaya_layanan = parseInt(total) * 0.01;

        var reverse_1st = biaya_layanan.toString().split('').reverse().join(''),
            ribuan_1st = reverse_1st.match(/\d{1,3}/g);
        biaya_layanan_change = ribuan_1st.join('.').split('').reverse().join('');

        $('input[name=biaya_layanan]').val(biaya_layanan);
        $('#biaya_layanan').text(biaya_layanan_change);

        var total_ongkir = $('input[name=total_ongkir').val();

        var total_bayar = parseInt(total) + parseInt(total_ongkir) + parseInt(biaya_layanan);

        var reverse_2st = total_bayar.toString().split('').reverse().join(''),
            ribuan_2st = reverse_2st.match(/\d{1,3}/g);
        total_bayar_change = ribuan_2st.join('.').split('').reverse().join('');

        if (total_ongkir > 0) {
            $('#pay-button').prop('disabled', false);
        } else {
            $('#pay-button').prop('disabled', true);
        }
        $('#total_bayar').text(total_bayar_change);

        var getTotal_harga_barang = $('input[name=total_harga_barang]').val();

        $('#pay-button').on("click", function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var getMetode_Pembayaran = $('#metode_pembayaran').val();

            $.ajax({
                url: "{{URL('/ka_transaksi/payment_transaction')}}",
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",

                    // Tabel Transaksi 
                    "total": total,
                    "biaya_layanan": biaya_layanan,
                    "total_bayar": total_bayar,
                    "biaya_pengiriman": total_ongkir,
                    "metodePembayaran": getMetode_Pembayaran,
                    "kategoriPengiriman": getKategoriPengiriman,
                    "total_harga_barang": getTotal_harga_barang,

                    // Tabel Rincian Transaksi
                    'jualanku_id': getJualanku,
                    'harga': getHarga,
                    'jumlah_pesanan': getjumlah_pesan,
                    'berat_barang': getBerat,
                    'id_toko': getId_toko,
                    'alamat_penerima': getLokasiPelanggan,
                    "id_seller": getID_seller,
                },
                success: function (response) {
                    window.location = response;
                    // console.log(response);
                },
                error: function (response) {
                    // console.log(response);
                    alert('Transaksi mengalami kesalahan hubungi cs Goporodisa');
                }
            });
        });
    });

    // if (getMetode_Pembayaran == "1") {
    // Pembayaran Menggunakan Payment Gateway

    // $.ajax({
    //     url: "{{URL('/ka_transaksi/getpayment')}}",
    //     method: 'post',
    //     data: {
    //         "_token": "{{ csrf_token() }}",

    //         // Tabel Transaksi 
    //         "total": total,
    //         "biaya_layanan": biaya_layanan,
    //         "total_bayar": total_bayar,
    //         "biaya_pengiriman": total_ongkir,
    //         "metode_pembayaran": getMetode_Pembayaran,
    //         "kategori_pengiriman": getKategoriPengiriman,
    //         "total_harga_barang": getTotal_harga_barang,

    //         // Tabel Rincian Transaksi
    //         'jualanku': getJualanku,
    //         'harga': getHarga,
    //         'jumlah_pesanan': getjumlah_pesan,
    //         'berat_barang': getBerat,
    //         'id_toko': getId_toko,
    //         'alamat_penerima': getLokasiPelanggan,
    //         'id_seller' : getID_seller,
    //     },
    //     success: function (data) {
    //         Token_(data);
    //         return data;
    //     }
    // });

    // function Token_(data) {
    //     window.snap.pay(data);
    // }

    // Payment Gateway 
    // var payButton = document.getElementById('pay-button');
    // // For example trigger on button clicked, or any time you need
    // payButton.addEventListener('click', function () {
    //     window.snap.pay('SNAP_TRANSACTION_TOKEN'); // Replace it with your transaction token
    // });

</script>
@endsection
