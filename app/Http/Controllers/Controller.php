<?php

namespace App\Http\Controllers;

use App\Models\Settings\{
    Attributes,
    MainMenu,
    Menu,
};

use App\Models\Masters\{
    Hospital,
};

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // Global Variable Setting
        $this->attributes               = new Attributes();
        $this->main_menu                = new MainMenu();
        $this->menu                     = new Menu();

        // Global Variable Master
        $this->hospital                 = new Hospital();
    }
}
