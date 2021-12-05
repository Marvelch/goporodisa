@extends('layouts.app_out')

@section('content')
<main id="main" class="space">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Beranda</a></li>
                    <li>Informasi Produk</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details mb-5 mt-5">
        <div class="container">
            <form action="{{URL('ka_keranjang/keranjang')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="owl-carousel portfolio-details-carousel item">
                            <img src="{{ env('BACKEND_URL') . "storage/$getJualanku->gmbr_depan"}}" class="img-fluid"
                                alt="">
                            <img src="{{ env('BACKEND_URL') . "storage/$getJualanku->gmbr_kiri"}}" class="img-fluid"
                                alt="">
                            <img src="{{ env('BACKEND_URL') . "storage/$getJualanku->gmbr_kanan"}}" class="img-fluid"
                                alt="">
                            <img src="{{ env('BACKEND_URL') . "storage/$getJualanku->gmbr_belakang"}}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-1">

                    </div>
                    <div class="col-lg-4 portfolio-info">
                        <h3>{{$getJualanku->nama_barang}}</h3>
                        <ul>
                            <li><strong>Harga</strong>:
                                <?php echo "Rp " . number_format($getJualanku->harga,0,',','.'); ?>
                            </li>
                            <li><strong>Kondisi</strong>:
                                <?php if($getJualanku->kondisi == 1){ echo "Baru"; }else{ echo "Bekas"; } ?></li>
                            <li><strong>Stok</strong>: <span id="stok">{{$getJualanku->jumlah}}</span></li>
                            <li><strong>Berat</strong>: {{$getJualanku->berat}} Kg</li>
                            <li><strong>Merek</strong>: {{$getJualanku->merek}}</li>
                        </ul>
                        <?php
                            $id = Crypt::encrypt($getJualanku->id);
                        ?>
                        <input type="hidden" class="" name="id" value="<?php echo $id ?>">
                        <p>
                            {{$getJualanku->deskripsi}}
                        </p>
                        <div class="form-group mt-4">
                            <form>
                                <div class="row">
                                    <div class="ml-3" style="margin-top: 3px;">
                                        <button name="mines" type="button" class="btn btn-primary mines">-</button>
                                    </div>
                                    <div class="" style="margin: 0px 50px 0px 2px; width: 16%;">
                                        <input type="text" name="getJumlah" class="form-control text-center getJumlah"
                                            value="1" style="height: 34px; margin-top: 4px; border-radius: 0px;">
                                    </div>
                                    <div style="margin: 3px 0px 0px -48px;">
                                        <button name="plus" type="button" class="btn btn-primary plus">+</button>
                                    </div>
                                </div>
                            </form>

                            <div class="form-group pt-4">
                                <button type="submit" name="add-to-cart"
                                    class="btn btn-primary col-md-6 add-to-cart">Beli
                                    Sekarang</button>
                            </div>
                            <p id="alert"></p>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
<script>
    $('.plus').click(function () {
        var plus = $('.getJumlah').val();

        var stok = $('#stok').text();

        let total = parseInt(plus) + 1;
        $('.getJumlah').val(total);

        if (parseInt(plus) == parseInt(stok) - 1) {
            $('button[name="plus"]').attr('disabled', 'disabled');
        } else {
            $('button[name="mines"]').removeAttr('disabled');
            $('button[name="add-to-cart"]').removeAttr('disabled');
        }

    });

    $('.mines').click(function () {
        var mines = $('.getJumlah').val();

        var stok = $('#stok').text();

        let total = parseInt(mines) - 1;
        $('.getJumlah').val(total);

        if (parseInt(mines) == 1) {
            $('button[name="mines"]').attr('disabled', 'disabled');
            $('#alert').html('* Perhatikan penginputan jumlah barang !').css('font-style', 'italic').fadeIn(
                6000).fadeOut(10000);
            $('button[name="add-to-cart"]').attr('disabled', 'disabled');
        } else {
            $('button[name="mines"]').removeAttr('disabled');
        }

        if (parseInt(mines) != parseInt(stok) - 1) {
            $('button[name="plus"]').removeAttr('disabled');
        }
    });

</script>
@endsection
