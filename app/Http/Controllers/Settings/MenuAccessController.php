<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuAccessController extends Controller
{
    protected $path = '/setting/menu-access';

    public function index()
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'data'          => $this->menu_access->select('id', 'group_menu_id', 'main_menu_id', 'menu_id', 'submenu_id', 'view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)->orderBy('id')->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0) abort(403);

        return view('settings.menu_access.index', $data);
    }

    public function create()
    {
        $check = $this->menu_access->select('group_menu_id')->where('disabled', 0)->get();

        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'group_menus'   => $this->group_menu->select('id', 'name')->where('disabled', 0)->whereNotIn('id', $check)->get(),
            'main_menus'    => $this->main_menu->select('id', 'title', 'is_parent')->where('disabled', 0)->orderBy('order_no')->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->add == 0) abort(403);
        
        return view('settings.menu_access.create', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = $request->validate([
            'group_menu'    => 'required',
        ]);

        $data = [
            'main_menus'    => $this->main_menu->select('id', 'title', 'is_parent')->where('disabled', 0)->orderBy('order_no')->get(),
        ];

        if ($data['main_menus']) {
            foreach ($data['main_menus'] as $main_menu) {
                if ($main_menu->is_parent == 0) {
                    $data = [
                        'group_menu_id'     => $request->group_menu,
                        'main_menu_id'      => $main_menu->id,
                        'menu_id'           => 0,
                        'submenu_id'        => 0,
                        'view'              => $input['view_' . $main_menu->id],
                        'add'               => $input['add_' . $main_menu->id],
                        'edit'              => $input['edit_' . $main_menu->id],
                        'delete'            => $input['delete_' . $main_menu->id],
                        'detail'            => $input['detail_' . $main_menu->id],
                        'approval'          => $input['approval_' . $main_menu->id],
                        'submenu_id'        => 0,
                        'created_at'        => now(),
                        'created_by'        => session()->get('sname').' ('.session()->get('srole_id').')',
                    ];
    
                    $this->menu_access->insert($data);
                } else {
                    if ($main_menu->menus) {
                        foreach ($main_menu->menus as $menu) {
                            $data = [
                                'group_menu_id'     => $request->group_menu,
                                'main_menu_id'      => $main_menu->id,
                                'menu_id'           => $menu->id,
                                'submenu_id'        => 0,
                                'view'              => $input['view_' . $main_menu->id . '_' . $menu->id],
                                'add'               => $input['add_' . $main_menu->id . '_' . $menu->id],
                                'edit'              => $input['edit_' . $main_menu->id . '_' . $menu->id],
                                'delete'            => $input['delete_' . $main_menu->id . '_' . $menu->id],
                                'detail'            => $input['detail_' . $main_menu->id . '_' . $menu->id],
                                'approval'          => $input['approval_' . $main_menu->id . '_' . $menu->id],
                                'created_at'        => now(),
                                'created_by'        => session()->get('sname').' ('.session()->get('srole_id').')',
                            ];
            
                            $this->menu_access->insert($data);
                        }
                    } 
                }
            }
        }

        return redirect($this->path)->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'detail'        => $this->menu_access->select('id', 'group_menu_id', 'main_menu_id', 'menu_id', 'submenu_id', 'view', 'add', 'edit', 'delete', 'detail', 'approval')->where('id', $id)->where('disabled', 0)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->detail == 0) abort(403);
        
        return view('settings.menu_access.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'detail'        => $this->menu_access->select('id', 'group_menu_id', 'main_menu_id', 'menu_id', 'submenu_id', 'view', 'add', 'edit', 'delete', 'detail', 'approval')->where('group_menu_id', $id)->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('settings.menu_access.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = $request->validate([
            'group_menu'    => 'required',
        ]);

        $data = [
            'data'          => $this->menu_access->select('id', 'group_menu_id', 'main_menu_id', 'menu_id', 'submenu_id', 'view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)->where('group_menu_id', $id)->get(),
        ];

        if ($data['data']) {
            foreach ($data['data'] as $item) {
                if ($item->menu_id == 0) {
                    $data = [
                        'group_menu_id'     => $request->group_menu,
                        'main_menu_id'      => $item->main_menu->id,
                        'menu_id'           => 0,
                        'submenu_id'        => 0,
                        'view'              => $input['view_' . $item->id],
                        'add'               => $input['add_' . $item->id],
                        'edit'              => $input['edit_' . $item->id],
                        'delete'            => $input['delete_' . $item->id],
                        'detail'            => $input['detail_' . $item->id],
                        'approval'          => $input['approval_' . $item->id],
                        'submenu_id'        => 0,
                        'updated_at'        => now(),
                        'updated_by'        => session()->get('sname').' ('.session()->get('srole_id').')',
                    ];
    
                    $this->menu_access->where('id', $item->id)->update($data);
                } else {
                    $data = [
                        'group_menu_id'     => $request->group_menu,
                        'main_menu_id'      => $item->main_menu->id,
                        'menu_id'           => $item->menu->id,
                        'submenu_id'        => 0,
                        'view'              => $input['view_' . $item->id],
                        'add'               => $input['add_' . $item->id],
                        'edit'              => $input['edit_' . $item->id],
                        'delete'            => $input['delete_' . $item->id],
                        'detail'            => $input['detail_' . $item->id],
                        'approval'          => $input['approval_' . $item->id],
                        'updated_at'        => now(),
                        'updated_by'        => session()->get('sname').' ('.session()->get('srole_id').')',
                    ];
    
                    $this->menu_access->where('id', $item->id)->update($data);
                }
            }
        }

        return redirect($this->path)->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];

        $this->menu_access->where('group_menu_id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
