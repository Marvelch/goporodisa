@extends('layouts.app_dashboard')

@section('content')
<main id="main"  class="space">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Riwayat Penarikan Dana</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details mt-5">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row m-1">
                        <p>Menghindari kesalahan pada transaksi penarikan dana pelanggan baca <a href="{{URL('http://127.0.0.1:8000/ka_halaman/syarat_dan_ketentuan')}}">syarat dan ketentuan.</a></p>
                        <div class="table-responsive mt-4">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>KODE PENARIKAN</th>
                                        <th>TOTAL PENARIKAN</th>
                                        <th>BIAYA LAYANAN</th>
                                        <th>DITERIMA</th>
                                        <th>STATUS</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getPenarikan as $key => $item)
                                    <tr>
                                        <td>{{$item->kode_unik}}</td>
                                        <td><?php echo "Rp " . number_format($item->total,0,',','.'); ?></td>
                                        <td><?php echo "Rp " . number_format($item->biaya_layanan,0,',','.'); ?></td>
                                        <td><?php 
                                            echo "Rp " . number_format($item->total_diterima,0,',','.'); 
                                        ?></td>
                                        <td>
                                            <?php
                                                if($item->status == 1)
                                                {
                                                    echo "Proses";
                                                }else{
                                                    echo "Transfer Berhasil";
                                                }
                                            ?>
                                        </td>
                                        <td>{{$item->keterangan}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                {{$getPenarikan->links()}}
            </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="TransactionModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body m-2">
                    <div class="form-group">
                        <small>
                            <p id="notification" class="text-danger mt-1"></p>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold small">Jumlah Penarikan</label>
                        <input type="text" class="form-control" id="jumlahPenarikan" required>
                    </div>
                    <label for="" class="font-weight-bold small">Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" aria-describedby="inputGroupPrepend2"
                            required>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2" onclick="Shfunction()"><i
                                    class="fas fa-eye" id="icon_eye"></i></span>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary ml-1" id="konfirmasi">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
