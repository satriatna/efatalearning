<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function daftar()
    {
        $data['member']      =  new \App\Member();
        $data['action']         = 'MemberController@simpanDaftar';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('member_form',$data);
    }
    public function simpanDaftar(Request $request)
    {
        $validasi = $this->validate($request,[
            'email' => 'required|email|unique:members|min:2|max:30',
            'nama' =>  'required|min:2|max:30',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);        
        $data = $request->except('password_confirmation');
        $data['password'] = \Hash::make($request->password);
           \App\Member::create($data);
        return redirect('member/login')->with('pesan', 'Pendaftaran Berhasil, Silahkan Login!');
    }
    public function login()
    {
        $data['member']      =  new \App\Member();
        $data['action']         = 'MemberController@prosesLogin';
        $data['btn_submit']     = 'LOGIN';
        $data['method']         = "POST";        
        return view('member_login',$data);
    }
    public function prosesLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|max:50',
            'password' => 'required|min:3'
        ]);
        if(\Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password])){        
            return redirect('member/beranda');
        }       
        return back()->with('pesan','login gagal');
    }
    public function beranda()
    {
        $data[] = array();
        return view('member_beranda',$data);
}


}
