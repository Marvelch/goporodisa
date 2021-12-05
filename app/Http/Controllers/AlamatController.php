<?php

namespace App\Http\Controllers;

use App\Alamat;
use Illuminate\Http\Request;
use App\Lokasi;
use Alert;
use Auth;
use Crypt;
use DB;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getLokasi  = Lokasi::all();
        $getAlamat  = Alamat::where('id_user',Auth::User()->id)->first();

        return view('alamat.index',compact('getLokasi','getAlamat'));
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
        $this->validate($request,
            [
                'getKecamatan' => 'required',
                'getAlamat'    => 'required|max:255|min:5',
            ],
            [
                'getKecamatan.required' => '* Periksa kembali penginputan alamat !',
            ]
        );

        DB::beginTransaction();

        try {
            Alamat::create([
                'id_lokasi'     => $request->getKecamatan,
                'id_user'       => Auth::User()->id,
                'alamat'        => $request->getAlamat,
            ]);

            DB::commit();

            Alert::success('Berhasil','Lokasi Berhasil Tersimpan !');
            return back();
        } catch (\Throwable $th) {
            //throw $th;
            // return $th->getMessage();
            
            DB::rollback();

            Alert::error('Gagal','Lokasi Pelanggan Bermasalah !');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $key = decrypt($id);

        $getAlamat = Alamat::where('id',$key)->first();
        $getLokasi  = Lokasi::all();

        return view('alamat.edit',compact('getAlamat','getLokasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alamat $alamat)
    {
        $this->validate($request,
        [
            'getAlamat'     => 'required',
        ],
        [
            'getAlamat.required' => 'Perhatikan pengisian lokasi alamat',
        ]);
    
        try {
            Alamat::where('id_user',Auth::User()->id)->update([
                'id_lokasi'     => $request->getKecamatan,
                'alamat'        => $request->getAlamat,
            ]);

            Alert::success('Berhasil','Lokasi Berhasil Di Perbaharui');
            return redirect('ka_alamat/alamat');
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
            // Alert::error('Gagal','Kesalahan Pengisian Alamat');
            // return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alamat $alamat)
    {
        //
    }
}
