<?php

namespace App\Http\Controllers;

use App\Search;
use App\Jualanku;
use Illuminate\Http\Request;

class SearchController extends Controller
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
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $kata_kunci = $request->search;

        if(empty($kata_kunci))
        {
            $kata_kunci = "kosong";
        }else{
            $kata_kunci = $kata_kunci;
        }
        
        $getData  = Jualanku::where('jumlah','>=',1)
                              ->where('status',1)
                              ->where('nama_barang','LIKE','%'.$kata_kunci.'%')
                              ->paginate(10);

        return view('search',compact('getData','kata_kunci'));
    }

    /**
     * Filter a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $kata_kunci = $request->search_id;

        if(empty($request->min_price)){
            $min = 1;
        }else{
            $min = $request->min_price;
        }

        if(is_null($request->max_price)){
            $max = 0;
        }else{
            $max = $request->max_price;
        }

        $getData  = Jualanku::where('jumlah','>=',1)
                              ->where('status',1)
                              ->where('nama_barang','LIKE','%'.$kata_kunci.'%')
                              ->whereBetween('harga',[$min, $max])
                              ->paginate(10);

        return view('search',compact('getData','kata_kunci'));
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
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function show(Search $search)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function edit(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        //
    }
}
