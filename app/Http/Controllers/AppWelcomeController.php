<?php

namespace App\Http\Controllers;

use App\App_welcome;
use Illuminate\Http\Request;
use Crypt;
use App\Jualanku;

class AppWelcomeController extends Controller
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
     * @param  \App\App_welcome  $app_welcome
     * @return \Illuminate\Http\Response
     */
    public function show(App_welcome $app_welcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\App_welcome  $app_welcome
     * @return \Illuminate\Http\Response
     */
    public function edit(App_welcome $app_welcome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\App_welcome  $app_welcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, App_welcome $app_welcome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\App_welcome  $app_welcome
     * @return \Illuminate\Http\Response
     */
    public function destroy(App_welcome $app_welcome)
    {
        //
    }

     /**
     * Show details item.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function details($id)
    {
        $id_decrypt = Crypt::decrypt($id);

        $getJualanku    = Jualanku::where('id',$id_decrypt)
                                    ->where('jumlah','>=',1)
                                    ->firstOrFail();

        return view('detail',compact('getJualanku'));
    }
}
