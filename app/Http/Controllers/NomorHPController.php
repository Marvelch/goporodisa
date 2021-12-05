<?php

namespace App\Http\Controllers;

use App\HP\Nomor_HP;
use App\User;
use Auth;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NomorHPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getOTP = User::select('otp_code','phone','id')->where('id',Auth::User()->id)->first();
        
        return view('hp.index',compact('getOTP'));
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
            'phone' => 'required|min:10|max:14',
        ]);

        date_default_timezone_set("Asia/Makassar");
        
        try {

            $getPhone = User::select('phone','total_request')->where('phone',$request->phone)->first();

            if($getPhone != null)
            {
                Alert::error('NOMOR HP','Nomor HP Telah Digunakan Dan Telah Terdaftar');
                return redirect('/ka_nomor_hp/nomor_duplikat/'.$request->phone);
            }else{
                $getRandom = rand(10000,99999);

                $userkey = 'f716e2ce24d9';
                $passkey = '965c7bbb3c5d03f50c45c78e';
                $telepon =  $request->phone;
                $message = 'GOPORODISA '.$getRandom.' KONFIRMASI LAYANAN.';
                $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
                $curlHandle = curl_init();
                curl_setopt($curlHandle, CURLOPT_URL, $url);
                curl_setopt($curlHandle, CURLOPT_HEADER, 0);
                curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
                curl_setopt($curlHandle, CURLOPT_POST, 1);
                curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
                    'userkey' => $userkey,
                    'passkey' => $passkey,
                    'to' => $telepon,
                    'message' => $message
                ));
                $results = json_decode(curl_exec($curlHandle), true);
                curl_close($curlHandle);

                User::where('id',Auth::User()->id)->update([
                    'phone'             => $request->phone,
                    'otp_code'          => $getRandom,
                    'phone_verified'    => 0,
                ]);

                $OTP_Block = date('Y-m-d H:i:s',strtotime('+1 days',strtotime('08:00:00')));

                // Menghitung total request OTP
                if($getPhone == null){
                    User::where('id',Auth::User()->id)->update([
                        'total_request'     => 1,
                    ]);
                }elseif($getPhone->total_request == 2){
                    User::where('id',Auth::User()->id)->update([
                        'otp_status'     => 1,
                        'block_otp_time' => $OTP_Block,
                    ]);
                }else{
                    User::where('id',Auth::User()->id)->update([
                        'total_request'     => $getPhone->total_request + 1,
                    ]);
                }
            }
            
            Alert::success('Sukses','Periksa Kode OTP Pada Kontak SMS');
            return redirect('/ka_nomor_hp/nomor_hp');
        } catch (\Throwable $th) {
            // Alert::error('Gagal','Verifikasi kode OTP bermasalah !');
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HP\Nomor_HP  $nomor_HP
     * @return \Illuminate\Http\Response
     */
    public function Duplikat($id)
    {
        $nomor_hp = $id;

        return view('hp.duplikat',compact('nomor_hp'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HP\Nomor_HP  $nomor_HP
     * @return \Illuminate\Http\Response
     */
    public function show(Nomor_HP $nomor_HP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HP\Nomor_HP  $nomor_HP
     * @return \Illuminate\Http\Response
     */
    public function edit(Nomor_HP $nomor_HP)
    {
        $getNomorHP = User::select('phone')->where('id',Auth::User()->id)->first();

        return view('hp.edit',compact('getNomorHP'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HP\Nomor_HP  $nomor_HP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'otp_code' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $getOTP = User::select('otp_code')->where('id',$id)->first();

            if($getOTP->otp_code == $request->otp_code)
            {
                User::where('id',$id)->update([
                    'phone_verified' => 1,
                    'otp_status'     => 1,
                ]);
            }else{
                DB::rollBack();

                Alert::error('GAGAL VERIFIKASI','Kesalahan Verifikasi Kode Ulang Kembali');
                return back();
            }

            DB::rollBack();

            Alert::success('NOMOR HP','Nomor HP Berhasil Terverifikasi');
            return redirect('/home');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

            Alert::error('GAGAL VERIFIKASI','Kesalahan Verifikasi Kode Ulang Kembali');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HP\Nomor_HP  $nomor_HP
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nomor_HP $nomor_HP)
    {
        //
    }

    /**
     * Update New Phone Number.
     *
     * @param  \App\HP\Nomor_HP  $nomor_HP
     * @return \Illuminate\Http\Response
     */
    public function Phone_Change(Request $request, Nomor_HP $nomor_HP)
    {
        $this->validate($request,
        [
            'phone' => 'required|min:10|max:13',
        ]);

        DB::beginTransaction();

        try {
            $getPhone = User::select('phone')->where('phone',$request->phone)->first();

            if($getPhone != null)
            {
                Alert::error('NOMOR HP','Nomor HP Telah Digunakan Dan Telah Terdaftar');
                return redirect('/ka_nomor_hp/nomor_duplikat/'.$request->phone);
            }else{
                $getRandom = rand(10000,99999);

                $userkey = 'f716e2ce24d9';
                $passkey = '965c7bbb3c5d03f50c45c78e';
                $telepon =  $request->phone;
                $message = 'GOPORODISA '.$getRandom.' KONFIRMASI LAYANAN.';
                $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
                $curlHandle = curl_init();
                curl_setopt($curlHandle, CURLOPT_URL, $url);
                curl_setopt($curlHandle, CURLOPT_HEADER, 0);
                curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
                curl_setopt($curlHandle, CURLOPT_POST, 1);
                curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
                    'userkey' => $userkey,
                    'passkey' => $passkey,
                    'to' => $telepon,
                    'message' => $message
                ));
                $results = json_decode(curl_exec($curlHandle), true);
                curl_close($curlHandle);

                User::where('id',Auth::User()->id)->update([
                    'phone'             => $request->phone,
                    'otp_code'          => $getRandom,
                    'phone_verified'    => 0,
                ]);

                $OTP_Block = date('Y-m-d',strtotime('+1 days'));

                // Menghitung total request OTP
                if($getPhone == null){
                    User::where('id',Auth::User()->id)->update([
                        'total_request'     => 1,
                    ]);
                }elseif($getPhone->total_request == 2){
                    User::where('id',Auth::User()->id)->update([
                        'otp_status'     => 1,
                        'block_otp_time' => $OTP_Block,
                    ]);
                }else{
                    User::where('id',Auth::User()->id)->update([
                        'total_request'     => $getPhone->total_request + 1,
                    ]);
                }
            }

            DB::commit();
            Alert::success('Sukses','Periksa Kode OTP Pada Kontak SMS');
            return redirect('/ka_nomor_hp/nomor_hp');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }
    }

    /**
     * Update New Phone Number.
     *
     * @param  \App\HP\Nomor_HP  $nomor_HP
     * @return \Illuminate\Http\Response
     */
    public function Click_Change(Request $request, Nomor_HP $nomor_HP)
    {

        DB::beginTransaction();

        try {
            $getPhone = User::select('phone','total_request')->where('id',Auth::User()->id)->first();

            $getRandom = rand(10000,99999);

            $userkey = 'f716e2ce24d9';
            $passkey = '965c7bbb3c5d03f50c45c78e';
            $telepon =  $request->phone;
            $message = 'GOPORODISA '.$getRandom.' KONFIRMASI LAYANAN.';
            $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
            $curlHandle = curl_init();
            curl_setopt($curlHandle, CURLOPT_URL, $url);
            curl_setopt($curlHandle, CURLOPT_HEADER, 0);
            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
            curl_setopt($curlHandle, CURLOPT_POST, 1);
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
                'userkey' => $userkey,
                'passkey' => $passkey,
                'to' => $telepon,
                'message' => $message
            ));
            $results = json_decode(curl_exec($curlHandle), true);
            curl_close($curlHandle);

            User::where('id',Auth::User()->id)->update([
                'otp_code'          => $getRandom,
            ]);

            $OTP_Block = date('Y-m-d',strtotime('+2 days'));

            // Menghitung total request OTP
            if($getPhone == null){
                User::where('id',Auth::User()->id)->update([
                    'total_request'     => 1,
                ]);
            }elseif($getPhone->total_request == 2){
                User::where('id',Auth::User()->id)->update([
                    'otp_status'     => 1,
                    'block_otp_time' => $OTP_Block,
                ]);

                DB::commit();
                Alert::info('OTP BLOKIR','Permintaan OTP Terlalu Sering, Menyebabkan Pemblokiran Sementara');
                return redirect('/home');
            }else{
                User::where('id',Auth::User()->id)->update([
                    'total_request'     => $getPhone->total_request + 1,
                ]);
            }

            DB::commit();
            Alert::success('Sukses','Periksa Kode OTP Pada Kontak SMS');
            return redirect('/ka_nomor_hp/nomor_hp');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }
    }
}
