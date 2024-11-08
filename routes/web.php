<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Models\Complaints;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/admin','admin.index');

Route::prefix('admin')->group(function(){

    Route::get('/categories/restore',[CategoryController::class,'restore'])->name('categories.restore');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/departments',DepartmentController::class);
    Route::resource('/roles',RoleController::class);
    Route::resource('/teams',TeamController::class);
    Route::get('/complaints/forward/{id}',[ComplaintController::class,'forward'])->name('complaints.forward');
    Route::post('/complaints/send',[ComplaintController::class,'send'])->name('complaints.send');
    Route::resource('/complaints',ComplaintController::class);


});
