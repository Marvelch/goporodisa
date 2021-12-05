<?php

namespace App\Http\Controllers;

use App\Saldo;
use App\User;
use App\BukuBank;
use App\PenarikanDana;
use App\Riwayat_Transaksi;
use App\Transaksi;
use Auth;
use Alert;
use DB;
use Crypt;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekeningBank = BukuBank::where('id_users',Auth::User()->id)
                                ->firstOrFail();

        // $saldo = Transaksi::join('riwayat__transaksis','riwayat__transaksis.kode_transaksi','=','Transaksis.kode_transaksi')
        //                         ->where('riwayat__transaksis.id_user',Auth::User()->id)
        //                         ->orWhere('konfirmasi_pelanggan',1)
        //                         ->orWhere('konfirmasi_pelanggan',2)
        //                         ->orWhere('status_pesanan',6)
        //                         ->Where('status_transaksi',1)
        //                         ->select('riwayat__transaksis.total')
        //                         ->get();

        // Pembatalan Dari Kode Transaksi
        $pembatalanPelanggan = Transaksi::join('riwayat__transaksis','riwayat__transaksis.kode_transaksi','=','transaksis.kode_transaksi')
                                        ->where('transaksis.id_user',Auth::User()->id)
                                        ->where('metode_pembayaran',1)
                                        ->where('status_pembayaran',1)
                                        ->where('status_pesanan',4)
                                        ->select('riwayat__transaksis.total')
                                        ->get();

        $pembatalanToko = Transaksi::join('rincian_transaksis','rincian_transaksis.kode_transaksi','=','Transaksis.kode_transaksi')
                                    ->join('riwayat__transaksis','riwayat__transaksis.id_rincian_transaksi','=','rincian_transaksis.id')
                                    ->where('Transaksis.id_user',Auth::User()->id)
                                    ->where('rincian_transaksis.ket_stok',2)
                                    ->where('status_pesanan',3)
                                    ->where('status_pesanan_per_transaksi',NULL)
                                    ->Orwhere('status_pesanan_per_transaksi',4)
                                    ->select('riwayat__transaksis.total')
                                    ->get();

        $penarikanSaldo = Riwayat_Transaksi::where('id_user',Auth::User()->id)
                                    ->where('status_transaksi',2)
                                    ->get();

        $saldoPembatalPelanggan = 0;
        for($i=0;$i < count($pembatalanPelanggan);$i++)
        {
            $saldoPembatalPelanggan += $pembatalanPelanggan[$i]->total;
        }

        $saldopembatalanToko = 0;
        for($i=0;$i < count($pembatalanToko);$i++)
        {
            $saldopembatalanToko += $pembatalanToko[$i]->total;
        }

        $penarikan = 0;
        for($i=0;$i < count($penarikanSaldo);$i++)
        {
            $penarikan += $penarikanSaldo[$i]->total;
        }

        $totalSaldoTransaksi = $saldoPembatalPelanggan + $saldopembatalanToko - $penarikan;

        return view('saldo.index',compact('rekeningBank','totalSaldoTransaksi'));
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
     * Penarikan Dana Pelanggan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        
        try {
            $authCheck = Auth::attempt(['email' => Auth::User()->email, 'password' => $request->password]);
            
            $id = PenarikanDana::select('id')->orderBy('id','desc')->first();

            if($id == null)
            {
                $kode_unik = "WD".Auth::User()->id."0".rand(10,99).date('Y');
            }else{
                $id_con = $id->id + 1;
                $kode_unik = "WD".Auth::User()->id.$id_con.rand(10,99).date('Y');
            }

            $biaya_layanan = $request->total * 0.06;

            if($authCheck == 1){
                Riwayat_Transaksi::create([
                    'id_user'           => Auth::User()->id,
                    'kode_transaksi'    => $kode_unik,
                    'total'             => $request->total,
                    'status_transaksi'  => 2,
                    'tanggal'           => date('Y-m-d'),
                ]);

                PenarikanDana::create([
                    'kode_unik'         => $kode_unik,
                    'id_user'           => Auth::User()->id,
                    'total'             => $request->total,
                    'biaya_layanan'     => $biaya_layanan,
                    'total_diterima'    => $request->total - $biaya_layanan,
                    'status'            => 1,
                    'tanggal_penarikan' => date('Y-m-d'),
                ]);
            }else{
                DB::rollback();

                Alert::error('GAGAL','Password Tidak Sesuai. Ulangi Kembali');
                return URL('/ka_saldo/saldo');
            }

            DB::commit();

            Alert::success('PENARIKAN','Penarikan Dana Sedang Kami Proses');
            return URL('/ka_saldo/saldo');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();

            Alert::error('GAGAL','Penarikan Dana Tidak Dapat Kami Proses');
            return URL('/ka_saldo/saldo');
            // return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function show(Saldo $saldo)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function edit(Saldo $saldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saldo $saldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saldo $saldo)
    {
        //
    }

    /**
     * Detail Penarikan Dana.
     *
     * @param  \App\Saldo  $saldo
     * @return \Illuminate\Http\Response
     */
    public function RiwayatPenarikan()
    {
        $getPenarikan = PenarikanDana::where('id_user',Auth::User()->id)
                                      ->paginate(8);

        return view('saldo.detail',compact('getPenarikan'));
    }
}
