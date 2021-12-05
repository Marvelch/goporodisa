<?php

namespace App\Http\Controllers;

use App\Keranjang;
use Illuminate\Http\Request;
use Crypt;
use Auth;
use Alert;
use DB;
use App\Jualanku;
use App\Alamat;
use App\Toko;
use App\BukuBank;
use App\Lokasi;
use App\Ongkir;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $getKeranjang  = Keranjang::where('id_user',Auth::User()->id)->get();

            $getAlamat    = Alamat::where('id_user',Auth::User()->id)->get();

            $bankAccount = BukuBank::where('id_users',Auth::User()->id)->first();

            $getLokasi    = Jualanku::join('keranjangs','keranjangs.id_jualanku','=','jualankus.id')
                                    ->join('sellers','sellers.id','=','jualankus.id_seller')
                                    ->join('tokos','tokos.id_seller','=','jualankus.id_seller')
                                    ->join('lokasis','lokasis.id','=','tokos.id_lokasi')
                                    ->where('keranjangs.id_user','=',Auth::User()->id)
                                    ->select('tokos.*','lokasis.nama_desa','jualankus.berat')
                                    ->get();

            $getLokasiPenerima = Alamat::join('users','users.id','=','alamats.id_user')
                                        ->join('lokasis','lokasis.id','=','alamats.id_lokasi')
                                        ->where('alamats.id_user','=',Auth::User()->id)
                                        ->get();

            if(count($getAlamat) > 0){
                for($i = 0; $i < count($getKeranjang); $i++)
                {
                    $getOngkir = Ongkir::where('id_lokasi_awal',$getLokasi[$i]->id_lokasi)
                                        ->where('id_lokasi_akhir',$getLokasiPenerima[0]->id_lokasi)
                                        ->get();
                    
                    $arr_ongkir[] = ($getKeranjang[$i]->jumlah_pesanan * $getLokasi[$i]->berat) * $getOngkir[0]->tarif;
                }
            }

            if(empty($arr_ongkir))
            {
                $total_ongkir = 0;
            }else{
                $total_ongkir = array_sum($arr_ongkir);
            }

        // return $arr_ongkir;
        return view('keranjang.index',compact('getKeranjang','getAlamat','getLokasi','getLokasiPenerima','total_ongkir','bankAccount'));
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
        $id = Crypt::decrypt($request->id);

        DB::beginTransaction();

        try {
            $check = Keranjang::where('id_jualanku',$id)
                                ->where('id_user',Auth::User()->id)
                                ->first();

            if($check == null)
            {
                Keranjang::create([
                    'id_user'           => Auth::User()->id,
                    'id_jualanku'       => $id,
                    'jumlah_pesanan'    => $request->getJumlah,
                ]);
            }else{
                Keranjang::where('id_jualanku',$id)->update([
                    'jumlah_pesanan'    => $check->jumlah_pesanan + $request->getJumlah,
                ]);
            }

            DB::commit();

            alert::info('Keranjang Belanja','Barang telah ditambahkan ke keranjang belanja');
            // alert()->html('<i>HTML</i> <u>example</u>'," You can use <b>bold text</b>, <a href='//github.com'>links</a> and other HTML tags ",'success');
            return back();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        
        try {
            Keranjang::where('id',$id)
                      ->where('id_user',Auth::User()->id)
                      ->delete();

            DB::commit();

            Alert::success('BERHASIL','Barang berhasil dihapus dari keranjang belanja.');
            return back();
        } catch (\Throwable $th) {

            DB::rollback();
            Alert::error('GAGAL','Penghapusan Barang Bermasalah. Ulangi Kembali.');
            return back();
        }
    }

}
