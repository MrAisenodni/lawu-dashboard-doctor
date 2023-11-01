<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProviderController extends Controller
{
    protected $path = '/setting/provider';

    public function index()
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'districts'     => $this->district->select('id', 'name')->where('disabled', 0)->get(),
            'detail'        => $this->provider->where('disabled', 0)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('settings.provider', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'provider_npwp'         => 'required|unique:stg_provider,provider_npwp,'. $request->id .',id,disabled,1',
            'provider_name'         => 'required',
            'provider_email'        => 'unique:stg_provider,provider_email,'. $request->id .',id,disabled,1',
            'owner_npwp'            => 'unique:stg_provider,owner_npwp,'. $request->id .',id,disabled,1',
            'owner_email'           => 'unique:stg_provider,owner_email,'. $request->id .',id,disabled,1',
            'provider_address_2'    => 'max:3',
            'provider_address_3'    => 'max:3',
            'owner_address_2'       => 'max:3',
            'owner_address_3'       => 'max:3',
        ]);

        $data = [
            // Data Provider
            'provider_npwp'         => $request->provider_npwp,
            'provider_name'         => $request->provider_name,
            'provider_birth_place'  => $request->provider_birth_place,
            'provider_birth_date'   => date('Y-m-d', strtotime($request->provider_birth_date)),
            'provider_email'        => $request->provider_email,
            'provider_home_number'  => $request->provider_home_number,
            'provider_phone_number' => $request->provider_phone_number,
            'provider_address_1'    => $request->provider_address_1,
            'provider_address_2'    => $request->provider_address_2,
            'provider_address_3'    => $request->provider_address_3,
            'provider_district_id'  => $request->provider_district,
            'provider_ward'         => $request->provider_ward,
            'provider_logo'         => $request->old_provider_logo,
            'provider_picture'      => $request->old_provider_picture,

            // Data Owner
            'owner_npwp'            => $request->owner_npwp,
            'owner_nik'             => $request->owner_nik,
            'owner_name'            => $request->owner_name,
            'owner_birth_place'     => $request->owner_birth_place,
            'owner_birth_date'      => date('Y-m-d', strtotime($request->owner_birth_date)),
            'owner_email'           => $request->owner_email,
            'owner_home_number'     => $request->owner_home_number,
            'owner_phone_number'    => $request->owner_phone_number,
            'owner_address_1'       => $request->owner_address_1,
            'owner_address_2'       => $request->owner_address_2,
            'owner_address_3'       => $request->owner_address_3,
            'owner_district_id'     => $request->owner_district,
            'owner_ward'            => $request->owner_ward,
            'updated_at'            => now(),
            'updated_by'            => session()->get('sname').' ('.session()->get('srole').')',
        ];

        if ($request->provider_logo) {
            if ($request->old_provider_logo) File::delete(storage_path('app/public/'.$request->old_provider_logo));
            $file = $request->file('provider_logo');
            $extension = $request->provider_logo->getClientOriginalExtension();  // Get Extension
            $fileName = date('Y-m-d H-i-s', strtotime(now())) . '_' . explode('.', $request->provider_logo->getClientOriginalName())[0] . '_' . $request->owner_name . '.' . $extension;  // Concatenate both to get FileName
            (env('APP_ENV') == 'local') ? $filePath = $file->storeAs('provider/' . session()->get('srole') . session()->get('suser_id'), $fileName, 'public')
                : $filePath = $file->storeAs('storage/provider/' . session()->get('srole') . session()->get('suser_id'), $fileName, 'public');
            $data['provider_logo'] = $filePath;
        }

        if ($request->provider_picture) {
            if ($request->old_provider_picture) File::delete(storage_path('app/public/'.$request->old_provider_picture));
            $file = $request->file('provider_picture');
            $extension = $request->provider_picture->getClientOriginalExtension();  // Get Extension
            $fileName = date('Y-m-d H-i-s', strtotime(now())) . '_' . explode('.', $request->provider_picture->getClientOriginalName())[0] . '_' . $request->owner_name . '.' . $extension;  // Concatenate both to get FileName
            (env('APP_ENV') == 'local') ? $filePath = $file->storeAs('provider/' . session()->get('srole') . session()->get('suser_id'), $fileName, 'public')
                : $filePath = $file->storeAs('storage/provider/' . session()->get('srole') . session()->get('suser_id'), $fileName, 'public');
            $data['provider_picture'] = $filePath;
        }

        $this->provider->where('id', $request->id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Diubah.');
    }
}
