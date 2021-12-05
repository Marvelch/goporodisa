@extends('layouts.app_out')

@section('content')

<main id="main" class="space">
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <!-- <div class="section-title" data-aos="fade-up">
                <h2>Produk Terbaru</h2>
                <small>
                    <p>
                        <i>Temukan produk - produk terbaru cek sekarang pilih yang terbaik untuk kamu</i>
                    </p>
                </small>
            </div> -->
            <div class="row">
                <div class="col-md-9">
                    <div class="row d-flex content-justify-center" data-aos="fade-up" data-aos-delay="400">
                        @foreach($getData as $key => $item)
                        <div class="col-lg-3 portfolio-item filter-app col-md-push-3 cold-xs-12"
                            style="box-shadow: 1px 1px 1px 1px #88888830; border-radius: 5px;">
                            <div class="portfolio-wrap mt-1" style="border-radius: 10px;">
                                <img src="{{ env('BACKEND_URL') . "storage/$item->gmbr_depan"}}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="form-group mt-2 text-capitalize">
                                <p><small>
                                        <?php echo substr($item->nama_barang,0,20); echo ".." ?>
                                        <br>
                                        <?php echo "Rp " . number_format($item->harga,0,',','.'); ?>
                                        <br>
                                        <i class="fas fa-award text-primary mr-1"></i>
                                        {{$item->Lokasis->nama_desa}}
                                    </small></p>
                                <p></p>
                            </div>
                            <?php
                            $id = Crypt::encrypt($item->id);
                        ?>
                            <a class="btn btn-outline-primary col-md-12 mb-2" style="border-radius: 3px 3px 3px 3px;"
                                href="{{ url('informasi_barang/'.$id)}}"><i class="fas fa-shopping-cart"></i>
                                BELI</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow">
                        <div class="card-body small">
                            <form action="{{URL('ka_pencarian/pencarian/filter/')}}" method="get" autocomplate="off">
                            <div class="row">
                                <div class="col small">
                                    <label for="">Min Harga</label>
                                    <input type="text" class="form-control" name="min_price">
                                </div>
                                <div class="col small">
                                    <label for="">Max Harga</label>
                                    <input type="text" class="form-control" name="max_price">
                                </div>
                            </div>
                            <div class="form-group pt-3">
                                <input type="hidden" name="search_id" value="{{$kata_kunci}}">
                                <button type="submit" class="btn btn-primary col-md-12">FILTER</button>
                            </div>
                            <div class="form-group">
                                <p class="text-danger" id="error_notification"></p>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{$getData->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Section -->

    <script>
        $(document).ready(function () {
            // let min_harga = (window.location.pathname.split('/')[9]);
            // let max_harga = (window.location.pathname.split('/')[6]);

            // if()
            // var x;
            // if(min_harga == 0)
            // {
            //     x = '';
            // }else{
            //     x = min_harga;
            // }

            // $('#min_harga').val(x);
            // $('#max_harga').val(max_harga);
        });

        // $('#filter').on('click',function(){
        //     let min_harga = $('#min_harga').val();
        //     let max_harga = $('#max_harga').val();

        //     let url_trim = window.location.pathname;

        //     let last_path = (url_trim.split("/")[3]);

        //     var in_min_harga;

        //     if(min_harga === '')
        //     {
        //         in_min_harga = 0;
        //     }else{
        //         in_min_harga = min_harga;
        //     }

        //     if(min_harga === '' && max_harga === '')
        //     {  
        //         $('#error_notification').text('Max harga dan Min harga tidak boleh kosong');
        //         return false;  
        //     }else if(min_harga === '' && max_harga !== '')
        //     {
        //         Url = 'ka_pencarian/subfilter_pencarian/' + last_path +'/minharga/0/maxharga/'+ max_harga;
        //         window.location.pathname = Url;
        //     }else if(min_harga !== '' && max_harga === '')
        //     {
        //         $('#error_notification').text('Max harga tidak boleh kosong');
        //         return false;
        //     }else{
        //         Url = 'ka_pencarian/subfilter_pencarian/' + last_path +'/minharga'+ in_min_harga +'/max_harga'+ maxharga;
        //         window.location.pathname = Url;
        //     }

        // });

    </script>
    @endsection
