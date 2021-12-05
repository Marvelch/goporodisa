<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Keranjang;
use App\Jualanku;
use App\Toko;
use App\Alamat;
use App\Ongkir;
use App\Rincian_Transaksi;
use Illuminate\Http\Request;
use App\Riwayat_Transaksi;
use Response;
use Auth;
use Alert;
use URL;
use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Processing COD Payment.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function Payment_Transaction(Request $request)
    {
        date_default_timezone_set("Asia/Makassar");

        $id_user = Auth::user()->id;

        /*
        |----------------------------------------------------
        | Format kode unik dari setiap transaksi
        | 
        | Tahun Transaksi . ID Transaksi Terakhir + 1 . ID User . Nilai Random 10 s/d 99
        |----------------------------------------------------
        */

        $last_id = Transaksi::latest('created_at')->first();

        if(empty($last_id))
        {
            $kode_id = 0;
        }else{
            $kode_id = $last_id->id + 1;
        }

        /* Kode unik dari setiap transaksi */
        $kode_transaksi = date('Y').Auth::User()->id.$kode_id.rand(10,99);
        
        /* Pengecekan data pada keranjang belanja */
        $getKeranjang = Keranjang::where('id_user',$id_user)->get();

        /* Mengambil harga, berat barang, id_seller dari table jualanku */
        for($i = 0; $i < count($getKeranjang); $i++){
            $jualankuData[] = Jualanku::select('harga','berat','id_seller','jumlah')
                                        ->where('id',$getKeranjang[$i]->id_jualanku)->get();
        }

        /* Mengambil lokasi users */
        $getAlamat = Alamat::where('id_user',$id_user)
                            ->select('id_lokasi','id')
                            ->get();

        /* Menghitung total per transaksi dan menghitung grand total transaksi */
        $total = 0;
        $tarifOngkir = 0;
        for($i = 0; $i < count($getKeranjang); $i++){
            $total += $getKeranjang[$i]->jumlah_pesanan * $jualankuData[$i][0]->harga; 
            
            /* Mengambil lokasi toko */
            $tokoData[] = Toko::join('lokasis','lokasis.id','=','tokos.id_lokasi')
                                ->where('id_seller',$jualankuData[$i][0]->id_seller)
                                ->select('id_lokasi','tokos.id')
                                ->get();
            
            /* Menghitung Ongkis Kirim */
            $getOngkir[] = Ongkir::where('id_lokasi_awal',$tokoData[$i][0]->id_lokasi)
                                ->where('id_lokasi_akhir',$getAlamat[0]->id_lokasi)
                                ->select('tarif')
                                ->get();
            
            $tarifOngkir += $getOngkir[$i][0]->tarif * ($jualankuData[$i][0]->berat * $getKeranjang[$i]->jumlah_pesanan);
        }

        /* Menghitung biaya layanan per transaksi */
        $biayaLayanan = $total * 0.01;

        /* Menghitung grand total transaksi */
        $grandTotal = $total + $biayaLayanan + $tarifOngkir;

        /* Handle transaksi yang sama pada waktu yang sama */
        if($grandTotal == 0)
        {
            Alert::error('Duplikat Transaksi','Transaksi Kamu Duplikat, Proses Transaksi Sebelumnya.');
            return response()->json(['url'=>url('/ka_keranjang/keranjang')]);
        }

        DB::beginTransaction();

        try {

            /* Simpan semua transaksi ke tabel transaksi */
            Transaksi::create([
                'kode_transaksi'                    => $kode_transaksi,
                'tanggal_transaksi'                 => date('Y-m-d'),
                'id_user'                           => Auth::User()->id,
                'biaya_layanan'                     => $biayaLayanan,
                'biaya_pengiriman'                  => $tarifOngkir,
                'total_bayar'                       => $grandTotal,
                'ketegori_pengiriman'               => $request->kategoriPengiriman,
                'metode_pembayaran'                 => $request->metodePembayaran,
                'tanggal_batas_konfirmasi_staff'    => date('Y-m-d',strtotime('+1 days')),
                'batas_waktu_pengiriman'            => date('Y-m-d',strtotime('+2 days')),
                'batas_konfirmasi_pesanan'          => date('Y-m-d',strtotime('+4 days')),
                'status_pembayaran'                 => 0, // Default 
                'status_pesanan'                    => 0, // Dafault
                'total_harga_barang'                => $total,
            ]);

            for($i = 0; $i < count($getKeranjang); $i++){
                Rincian_Transaksi::create([
                    'kode_transaksi'        => $kode_transaksi,
                    'id_jualanku'           => $getKeranjang[$i]->id_jualanku,
                    'harga_barang'          => $jualankuData[$i][0]->harga,
                    'jumlah_pesanan'        => $getKeranjang[$i]->jumlah_pesanan,
                    'berat_barang'          => $jualankuData[$i][0]->berat,
                    'id_toko'               => $tokoData[$i][0]->id,
                    'id_alamat_penerima'    => $getAlamat[0]->id,
                    'id_seller'             => $jualankuData[$i][0]->id_seller,
                ]);

                /* Menghitung jumlah stok dan melakukan update*/
                $cekStok = $jualankuData[$i][0]->jumlah - $getKeranjang[$i]->jumlah_pesanan;
                
                /* Handle kesalahan apabila stok tidak tersedia */
                if($getKeranjang[$i]->jumlah_pesanan > $jualankuData[$i][0]->jumlah)
                {
                    DB::rollback();
                    
                    return URL('/ka_pemberitahuan/stok_kurang');
                }

                /* Memperbaharui stok terbaru */
                Jualanku::where('id',$getKeranjang[$i]->id_jualanku)->update([
                    'jumlah' => $cekStok,
                ]);
            }

            /* Menghapus data pada table keranjangs */
            Keranjang::where('id_user',Auth::User()->id)->delete();

            DB::commit();

            // Alert::success('Transaksi Berhasil','Terima Kasih. Transaksi Diproses Oleh Goporodisa.');
            return URL('/ka_transaksi/invoice/'.$kode_transaksi);
        } catch (\Throwable $th) {
            DB::rollback();

            return $th->getMessage();
        }

    }

    // public function getPayment(Request $request) 
    // {
    //     $getTransaksi = Transaksi::latest('created_at')->first();

    //     if(empty($getTransaksi))
    //     {
    //         $kode_id = 0;
    //     }else{
    //         $kode_id = $getTransaksi->id + 1;
    //     }

    //     $kode_unik = substr(date('Ymd'),2).$kode_id.Auth::User()->id.date('H').rand(100,999);

    //     date_default_timezone_set("Asia/Makassar");

    //     if(date('H:m:s') <= date('H:m:s', strtotime("13:00:00")))
    //     {
    //         $getwaktupengiriman = date('Y-m-d 10:00:00');
    //     }else{
    //         $getwaktupengiriman = date('Y-m-d H:i:s',strtotime('+2 days',strtotime('08:00:00')));
    //     }

    //     // Kode Transaksi | ID Terakhir Transaksi + 1 - ID Pelanggan - No Telepon 

    //     $getTransaksi = Transaksi::latest('created_at')->first();

    //     if(empty($getTransaksi))
    //     {
    //         $kode_id = 0;
    //     }else{
    //         $kode_id = $getTransaksi->id + 1;
    //     }

    //     $kode_unik = substr(date('Ymd'),2).$kode_id.Auth::User()->id.date('H').rand(100,999);

    //     DB::beginTransaction();

    //     try {

    //         Transaksi::create([
    //             'kode_transaksi'            => $kode_unik,
    //             'tanggal_transaksi'         => date('Y-m-d'),
    //             'id_user'                   => Auth::User()->id,
    //             'biaya_layanan'             => $request->biaya_layanan,
    //             'biaya_pengiriman'          => $request->biaya_pengiriman,
    //             'total_bayar'               => $request->total_bayar,
    //             'ketegori_pengiriman'       => $request->kategori_pengiriman,
    //             'metode_pembayaran'         => $request->metode_pembayaran,
    //             'batas_waktu_pengiriman'    => $getwaktupengiriman,
    //             'tanggal_pemesanan'         => date('Y-m-d H:m:s'),
    //             'status_pembayaran'         => 0,
    //             'status_pesanan'            => 0,
    //             'total_harga_barang'        => $request->total_harga_barang,
    //         ]);

    //         for($i = 0; $i < count($request->harga); $i++)
    //         {
    //             Rincian_Transaksi::create([
    //                 'kode_transaksi'        => $kode_unik,
    //                 'id_jualanku'           => $request->julanaku[$i],
    //                 'harga_barang'          => $request->harga[$i],
    //                 'jumlah_pesanan'        => $request->jumlah_pesanan[$i],
    //                 'berat_barang'          => $request->berat_barang[$i],
    //                 'id_alamat_pengirim'    => $request->alamat_pengirim[$i],
    //                 'id_alamat_penerima'    => $request->alamat_penerima,
    //                 'id_seller'             => $request->id_seller[$i],
    //             ]);

    //             $getStok = Jualanku::Select('jumlah')->where('id',$request->julanaku[$i])->get();

    //             if($getStok[0]->jumlah == 0)
    //             {
    //                 Jualanku::where('id',$request->julanaku[$i])->update([
    //                     'status' => "0",
    //                 ]);

    //                 DB::commit();
                    
    //                 return URL('/ka_pemberitahuan/stok');
    //             }elseif($getStok[0]->jumlah < $request->jumlah_pesanan[$i])
    //             {
    //                 return URL('/ka_pemberitahuan/stok_kurang');
    //             }

    //             Jualanku::where('id',$request->julanaku[$i])->update([
    //                 'jumlah' => $getStok[0]->jumlah - $request->jumlah_pesanan[$i]
    //             ]);
    //         }

    //         $Keranjang = Keranjang::where('id_user',Auth::User()->id);
    //         $Keranjang->delete();

    //         // Set your Merchant Server Key
    //         \Midtrans\Config::$serverKey = 'SB-Mid-server-bv-26_6R4ADWaz5WHKukhy7-';
    //         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //         \Midtrans\Config::$isProduction = false;
    //         // Set sanitization on (default)
    //         \Midtrans\Config::$isSanitized = true;
    //         // Set 3DS transaction for credit card to true
    //         \Midtrans\Config::$is3ds = true;
            
    //         $params = array(
    //             'transaction_details' => array(
    //                 'order_id' => $kode_unik,
    //                 'gross_amount' => $request->total_bayar,
    //             ),
    //             'customer_details' => array(
    //                 'first_name' => Auth::User()->name,
    //                 'last_name' => 'Goporodisa',
    //                 'email' => Auth::User()->email,
    //                 'phone' => '08111222333',
    //             ),
    //         );
            
    //         $snapToken = \Midtrans\Snap::getSnapToken($params);

    //         DB::commit();

    //         // Alert::success('Transaksi Berhasil','Transaksi kamu COD tolong perhatikan ketentuan COD');
    //         // return response()->json(['url'=>url('/home')]);
    //         return $snapToken;
    //     } catch (\Throwable $th) {

    //         DB::rollback();
    //         return $th->getMessage();
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    /**
     * Detail invoice after payments
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $transaksi = Transaksi::where('kode_transaksi',$id)
                                ->where('id_user',Auth::User()->id)
                                ->firstOrFail();

        return view('keranjang.invoice',compact('transaksi'));
    }

    // public function getPaymentBank(Request $request)
    // {
    //     date_default_timezone_set("Asia/Makassar");

    //     // if(date('H:m:s') <= date('H:m:s', strtotime("13:00:00")))
    //     // {
    //     //     $getwaktupengiriman = date('Y-m-d 10:00:00');
    //     // }else{
    //     //     $getwaktupengiriman = date('Y-m-d H:i:s',strtotime('+2 days',strtotime('08:00:00')));
    //     // }

    //     // Kode Transaksi | ID Terakhir Transaksi + 1 - ID Pelanggan - No Telepon 

    //     $getTransaksi = Transaksi::latest('created_at')->first();

    //     if(empty($getTransaksi))
    //     {
    //         $kode_id = 0;
    //     }else{
    //         $kode_id = $getTransaksi->id + 1;
    //     }

    //     $kode_unik = substr(date('Ymd'),2).$kode_id.Auth::User()->id.date('H').rand(100,999);

    //     DB::beginTransaction();

    //     try {

    //         Transaksi::create([
    //             'kode_transaksi'                    => $kode_unik,
    //             'tanggal_transaksi'                 => date('Y-m-d'),
    //             'id_user'                           => Auth::User()->id,
    //             'biaya_layanan'                     => $request->biaya_layanan,
    //             'biaya_pengiriman'                  => $request->biaya_pengiriman,
    //             'total_bayar'                       => $request->total_bayar,
    //             'ketegori_pengiriman'               => $request->kategori_pengiriman,
    //             'metode_pembayaran'                 => $request->metode_pembayaran,
    //             'batas_waktu_pengiriman'            => date('Y-m-d',strtotime('+2 days')),
    //             'tanggal_batas_konfirmasi_staff'    => date('Y-m-d',strtotime('+1 days')),
    //             'status_pembayaran'                 => 0,
    //             'status_pesanan'                    => 0,
    //             'total_harga_barang'                => $request->total_harga_barang,
    //         ]);

    //         for($i = 0; $i < count($request->harga); $i++)
    //         {
    //             Rincian_Transaksi::create([
    //                 'kode_transaksi'        => $kode_unik,
    //                 'id_jualanku'           => $request->julanaku[$i],
    //                 'harga_barang'          => $request->harga[$i],
    //                 'jumlah_pesanan'        => $request->jumlah_pesanan[$i],
    //                 'berat_barang'          => $request->berat_barang[$i],
    //                 'id_toko'               => $request->id_toko[$i],
    //                 'id_alamat_penerima'    => $request->alamat_penerima,
    //                 'id_seller'             => $request->id_seller[$i],
    //             ]);

    //             $getStok = Jualanku::Select('jumlah')->where('id',$request->julanaku[$i])->get();

    //             $status_Stok = $getStok[0]->jumlah - $request->jumlah_pesanan[$i];
                
    //             if( $status_Stok == 0)
    //             {
    //                 Jualanku::where('id',$request->julanaku[$i])->update([
    //                     'status' => "0",
    //                 ]);

    //                 // DB::commit();
                    
    //                 // return URL('/ka_pemberitahuan/stok');
    //             }elseif($getStok[0]->jumlah < $request->jumlah_pesanan[$i])
    //             {
    //                 return URL('/ka_pemberitahuan/stok_kurang');
    //             }

    //             Jualanku::where('id',$request->julanaku[$i])->update([
    //                 'jumlah' => $getStok[0]->jumlah - $request->jumlah_pesanan[$i]
    //             ]);
    //         }

    //         $Keranjang = Keranjang::where('id_user',Auth::User()->id);
    //         $Keranjang->delete();

    //         // DB::commit();

    //         // Alert::success('Transaksi Berhasil','Transaksi kamu COD tolong perhatikan ketentuan COD');
    //         // return response()->json(['url'=>url('/home')]);
    //         // return URL('/ka_transaksi/invoice/'.$kode_unik);
    //     } catch (\Throwable $th) {

    //         DB::rollback();

    //         return $th->getMessage();
    //         // return URL('/ka_transaksi/error/');
    //     }
    // }

    /**
     * Erro handle.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function error()
    {
        return view('keranjang.error');
    }

    /**
     * Pembatalan Transaksi Oleh Pelanggan.
     *
     * @param  \App\Riwayat_Pemesanan  $riwayat_Pemesanan
     * @return \Illuminate\Http\Response
     */
    public function konfirmasi_pembatalan(Request $request, $kode_transaksi)
    {
        DB::beginTransaction();
    
        try {
            /* Mengambil ID transaksi terakhir dari table riwayat transaksi */
            $getRincian = Riwayat_Transaksi::latest('id')->select('id')->first();

            $id = $getRincian->id + 1;

            /*---------------------------------------------------------------------------
            | FORMAT KODE PEMBATALAN 
            |
            | CT - ID Pelanggan - Hari dan Bulan - Nilai Random dari 10 hingga 99
            ----------------------------------------------------------------------------*/

            $kode_transaksi_pembatalan = "CT".Auth::User()->id.$id.date('dm').rand(10,99);

            /* Pengecekan metode pembayaran */
            $getTransaksi = Transaksi::where('kode_transaksi',$kode_transaksi)
                                      ->where('id_user',Auth::User()->id)
                                      ->select('metode_pembayaran','total_bayar','status_pembayaran')
                                      ->first();

            // Mengambil data rincian transaksi berdasarkan kode transaksi 
            $getRincianTransaksi = Rincian_transaksi::where('kode_transaksi',$kode_transaksi)
                                                    ->select('id_jualanku','jumlah_pesanan')
                                                    ->get();

            if($getTransaksi->metode_pembayaran == 1)
            {
                
                /* Pengecekan pembayaran oleh pelanggan */
                if($getTransaksi->status_pembayaran == 1)
                {
                    Transaksi::where('kode_transaksi',$kode_transaksi)
                                ->where('id_user',Auth::User()->id)
                                ->update([
                                    'status_pesanan' => 4,
                                ]);

                    Rincian_Transaksi::where('kode_transaksi',$kode_transaksi)
                                        ->update([
                                            'status_pesanan_per_transaksi' => 2,
                                        ]);

                    /* Pengembalian saldo pelanggan berdasarkan jumlah transfer */
                    Riwayat_Transaksi::create([
                        'id_user'           => Auth::User()->id,
                        'kode_transaksi'    => $kode_transaksi,
                        'total'             => $getTransaksi->total_bayar,
                        'status_transaksi'  => 1,
                        'tanggal'           => date('Y-m-d'),
                    ]);

                    /* Pengembalian Stok Barang */
                    for($i=0;$i<count($getRincianTransaksi);$i++)
                    {
                        // Mengambil stok terakhir
                        $getJualanku = Jualanku::where('id',$getRincianTransaksi[$i]->id_jualanku)
                                                ->select('jumlah')
                                                ->first();
                        
                        Jualanku::where('id',$getRincianTransaksi[$i]->id_jualanku)->update([
                            'jumlah'    => $getJualanku->jumlah + $getRincianTransaksi[$i]->jumlah_pesanan,
                        ]);
                    }
                }else{
                    /* Tidak mengembalikan saldo karena pelanggan belum melakukan transafer */
                    Transaksi::where('kode_transaksi',$kode_transaksi)
                                ->where('id_user',Auth::User()->id)
                                ->update([
                                    'status_pesanan' => 4,
                                ]);

                    Rincian_Transaksi::where('kode_transaksi',$kode_transaksi)
                                        ->update([
                                            'status_pesanan_per_transaksi' => 2,
                                        ]);

                     /* Pengembalian Stok Barang */
                     for($i=0;$i<count($getRincianTransaksi);$i++)
                     {
                         // Mengambil stok terakhir
                         $getJualanku = Jualanku::where('id',$getRincianTransaksi[$i]->id_jualanku)
                                                 ->select('jumlah')
                                                 ->first();
                         
                         Jualanku::where('id',$getRincianTransaksi[$i]->id_jualanku)->update([
                             'jumlah'    => $getJualanku->jumlah + $getRincianTransaksi[$i]->jumlah_pesanan,
                         ]);
                     }
                }
            }else{
                Transaksi::where('kode_transaksi',$kode_transaksi)
                       ->where('id_user',Auth::User()->id)
                       ->update([
                           'status_pesanan' => 4,
                       ]);

                Rincian_Transaksi::where('kode_transaksi',$kode_transaksi)
                                    ->update([
                                        'status_pesanan_per_transaksi' => 2,
                                    ]);
                
                 /* Pengembalian Stok Barang */
                 for($i=0;$i<count($getRincianTransaksi);$i++)
                 {
                     // Mengambil stok terakhir
                     $getJualanku = Jualanku::where('id',$getRincianTransaksi[$i]->id_jualanku)
                                             ->select('jumlah')
                                             ->first();
                     
                     Jualanku::where('id',$getRincianTransaksi[$i]->id_jualanku)->update([
                         'jumlah'    => $getJualanku->jumlah + $getRincianTransaksi[$i]->jumlah_pesanan,
                     ]);
                 }
            }

            DB::commit();
            
            Alert::success('PEMBATALAN TRANSAKSI','TRANSAKSI BERHASIL DIBATALKAN');
            return back();
        } catch (\Throwable $th) {
            DB::rollback();

            return $th->getMessage();
        }
    }

    /**
     * Konfirmasi Penerimaan Paket Oleh Pelanggan.
     *
     * @param  \App\Riwayat_Pemesanan  $riwayat_Pemesanan
     * @return \Illuminate\Http\Response
     */
    public function konfirmasi_pesanan(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            Transaksi::where('kode_transaksi',$id)->update([
                'status_pengiriman' => 2,
                'konfirmasi_pelanggan' => 1,
                'tanggal_konfirmasi' => date('Y-m-d'),
            ]);

            DB::commit();
            
            Alert::success('PAKET DITERIMA','TERIMA KASIH. PAKET TELAH DITERIMA.');
            // return URL('/ka_riwayat_pemesanan/riwayat_pemesanan_transaksi/'.$id);
            return back();
        } catch (\Throwable $th) {

            DB::rollback();

            Alert::error('PAKET BERMASALAH','Transaksi Kamu Memiliki Masalah Hubungi Kontak Goporodisa');
            return back();
        }
    }

}
