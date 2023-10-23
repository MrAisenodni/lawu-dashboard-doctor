<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuAccess extends Model
{
    use HasFactory;

    protected $table = 'stg_menu_access';

    public function main_menu()
    {
        return $this->belongsTo(MainMenu::class, 'main_menu_id', 'id')->select('id', 'title', 'icon', 'url', 'is_parent')->where('disabled', 0);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id')->select('id', 'title', 'icon', 'url', 'is_parent', 'main_menu_id')->where('disabled', 0);
    }

    public function submenu()
    {
        return $this->belongsTo(SubMenu::class, 'submenu_id', 'id')->select('id', 'title', 'icon', 'url', 'is_parent', 'menu_id')->where('disabled', 0);
    }

    public function group_menu()
    {
        return $this->belongsTo(GroupMenu::class, 'group_menu_id', 'id')->select('id', 'name');
    }
}
