<?php

use Illuminate\Support\Facades\Route;
use App\Jualanku;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/', function () {
    $getJualanku  = Jualanku::where('jumlah','>=',1)
                              ->where('status',1)->take(6)->get();
                            
    $getRandom    = Jualanku::where('jumlah','>=',1)
                             ->where('status',1)->inRandomOrder()->limit(6)->get();
                             
    $getBigRandom = Jualanku::where('jumlah','>=',1)
                                ->where('status',1)->inRandomOrder()->limit(20)->get();

    return view('welcome',compact('getJualanku','getRandom','getBigRandom'));
});

Route::get('informasi_barang/{id}','AppWelcomeController@details');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'ka_pencarian'], function() {
    Route::get('pencarian','SearchController@search');
    Route::get('pencarian/filter/','SearchController@filter');
});

// Halaman Tidak Menggunakan Controller 
Route::group(['prefix'=>'ka_halaman'], function() {
    Route::get('goporodisa','HalamanController@goporodisa');
    Route::get('kategori/{id}','HalamanController@category');
    Route::get('pemberitahuan','HalamanController@announcement');
    Route::get('syarat_dan_ketentuan','HalamanController@termsandconditions');
    Route::get('karir','HalamanController@career');
    Route::get('tentang_kami','HalamanController@about');
    Route::get('kebijakan','HalamanController@privacy');
});

Route::group(['middleware' => ['auth']], function() {

    Route::group(['prefix'=>'ka_keranjang'], function() {
        Route::resource('keranjang','KeranjangController');
    });

    Route::group(['prefix'=>'ka_informasi'], function() {
        Route::resource('informasi','AppWelcomeController');
    });

    Route::group(['prefix'=>'ka_alamat'], function() {
        Route::resource('alamat','AlamatController');
    });

    Route::group(['prefix'=>'ka_otp_sms'], function() {
        Route::resource('sms','SmsController');
    });

    Route::group(['prefix'=>'ka_transaksi'], function() {
        Route::resource('transaksi','TransaksiController');
        Route::post('payment_transaction','TransaksiController@Payment_Transaction')->name('Pembayaran_COD');
        // Route::post('getpayment','TransaksiController@getPayment');
        // Route::post('getPaymentBank','TransaksiController@getPaymentBank');
        Route::get('invoice/{id}','TransaksiController@invoice');
        Route::get('invoice_bank/{id}','TransaksiController@invoice');
        Route::get('error','TransaksiController@error');
        /* Konfirmasi Pembatalan Transaksi Oleh Pelanggan*/
        Route::post('konfirmasi_pembatalan/{kode_transaksi}','TransaksiController@konfirmasi_pembatalan');
        /* Konfirmasi Penerimaan Paket Oleh Pelanggan*/
        Route::post('konfirmasi_pesanan/{id}','TransaksiController@konfirmasi_pesanan');
    });

    Route::group(['prefix'=>'ka_pembayaran'], function() {
        Route::resource('pembayaran','PembayaranController');
    });

    Route::group(['prefix'=>'ka_pengiriman'], function() {
        Route::resource('pengiriman','PengirimanController');
    });

    Route::group(['prefix'=>'ka_pemberitahuan'], function() {
        Route::get('stok',function(){
            return view('pemberitahuan.stok');
        });
        Route::get('stok_kurang',function(){
            return view('pemberitahuan.stok_kurang');
        });
    });

    Route::group(['prefix'=>'ka_riwayat_pemesanan'], function() {
        Route::resource('riwayat_pemesanan','RiwayatPemesananController');  
        Route::get('riwayat_pemesanan_transaksi/{id}','RiwayatPemesananController@getTransaksi');
    });

    Route::group(['prefix'=>'ka_bank'], function() {
        Route::resource('buku_bank','BukuBankController');
    });

    Route::group(['prefix'=>'ka_nomor_hp'], function() {
        Route::resource('nomor_hp','NomorHPController');
        Route::get('nomor_duplikat/{id}','NomorHPController@Duplikat');
        Route::post('ganti_nomor_hp','NomorHPController@Phone_Change');
        Route::get('permintaan_otp','NomorHPController@Click_Change');
    });

    Route::group(['prefix'=>'ka_saldo'], function() {
        Route::resource('saldo','SaldoController');
        Route::get('riwayat_penarikan','SaldoController@RiwayatPenarikan');
    });

    Route::group(['prefix'=>'ka_lapor'], function() {
        Route::resource('laporkan','TransaksiBermasalahController');
        Route::get('laporkan_transaksi/{id}','TransaksiBermasalahController@laporkan_transaksi');
        Route::post('buat_laporan/{id}','TransaksiBermasalahController@laporkan');
    });
});