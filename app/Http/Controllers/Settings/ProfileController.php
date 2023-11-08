<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $path = '/profil';

    public function index()
    {
        $data = [
            'c_menu'        => $this->main_menu->select('id', 'title', 'url')->where('disabled', 0)->where('url', $this->path)->first(),
            'detail'        => $this->user->where('disabled', 0)->where('id', session()->get('suser_id'))->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('main_menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0) abort(403);

        return view('settings.profile.index', $data);
    }

    public function create()
    {
        $data = [
            'c_menu'        => $this->main_menu->select('id', 'title', 'url')->where('disabled', 0)->where('url', $this->path)->first(),
            'detail'        => $this->user->where('disabled', 0)->where('id', session()->get('suser_id'))->first(),
            'roles'         => $this->role->select('id', 'name')->where('disabled', 0)->get(),
            'group_menus'   => $this->group_menu->select('id', 'name')->where('disabled', 0)->get(),
            'genders'       => $this->gender->select('id', 'name')->where('disabled', 0)->get(),
            'religions'     => $this->religion->select('id', 'name')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('main_menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('settings.profile.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'address_2'     => 'max:3',
            'address_3'     => 'max:3',
            'email'         => 'unique:stg_user,email,'.session()->get('suser_id').',id,disabled,0',
            'full_name'     => 'required',
            'group_menu'    => 'required',
            'nik'           => 'required|unique:stg_user,nik,'.session()->get('suser_id').',id,disabled,0',
            'role'          => 'required',
            'username'      => 'required',
        ]);

        // Update data to stg_user table
        $data = [
            'nik'           => $request->nik,
            'full_name'     => $request->full_name,
            'gender_id'     => $request->gender,
            'birth_place'   => $request->birth_place,
            'birth_date'    => date('Y-m-d', strtotime($request->birth_date)),
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'home_number'   => $request->home_number,
            'address_1'     => $request->address_1,
            'address_2'     => $request->address_2,
            'address_3'     => $request->address_3,
            'religion_id'   => $request->religion,
            'role_id'       => $request->role,
            'group_menu_id' => $request->group_menu,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('suser_id').')',
        ];
        $this->user->where('id', session()->get('suser_id'))->update($data);

        // Update to stg_login table
        $data = [
            'user_id'       => session()->get('suser_id'),
            'username'      => $request->username,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('suser_id').')',
        ];
        if ($request->password != null) $data['password'] = Hash::make($request->password);

        $this->login->where('user_id', session()->get('suser_id'))->update($data);

        return redirect($this->path)->with('status', 'Data Profil Berhasil Diubah.');
    }
}
