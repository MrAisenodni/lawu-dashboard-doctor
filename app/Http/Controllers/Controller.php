<?php

namespace App\Http\Controllers;

use App\Models\Management\Patient;

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
    BloodType,
    Citizen,
    City,
    Clinic,
    Country,
    District,
    Doctor,
    Education,
    Gender,
    Hospital,
    MaritalStatus,
    Occupation,
    PaymentMethod,
    Province,
    Religion,
    Unit,
    VisitMethod,
    VisitTime,
    Ward,
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
        // Global Variable Management
        $this->patient                  = new Patient();

        // Global Variable Master
        $this->action                   = new Action();
        $this->assurance                = new Assurance();
        $this->blood_type               = new BloodType();
        $this->citizen                  = new Citizen();
        $this->clinic                   = new Clinic();
        $this->country                  = new Country();
        $this->city                     = new City();
        $this->province                 = new Province();
        $this->district                 = new District();
        $this->doctor                   = new Doctor();
        $this->education                = new Education();
        $this->hospital                 = new Hospital();
        $this->gender                   = new Gender();
        $this->marital_status           = new MaritalStatus();
        $this->occupation               = new Occupation();
        $this->payment_method           = new PaymentMethod();
        $this->religion                 = new Religion();
        $this->unit                     = new Unit();
        $this->visit_method             = new VisitMethod();
        $this->visit_time               = new VisitTime();
        $this->ward                     = new Ward();

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
    }
}
