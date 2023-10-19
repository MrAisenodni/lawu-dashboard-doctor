<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    protected $path = '/master/action';

    public function index()
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url')->where('disabled', 0)->where('url', $this->path)->first(),
            'data'          => $this->action->select('id', 'code', 'name', 'color', 'background')->where('disabled', 0)->get(),
        ];
        // $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
        //     ->where('role', session()->get('srole'))->where('menu_id', $data['c_menu']->id)->first();
        // if ($data['access']->view == 0) abort(403);

        return view('masters.action.index', $data);
    }

    public function create()
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url')->where('url', $this->path)->first(),
        ];
        // $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
        //     ->where('role', session()->get('srole'))->where('menu_id', $data['c_menu']->id)->first();
        // if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('masters.action.create', $data);
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
            'created_by'    => session()->get('sname').' ('.session()->get('srole').')',
        ];

        $this->action->insert($data);

        return redirect($this->path)->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->action->select('id', 'code', 'name', 'color', 'background')->where('id', $id)->where('disabled', 0)->first(),
        ];
        // $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
        //     ->where('role', session()->get('srole'))->where('menu_id', $data['c_menu']->id)->first();
        // if ($data['access']->view == 0 || $data['access']->detail == 0) abort(403);
        
        return view('masters.action.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->action->select('id', 'code', 'name', 'color', 'background')->where('id', $id)->where('disabled', 0)->first(),
        ];
        // $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
        //     ->where('role', session()->get('srole'))->where('menu_id', $data['c_menu']->id)->first();
        // if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('masters.action.edit', $data);
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
            'updated_by'    => session()->get('sname').' ('.session()->get('srole').')',
        ];

        $this->action->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('srole').')',
        ];

        $this->action->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
