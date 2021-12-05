<?php

namespace App\Http\Controllers;

use App\Halaman;
use App\Jualanku;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class HalamanController extends Controller
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
     * Display the specified resource.
     *
     * @param  \App\Halaman  $halaman
     * @return \Illuminate\Http\Response
     */
    public function show(Halaman $halaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Halaman  $halaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Halaman $halaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Halaman  $halaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Halaman $halaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Halaman  $halaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Halaman $halaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Halaman  $halaman
     * @return \Illuminate\Http\Response
     */
    public function goporodisa(Halaman $halaman)
    {
        return view('halaman.goporodisa');
    }

    /**
     * Karir Display.
     *
     * @param  \App\Halaman  $halaman
     * @return \Illuminate\Http\Response
     */
    public function career()
    {
        return view('halaman.career');
    }

    public function category($id)
    {
        $key = decrypt($id);

        $getJualanku  = Jualanku::join('kategoris','kategoris.id','=','jualankus.id_kategori')
                              ->where('id_kategori',$key)
                              ->where('jumlah','>=',1)
                              ->where('status',1)
                              ->paginate(15);
                            //   ->take(10)
                            //   ->get();

        $getKategori = Kategori::where('id',$key)->firstOrFail();

        return view('category',compact('getJualanku','getKategori'));
    }

    /**
     * Pemberitahuan.
     *
     * @param  \App\Halaman  $halaman
     * @return \Illuminate\Http\Response
     */
    public function announcement()
    {
        return view('announcement');
    }

    /**
     * Pemberitahuan.
     *
     * @param  \App\Halaman  $halaman
     * @return \Illuminate\Http\Response
     */
    public function termsandconditions()
    {
        return view('halaman.termsandconditions');
    }

    /**
     * About Goporodisa.
     *
     * @param  \App\Halaman  $halaman
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('halaman.about');
    }

    /**
     * Privacy Goporodisa.
     *
     * @param  \App\Halaman  $halaman
     * @return \Illuminate\Http\Response
     */
    public function Privacy()
    {
        return view('halaman.privacy');
    }
}
