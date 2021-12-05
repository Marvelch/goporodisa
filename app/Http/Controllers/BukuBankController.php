<?php

namespace App\Http\Controllers;

use App\BukuBank;
use App\Bank;
use DB;
use Auth;
use Alert;
use encrypt;
use Illuminate\Http\Request;

class BukuBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getBank = Bank::all();
        
        return view('bank.index',compact('getBank'));
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
        DB::beginTransaction();

        try {
            //code...
            BukuBank::create([
                'id_users'          => Auth::User()->id,
                'nama_lengkap'      => $request->nama_lengkap,
                'nomor_rekening'    => $request->nomor_rekening,
                'id_bank'           => $request->id_bank,
            ]);

            DB::commit();

            Alert::success('Berhasil','BANK Telah kami terima. Terima kasih !');
            return redirect('/home');
        } catch (\Throwable $th) {
            //throw $th;

            DB::rollback();
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BukuBank  $bukuBank
     * @return \Illuminate\Http\Response
     */
    public function show(BukuBank $bukuBank)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BukuBank  $bukuBank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $key = decrypt($id);

        $getBukuBank = BukuBank::where('id',$key)
                                ->where('id_users',Auth::User()->id)
                                ->firstOrFail();
        $getBank = Bank::all();

        return view('bank.edit',compact('getBukuBank','getBank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BukuBank  $bukuBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::beginTransaction();

        try {
            //code...
            BukuBank::where('id',$id)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'nomor_rekening' => $request->nomor_rekening,
                'id_bank'       => $request->id_bank,
            ]);

            DB::commit();

            Alert::success('REKENING BANK','Berhasil Memperbaharui Data Rekening Bank');
            return redirect('/home');

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

            Alert::error('REKENING BANK','Gagal Memperbaharui Data Rekening Bank');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BukuBank  $bukuBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(BukuBank $bukuBank)
    {
        //
    }
}
