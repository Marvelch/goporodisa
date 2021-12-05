@extends('layouts.app_out')

@section('content')

<main id="main" class="margin-null">
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Ketegori {{$getKategori->kategori}}</h2>
                <small>
                    <p>
                        Pilih Semua Kategori {{$getKategori->kategori}} Sesuai Dengan Selera
                    </p>
                </small>
            </div>

            <div class="row d-flex justify-content-center" data-aos="fade-up" data-aos-delay="400">
                @foreach($getJualanku as $key => $item)
                <div class="col-lg-2 portfolio-item filter-app col-md-push-3 cold-xs-12 ml-2 shadow">
                    <div class="portfolio-wrap mt-1" style="border-radius: 10px;">
                        <img src="{{ env('BACKEND_URL') . "storage/$item->gmbr_depan"}}" class="img-fluid" alt="">
                        <!-- <div class="portfolio-info">
                        <h4>{{$item->nama_barang}}</h4>
                        <p><?php echo "Rp " . number_format($item->harga,0,',','.'); ?></p>
                        <div class="portfolio-links">
                            <a href="{{ env('BACKEND_URL') . "storage/$item->gmbr_depan"}}"></a>
                        </div>
                    </div> -->
                    </div>
                    <div class="form-group mt-2 text-capitalize">
                        <p><small>
                                <?php
                            $id = Crypt::encrypt($item->id);
                        ?>
                                <b><a href="{{ url('informasi_barang/'.$id)}}"
                                        class="text-dark"><?php echo substr($item->nama_barang,0,20) ?></a></b>
                                <br>
                                <?php echo "Rp " . number_format($item->harga,0,',','.'); ?>
                                <br>
                                <i class="fas fa-award text-primary mr-1"></i> {{$item->Lokasis->nama_desa}}
                            </small></p>
                        <p></p>
                    </div>
                    <?php
                            $id = Crypt::encrypt($item->id);
                        ?>
                    <a class="btn btn-outline-primary col-md-12 mb-3" href="{{ url('informasi_barang/'.$id)}}"><i
                            class="fas fa-shopping-cart mr-1"></i> Beli</a>
                </div>
                @endforeach
            </div>
            {{$getJualanku->links()}}
        </div>
    </section>
</main>
@endsection
