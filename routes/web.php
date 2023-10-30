<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\Management\PatientController;

use App\Http\Controllers\Masters\{
    ActionController,
    AssuranceController,
    GenderController,
    HospitalController,
    ReligionController,
    VisitMethodController,
};

use App\Http\Controllers\Settings\{
    DataAccessController,
    GroupMenuController,
    MenuAccessController,
    RoleController,
    UserController,
};

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [PageController::class, 'login']);
Route::post('/login', [PageController::class, 'to_login']);
Route::get('/logout', [PageController::class, 'logout']);

// Storage Link for Production
Route::get('/storage-link', function() {
    Artisan::call('storage:link');
});
Route::get('/migrate-seed', function() {
    Artisan::call('migrate:fresh --seed');
});

Route::middleware('authcheck')->group(function() {
    Route::get('/', [PageController::class, 'index']);

    // Management Routes
    Route::resource('/management/patient', PatientController::class);

    // Master Routes
    Route::resource('/master/action', ActionController::class);
    Route::resource('/master/assurance', AssuranceController::class);
    Route::resource('/master/gender', GenderController::class);
    Route::resource('/master/hospital', HospitalController::class);
    Route::resource('/master/religion', ReligionController::class);
    Route::resource('/master/visit-method', VisitMethodController::class);

    // Settings Routes
    Route::resource('/setting/data-access', DataAccessController::class);
    Route::resource('/setting/group-menu', GroupMenuController::class);
    Route::resource('/setting/menu-access', MenuAccessController::class);
    Route::resource('/setting/role', RoleController::class);
    Route::resource('/setting/user', UserController::class);
});