@extends('layouts.app_dashboard')

@section('content')
<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:100");

    * {
        box-sizing: border-box;
    }

    .coolBeans {
        border: 2px solid currentColor;
        border-radius: 3rem;
        color: #3498db;
        /* font-family: roboto; */
        font-size: 12px;
        /* height: 10px; */
        font-weight: 10;
        overflow: hidden;
        padding: 1rem 2rem;
        position: relative;
        text-decoration: none;
        transition: 0.2s transform ease-in-out;
        will-change: transform;
        z-index: 0;
    }

    .coolBeans::after {
        background-color: #26a5d0;
        border-radius: 3rem;
        content: '';
        display: block;
        height: 100%;
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        transform: translate(-100%, 0) rotate(10deg);
        transform-origin: top left;
        transition: 0.2s transform ease-out;
        will-change: transform;
        z-index: -1;
    }

    .coolBeans:hover::after {
        transform: translate(0, 0);
    }

    .coolBeans:hover {
        border: 2px solid transparent;
        color: #ffff;
        transform: scale(1.05);
        will-change: transform;
    }

</style>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top: 5%;">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halam Utama</a></li>
                    <li>Dashboard</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <section id="portfolio-details" class="portfolio-details mt-4 mb-5">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <img src="{{asset('assets/img/whoops.jpg')}}" alt="..." class="img-thumbnail shadow">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary col-md-12" data-toggle="modal" data-target="#exampleModal">Pilih
                            Foto</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow" style="">
                        <div class="card-body">
                            <table class="table table-borderless mt-2">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td>{{Auth::User()->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{Auth::User()->email}} - <span
                                                class="badge badge-primary">Terverifikasi</span></td>
                                    </tr>
                                    <tr>
                                        @if($getAlamat == null)
                                        <th scope="row">Lokasi Alamat</th>
                                        <td><a href="{{URL('ka_alamat/alamat')}}"><small>TAMBAH ALAMAT</small></a></td>
                                    </tr>
                                    @else
                                    <th scope="row">Alamat Rumah</th>
                                    <td>Kecamatan {{$getAlamat->Lokasis->nama_desa}}, {{$getAlamat->alamat}} - <a class="small" href="{{URL('ka_alamat/alamat')}}">UBAH</a></td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th scope="row">Nomor HP</th>
                                        @if($getPhone->phone == null)
                                        <td><span class="badge badge-secondary">Belum Terverifikasi</span> - <small><a
                                                    href="{{URL('ka_nomor_hp/nomor_hp')}}">TAMBAH NO HP</a></small></td>
                                        @else
                                        <?php
                                            $id = Crypt::encryptString($getPhone->id);
                                            $link = '/ka_nomor_hp/nomor_hp/'.$id.'/edit';
                                        ?>
                                        <td><?php echo "+62".substr($getPhone->phone,1);?> - <?php 
                                        if($getPhone->otp_status == 1)
                                        {
                                            echo "<small>TERBLOKIR SEMENTARA</small>";
                                        }else{
                                            echo "<small><a href='$link'>UBAH</a></small>";
                                        }
                                        ?>
                                        </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <hr>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary col-md-4"><i class="fas fa-user-cog"></i> UBAH BIODATA</button>
                            </div> -->
                        </div>
                    </div>
                    <div class="card mt-4 shadow">
                        <div class="card-body">
                            <table class="table table-borderless mt-2">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Bank</th>
                                        <td><?php 
                                    if(empty($getBukuBank))
                                    {
                                        // echo "<a href='{{url('ka_bank/buku_bank')}}'>Tambah Informasi Bank</a>";
                                        echo "<a href='ka_bank/buku_bank'><small>TAMBAH REKENING BANK</small></a>";
                                    }else{
                                        echo $getBukuBank->banks->nama_bank;
                                    }
                                ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No Rekening</th>
                                        <td><?php 
                                    if(empty($getBukuBank))
                                    {
                                        echo "";
                                    }else{
                                        echo $getBukuBank->nomor_rekening;
                                    }
                                ?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            @if($getBukuBank == null)

                            @else
                            <hr>
                            <div class="d-flex justify-content-end">
                                <?php
                                        $idbuku_bank = encrypt($getBukuBank->id);
                                    ?>
                                <a class="coolBeans col-md-4"
                                    href="{{URL('ka_bank/buku_bank/'.$idbuku_bank.'/edit')}}"><i
                                        class="fas fa-university mr-2"></i> UBAH REKENING BANK</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- <h5 class="mt-4">Pengelolaan Akun</h5>
                    <ul>
                        <li>Kata sandi dapat diubah apabila pengguna masing mengingat kata sandi lama dan mengubahnya ke
                            kata sandi baru.</li>
                        <li>Pengguna masih menggunakan nomor hp yang sama pada saat pendaftaran awal.</li>
                    </ul>
                    <button class="btn btn-primary mt-3"><i class="icofont-lock"></i> Ubah Kata Sandi</button> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    Hey {{Auth::User()->name}} layanan belum tersedia. Kembali lagi ya !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                            class="ml-2 mr-2">Tutup</span></button>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
