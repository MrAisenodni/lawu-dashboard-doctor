<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataAccessController extends Controller
{
    protected $path = '/setting/data-access';

    public function index()
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'data'          => $this->data_access->select('id', 'role_id', 'title', 'module_name', 'table_name', 'condition')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0) abort(403);

        return view('settings.data_access.index', $data);
    }

    public function create()
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'roles'         => $this->role->select('id', 'name')->where('disabled', 0)->get(),
            'tables'        => $this->migrations->select('migration')->where('id', '>', 4)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->add == 0) abort(403);
        
        return view('settings.data_access.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'role'          => 'required',
            'table'         => 'required',
            'condition'     => 'required',
        ]);

        // Insert data to stg_data_access table
        $data = [
            'role_id'       => $request->role,
            'title'         => $request->title,
            'module_name'   => $request->module_name,
            'table_name'    => $request->table,
            'condition'     => $request->condition,
            'created_at'    => now(),
            'created_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];
        $this->data_access->insert($data);

        return redirect($this->path)->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'detail'        => $this->data_access->select('id', 'role_id', 'title', 'module_name', 'table_name', 'condition')->where('id', $id)->where('disabled', 0)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->detail == 0) abort(403);
        
        return view('settings.data_access.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'roles'         => $this->role->select('id', 'name')->where('disabled', 0)->get(),
            'tables'        => $this->migrations->select('migration')->where('id', '>', 4)->get(),
            'detail'        => $this->data_access->select('id', 'role_id', 'title', 'module_name', 'table_name', 'condition')->where('id', $id)->where('disabled', 0)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('settings.data_access.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'role'          => 'required',
            'table'         => 'required',
            'condition'     => 'required',
        ]);

        // Insert data to stg_data_access table
        $data = [
            'role_id'       => $request->role,
            'title'         => $request->title,
            'module_name'   => $request->module_name,
            'table_name'    => $request->table,
            'condition'     => $request->condition,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];
        $this->data_access->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];
        $this->data_access->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
