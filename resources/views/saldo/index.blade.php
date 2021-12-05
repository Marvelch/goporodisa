@extends('layouts.app_dashboard')

@section('content')
<main id="main" class="space">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-start align-items-center">
                <ol>
                    <li><a href="{{URL('/')}}">Halaman Utama</a></li>
                    <li>Saldo</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details mt-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row m-1">
                        <div class="col-md-6 text-center font-weight-bold">
                            <p style="font-size: 40px; margin-top: 100px;">
                                <?php echo "Rp " . number_format($totalSaldoTransaksi,0,',','.');?>
                                <input type="hidden" name="" id="totalKeuangan" value="{{$totalSaldoTransaksi}}">
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>Nama Lengkap</td>
                                                    <td>{{$rekeningBank->nama_lengkap}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Bank Tujuan</td>
                                                    <td>{{$rekeningBank->Banks->nama_bank}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Rekening</td>
                                                    <td>{{$rekeningBank->nomor_rekening}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#TransactionModalCenter"><i class="fas fa-receipt mr-2"></i> TARIK
                                    DANA</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group small mt-3">
                            <b><a href="{{URL('ka_saldo/riwayat_penarikan')}}"><i class="fas fa-history mr-2"></i> Riwayat Penarikan Dana</a></b>
                        </div>
                    </div>
                </div>
            </div>
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
</main><!-- End #main -->
<script>
    function Shfunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }

        $('#icon_eye').toggleClass('fas fa-eye').toggleClass('fas fa-eye-slash');
    }

    // Format Rupiah 
    var rupiah = document.getElementById('jumlahPenarikan');

    rupiah.addEventListener('keyup', function (e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }

    $('#konfirmasi').on('click', function () {
        var totalKeuangan = $('#totalKeuangan').val().replace(/[.\{\}\[\]\\\/]/gi, '');
        var jumlahPenarikan = $('#jumlahPenarikan').val().replace(/[.\{\}\[\]\\\/]/gi, '');

        if (parseInt(jumlahPenarikan) < 10000) {
            $('#notification').text('Minimal Penarikan Rp 10.000');
        } else if (jumlahPenarikan.length == 0) {
            $('#notification').text('Jumlah Penarikan Tidak Boleh Kosong');
        } else if (parseInt(jumlahPenarikan) >= parseInt(totalKeuangan)) {
            $('#notification').text('Penarikan Tidak Boleh Lebih Dari Total Saldo');
        } else {
            runProses()
        }
    });

    function runProses() {
        var getPassword = $('#password').val();
        var getJumlahPenarikan = $('#jumlahPenarikan').val().replace(/[.\{\}\[\]\\\/]/gi, '');

        $.ajax({
            url: "{{URL('/ka_saldo/saldo')}}",
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",

                "password": getPassword,
                "total": getJumlahPenarikan,
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
    }

</script>
@endsection
