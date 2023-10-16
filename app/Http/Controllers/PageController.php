<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'c_menu'            => $this->main_menu->select('id', 'title')->where('disabled', 0)->where('url', '/')->first(),
        ];

        return view('index', $data);
    }
}
