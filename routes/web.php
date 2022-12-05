<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AssociateController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//Admin Only
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    //Associate
    Route::get('/associate/index', [AssociateController::class, 'index']);
    Route::get('/associate/edit/{user_id}', [AssociateController::class, 'edit']);
    Route::put('/associate/update/{user_id}', [AssociateController::class, 'update']);
});
//Internal Only

//Manager Only

//User Access
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

