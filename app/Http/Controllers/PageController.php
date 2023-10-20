<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ Auth, DB, Hash };

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'c_menu'            => $this->main_menu->select('id', 'title')->where('disabled', 0)->where('url', '/')->first(),
            // 'sysmenu'           => DB::table('information_schema.INNODB_SYS_TABLES')->selectRaw("REPLACE(name, 'dashboard_doctor/', '') AS table_name")->where('name', 'LIKE', 'dashboard_doctor%')->orderBy('name')->get(),
        ];

        return view('index', $data);
    }

    public function login()
    {
        $data = [
            'provider'          => $this->provider->select('id', 'provider_name', 'provider_logo', 'provider_picture')->where('disabled', 0)->first(),
        ];

        return view('login', $data);
    }

    public function to_login(Request $request)
    {
        $validate = $request->validate([
            'username'              => 'required',
            'password'              => 'required',
        ]);

        
        $check = $this->login->where('username', $request->username)->where('disabled', 0)->first();
        
        if(!$check) {
            return back()->with('error', 'Nama Pengguna salah.')->withErrors([
                'username'  => 'Nama Pengguna yang Anda masukkan salah.',
            ]);
        } else {
            // Mengecek password
            if(Hash::check($request->password, $check->password)) {
                $request->session()->put('sid', $check->id);
                $request->session()->put('suser_id', $check->user_id);
                $request->session()->put('susername', $check->username);
                $request->session()->put('spassword', $check->password);
                $request->session()->put('sname', $check->user->full_name);
                $request->session()->put('srole_id', $check->user->role_id);
                $request->session()->put('sgroup_menu_id', $check->user->group_menu_id);
                $request->session()->put('spicture', $check->user->picture);
                $request->session()->put('spicture_name', $check->user->picture_name);
                $request->session()->put('sremember_token', $check->remember_token);

                return redirect()->intended('/');
            } else {
                return back()->with('error', 'Kata Sandi salah.')->withErrors([
                    'password'  => 'Kata sandi yang Anda masukkan salah.',
                ])->withInput();
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Anda berhasil keluar.');
    }
}
