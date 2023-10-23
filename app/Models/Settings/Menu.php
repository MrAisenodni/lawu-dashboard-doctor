<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'stg_menu';

    public function main_menu()
    {
        return $this->belongsTo(MainMenu::class, 'main_menu_id', 'id')->select('id', 'title', 'url', 'icon', 'is_parent')->where('disabled', 0)->where('is_shown', 1)->orderBy('order_no');
    }

    public function menu_access()
    {
        return $this->belongsTo(MenuAccess::class, 'id', 'menu_id')->select('id', 'main_menu_id', 'menu_id', 'submenu_id', 'group_menu_id', 'view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)->where('group_menu_id', session()->get('sgroup_menu_id'));
    }
}
