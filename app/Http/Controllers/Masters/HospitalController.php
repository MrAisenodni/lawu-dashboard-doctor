<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    protected $path = '/master/hospital';

    public function index()
    {
        $data_access = $this->data_access->where('role_id', session()->get('srole_id'))->first();

        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'data'          => $this->hospital->select('id', 'code', 'name', 'color', 'background')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0) abort(403);

        // Filter berdasarkan Data Akses
        if ($data_access)
            $data['data'] = $this->modules[$data_access->table_name]->select('id', 'code', 'name', 'color', 'background')->whereRaw($data_access->condition)->get();

        return view('masters.hospital.index', $data);
    }

    public function create()
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->add == 0) abort(403);
        
        return view('masters.hospital.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'          => 'required',
            'background'    => 'required',
            'color'         => 'required',
        ]);

        $data = [
            'code'          => $request->code,
            'name'          => $request->name,
            'background'    => $request->background,
            'color'         => $request->color,
            'created_at'    => now(),
            'created_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];

        $this->hospital->insert($data);

        return redirect($this->path)->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data_access = $this->data_access->where('role_id', session()->get('srole_id'))->first();

        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'detail'        => $this->hospital->select('id', 'code', 'name', 'color', 'background')->where('id', $id)->where('disabled', 0)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->detail == 0) abort(403);
        
        // Filter berdasarkan Data Akses
        if ($data_access)
        {
            $check = $this->modules[$data_access->table_name]->select('id', 'code', 'name', 'color', 'background')->whereRaw($data_access->condition)->get();
            
            foreach ($check as $item) {
                if ($item->id == $data['detail']->id) {
                    return view('masters.hospital.show', $data);
                } 
            }
            abort(403);
        }

        return view('masters.hospital.show', $data);
    }

    public function edit($id)
    {
        $data_access = $this->data_access->where('role_id', session()->get('srole_id'))->first();

        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'detail'        => $this->hospital->select('id', 'code', 'name', 'color', 'background')->where('id', $id)->where('disabled', 0)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
            
        // Filter berdasarkan Data Akses
        if ($data_access)
        {
            $check = $this->modules[$data_access->table_name]->select('id', 'code', 'name', 'color', 'background')->whereRaw($data_access->condition)->get();
            
            foreach ($check as $item) {
                if ($item->id == $data['detail']->id) {
                    return view('masters.hospital.show', $data);
                } 
            }
            abort(403);
        }

        return view('masters.hospital.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name'          => 'required',
            'background'    => 'required',
            'color'         => 'required',
        ]);

        $data = [
            'code'          => $request->code,
            'name'          => $request->name,
            'background'    => $request->background,
            'color'         => $request->color,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];

        $this->hospital->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];

        $this->hospital->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
