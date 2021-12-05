<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jualanku;
use App\BukuBank;
use App\Alamat;
use App\Bank;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getAlamat  = Alamat::where('id_user',Auth::User()->id)->first();
        $getBukuBank = BukuBank::where('id_users',Auth::User()->id)->first();
        $getPhone = User::select('phone','id','otp_status')->where('id',Auth::User()->id)->first();

        return view('home',compact('getAlamat','getBukuBank','getPhone'));
    }

}
