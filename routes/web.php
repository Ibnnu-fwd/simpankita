<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OfficerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']],function () {
    Route::get('/', DashboardController::class)->name('admin.dashboard');

    // Officer
    Route::post('officer/{id}/activate', [OfficerController::class, 'activate'])->name('admin.officer.activate');
    Route::resource('officer', OfficerController::class, ['as' => 'admin']);
});
