<?php

use App\Http\Controllers\PageController;

use App\Http\Controllers\Masters\{
    ActionController,
    AssuranceController,
    HospitalController,
    VisitMethodController,
};

use App\Http\Controllers\Settings\{
    GroupMenuController,
    RoleController,
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

Route::get('/', [PageController::class, 'index']);

// Master Routes
Route::resource('/master/action', ActionController::class);
Route::resource('/master/assurance', AssuranceController::class);
Route::resource('/master/hospital', HospitalController::class);
Route::resource('/master/visit-method', VisitMethodController::class);

// Settings Routes
Route::resource('/setting/group-menu', GroupMenuController::class);
Route::resource('/setting/role', RoleController::class);