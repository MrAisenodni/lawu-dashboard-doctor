<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    protected $path = '/master/gender';

    public function index()
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url')->where('disabled', 0)->where('url', $this->path)->first(),
            'data'          => $this->gender->select('id', 'name')->where('disabled', 0)->get(),
        ];
        // $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
        //     ->where('role', session()->get('srole_id'))->where('menu_id', $data['c_menu']->id)->first();
        // if ($data['access']->view == 0) abort(403);

        return view('masters.gender.index', $data);
    }

    public function create()
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url')->where('url', $this->path)->first(),
        ];
        // $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
        //     ->where('role', session()->get('srole_id'))->where('menu_id', $data['c_menu']->id)->first();
        // if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('masters.gender.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'          => 'required',
        ]);

        $data = [
            'name'          => $request->name,
            'created_at'    => now(),
            'created_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];

        $this->gender->insert($data);

        return redirect($this->path)->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->gender->select('id', 'name')->where('id', $id)->where('disabled', 0)->first(),
        ];
        // $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
        //     ->where('role', session()->get('srole_id'))->where('menu_id', $data['c_menu']->id)->first();
        // if ($data['access']->view == 0 || $data['access']->detail == 0) abort(403);
        
        return view('masters.gender.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->gender->select('id', 'name')->where('id', $id)->where('disabled', 0)->first(),
        ];
        // $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
        //     ->where('role', session()->get('srole_id'))->where('menu_id', $data['c_menu']->id)->first();
        // if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('masters.gender.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name'          => 'required',
        ]);

        $data = [
            'name'          => $request->name,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];

        $this->gender->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];

        $this->gender->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
