<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'c_menu'            => $this->main_menu->select('id', 'title')->where('disabled', 0)->where('url', '/')->first(),
            // 'sysmenu'           => DB::table('information_schema.INNODB_SYS_TABLES')->selectRaw("REPLACE(name, 'dashboard_doctor/', '') AS table_name")->where('name', 'LIKE', 'dashboard_doctor%')->orderBy('name')->get(),
        ];

        return view('index', $data);
    }
}
