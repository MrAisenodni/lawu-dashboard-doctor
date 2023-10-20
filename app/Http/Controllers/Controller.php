<?php

namespace App\Http\Controllers;

use App\Models\Settings\{
    Attributes,
    DataAccess,
    GroupMenu,
    Login,
    MainMenu,
    Menu,
    MenuAccess,
    Provider,
    Role,
    User,
};

use App\Models\Masters\{
    Action,
    Assurance,
    Gender,
    Hospital,
    Religion,
    VisitMethod,
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
        $this->data_access              = new DataAccess();
        $this->group_menu               = new GroupMenu();
        $this->login                    = new Login();
        $this->main_menu                = new MainMenu();
        $this->menu                     = new Menu();
        $this->menu_access              = new MenuAccess();
        $this->provider                 = new Provider();
        $this->role                     = new Role();
        $this->user                     = new User();

        // Global Variable Master
        $this->action                   = new Action();
        $this->assurance                = new Assurance();
        $this->hospital                 = new Hospital();
        $this->gender                   = new Gender();
        $this->religion                 = new Religion();
        $this->visit_method             = new VisitMethod();
    }
}
