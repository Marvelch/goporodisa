<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Auth;
use DB;
use Alert;
use App\Riwayat_Pemesanan;
use App\Rincian_Transaksi;
use App\Riwayat_Transaksi;
use Illuminate\Http\Request;

class RiwayatPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getTransaksi = Transaksi::select('kode_transaksi','tanggal_transaksi','total_bayar')
                                    ->where('id_user',Auth::User()->id)
                                    // ->where('status_pembayaran',1)
                                    ->orderBy('id','DESC')
                                    ->paginate(10);

        if(count($getTransaksi) > 0)
        {
            for($i=0;$i<count($getTransaksi);$i++)
            {
                $rincianTransaksiData[] = Rincian_Transaksi::join('jualankus','jualankus.id','=','rincian_transaksis.id_jualanku')
                                                            ->where('kode_transaksi',$getTransaksi[$i]->kode_transaksi)
                                                            ->select('kode_transaksi','harga','jumlah_pesanan','nama_barang','gmbr_depan')                                                                     
                                                            // ->get();
                                                            ->first();
            }
        }else{
            $rincianTransaksiData = array();
        }

        return view('riwayat_pemesanan.index',compact('getTransaksi','rincianTransaksiData'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTransaksi($id)
    {
        $getTransaksi = Transaksi::where('kode_transaksi',$id)
                                ->where('id_user',Auth::User()->id)
                                ->firstOrFail();

        $getRincian_Transaksi = Rincian_Transaksi::where('kode_transaksi',$id)->get();

        $getPengiriman = Rincian_Transaksi::join('tokos','tokos.id','=','rincian_transaksis.id_toko')
                                        ->join('lokasis','lokasis.id','=','tokos.id_lokasi')
                                        ->where('kode_transaksi',$id)
                                        ->get();
        
        $getPeneriman = Rincian_Transaksi::join('alamats','alamats.id','=','rincian_transaksis.id_alamat_penerima')
                                        ->join('lokasis','lokasis.id','=','alamats.id_lokasi')
                                        ->where('kode_transaksi',$id)
                                        ->get();

        return view('riwayat_pemesanan.detail',compact('getTransaksi','getRincian_Transaksi','getPengiriman','getPeneriman'));
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
     * Display the specified resource.
     *
     * @param  \App\Riwayat_Pemesanan  $riwayat_Pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Riwayat_Pemesanan $riwayat_Pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Riwayat_Pemesanan  $riwayat_Pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Riwayat_Pemesanan $riwayat_Pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Riwayat_Pemesanan  $riwayat_Pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Riwayat_Pemesanan $riwayat_Pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Riwayat_Pemesanan  $riwayat_Pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Riwayat_Pemesanan $riwayat_Pemesanan)
    {
        //
    }

}
