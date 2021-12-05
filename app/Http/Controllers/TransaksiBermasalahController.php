<?php

namespace App\Http\Controllers;

use App\TransaksiBermasalah;
use App\Transaksi;
use Auth;
use DB;
use Alert;
use Illuminate\Http\Request;

class TransaksiBermasalahController extends Controller
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
     * Laporkan transaksi tampilan awal.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporkan_transaksi($id)
    {
        $getTransaksi = Transaksi::where('kode_transaksi',$id)
                                    ->where('id_user',Auth::User()->id)
                                    ->select('kode_transaksi')
                                    ->get();
        
        return view('transaksi_bermasalah.laporkan',compact('getTransaksi'));
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
        date_default_timezone_set("Asia/Makassar");

        DB::beginTransaction();

        try {
            $getTransaksi = Transaksi::where('kode_transaksi',$request->kode_transaksi)->first();

            $getLaporanCheck = TransaksiBermasalah::where('kode_transaksi',$request->kode_transaksi)->first();

            if($getTransaksi->status_pesanan != "5" AND is_null($getLaporanCheck))
            {
                if($request->keterangan == NULL)
            {
                /* Menyimpan file ke table transaksi bermasalah */
                TransaksiBermasalah::create([
                    'kode_transaksi'    => $request->kode_transaksi,
                    'tanggal_pelaporan' => date('Y-m-d'),
                    'keterangan'        => $request->laporan,
                    'status_laporan'    => 1,
                ]);

                /* Transaksi update untuk kode transaksi */
                Transaksi::where('kode_transaksi',$request->kode_transaksi)
                                ->where('id_user',Auth::User()->id)
                                ->update([
                                        'status_pesanan'            => 5,
                                        'batas_konfirmasi_pesanan'  => date('Y-m-d',strtotime('+3 days')),
                                ]);
            }else{
                TransaksiBermasalah::create([
                    'kode_transaksi'    => $request->kode_transaksi,
                    'tanggal_pelaporan' => date('Y-m-d'),
                    'keterangan'        => $request->keterangan,
                    'status_laporan'    => 1,
                ]);

                /* Transaksi update untuk kode transaksi */
                Transaksi::where('kode_transaksi',$request->kode_transaksi)
                                ->where('id_user',Auth::User()->id)
                                ->update([
                                        'status_pesanan'            => 5,
                                        'batas_konfirmasi_pesanan'  => date('Y-m-d',strtotime('+3 days')),
                                ]);
            }
            }else{
                Alert::info('LAPORAN EXPIRED','Laporan Telah Dibuat. Pastikan Pengecekan Kembali.');
                return redirect('ka_riwayat_pemesanan/riwayat_pemesanan_transaksi/'.$request->kode_transaksi);
            }

            DB::commit();

            Alert::success('LAPORAN TERKIRIM','Tunggu Proses Pengecekan Dari Tim Goporodisa');
            return redirect('ka_riwayat_pemesanan/riwayat_pemesanan_transaksi/'.$request->kode_transaksi);
        } catch (\Throwable $th) {
            //throw $th;
            // return $th->getMessage();
            DB::rollback();
            Alert::error('LAPORAN GAGAL','Laporan Bermasalah, Hubungi Goporodisa Untuk Pelaporan');
            return redirect('ka_riwayat_pemesanan/riwayat_pemesanan_transaksi/'.$request->kode_transaksi);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiBermasalah  $transaksiBermasalah
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiBermasalah $transaksiBermasalah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiBermasalah  $transaksiBermasalah
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiBermasalah $transaksiBermasalah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiBermasalah  $transaksiBermasalah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiBermasalah $transaksiBermasalah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiBermasalah  $transaksiBermasalah
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiBermasalah $transaksiBermasalah)
    {
        //
    }

    /**
     * Laporan masalah pada transaksi pelanggan.
     *
     * @param  \App\TransaksiBermasalah  $transaksiBermasalah
     * @return \Illuminate\Http\Response
     */
    public function laporkan(Request $request, $id)
    {
        //
    }
}
