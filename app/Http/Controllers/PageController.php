<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ Auth, DB, Hash };

class PageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $data_access = $this->data_access->where('role_id', session()->get('srole_id'))->first();

        $data = [
            'c_menu'            => $this->main_menu->select('id', 'title')->where('disabled', 0)->where('url', '/')->first(),
            'actions'           => $this->action->select('id', 'code', 'name', 'color', 'background')->where('disabled', 0)->get(),
            'c_action'          => $this->action,
            'assurances'        => $this->assurance->select('id', 'code', 'name', 'color', 'background')->where('disabled', 0)->get(),
            'c_assurance'       => $this->assurance,
            'hospitals'         => $this->hospital->select('id', 'code', 'name', 'color', 'background')->where('disabled', 0)->get(),
            'c_hospital'        => $this->hospital,
            'patients'          => $this->patient->getCount(null),
            'months'            => $this->patient->selectRaw('DISTINCT LAST_DAY(registration_date) AS registration_date')->where('disabled', 0)->orderBy('registration_date', 'DESC')->get(),
            'visit_methods'     => $this->visit_method->select('id', 'code', 'name', 'color', 'background')->where('disabled', 0)->get(),
            'search'            => $search,
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('main_menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0) abort(403);
        
        // Filter Rumah Sakit per Bulan
        if ($search) $data['hospitals'] = $this->hospital->getCount($search);

        // Filter berdasarkan Data Akses
        if ($data_access) {
            $data[$data_access->module_name]    = $this->modules[$data_access->table_name]->select('id', 'code', 'name', 'color', 'background')->whereRaw($data_access->condition)->get();
            $data['patients']                   = $this->patient->getCount($data_access->condition);
        }

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
