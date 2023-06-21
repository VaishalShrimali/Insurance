<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/',[AdminController::class,'login']);
Route::get('/sub_cat',[UserController::class,'sub_cat']);
Route::get('/getcategory',[UserController::class,'getcategory']);
Route::get('/getdetials',[PoliciesController::class,'getdetials']);
Route::get('/getproduct',[PoliciesController::class,'getproduct']);

Route::prefix('admin')->group(function () {
    Route::redirect('/', '/admin/login');
    Route::get('/login',[AdminController::class,'login']);
    Route::post('/auth',[AdminController::class,'auth'])->name('admin.auth');
    Route::get('/dashboard',[AdminController::class,'index'])->middleware('admin_auth');
    Route::get('/users',[UserController::class,'index'])->middleware('admin_auth');
    

    // Policies
    Route::get('/policies',[PoliciesController::class,'index'])->middleware('admin_auth');
    Route::get('/policies/create',[PoliciesController::class,'create'])->middleware('admin_auth');
    Route::POST('/policies/insert',[PoliciesController::class,'insert'])->name('policies.insert')->middleware('admin_auth');
    Route::get('/policies/edit/{id}',[PoliciesController::class,'edit'])->middleware('admin_auth');
    Route::get('/policies/view/{id}',[PoliciesController::class,'view'])->middleware('admin_auth');
    Route::get('/policies/pdf/{id}',[PoliciesController::class,'pdf'])->middleware('admin_auth');
    Route::POST('/policies/update',[PoliciesController::class,'update'])->name('policies.update')->middleware('admin_auth');
    Route::get('/policies/delete/{id}',[PoliciesController::class,'delete'])->middleware('admin_auth');
    Route::get('/policies/download_pdf/{id}',[PoliciesController::class,'download_pdf'])->middleware('admin_auth');
    // Products
    Route::get('/product',[ProductController::class,'index'])->middleware('admin_auth');
    Route::get('/product/create',[ProductController::class,'create'])->middleware('admin_auth');
    Route::POST('/product/insert',[ProductController::class,'insert'])->name('product.insert')->middleware('admin_auth');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->middleware('admin_auth');
    Route::POST('/product/update',[ProductController::class,'update'])->name('product.update')->middleware('admin_auth');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->middleware('admin_auth');

    // Companies
    Route::get('/companies',[CompanyController::class,'index'])->middleware('admin_auth');
    Route::get('/companies/create',[CompanyController::class,'create'])->middleware('admin_auth');
    Route::POST('/companies/insert',[CompanyController::class,'insert'])->name('company.insert')->middleware('admin_auth');
    Route::POST('/companies/update',[CompanyController::class,'update'])->name('company.update')->middleware('admin_auth');
    Route::get('/companies/edit/{id}',[CompanyController::class,'edit'])->middleware('admin_auth');
    Route::get('/companies/delete/{id}',[CompanyController::class,'delete'])->middleware('admin_auth');

    // Customers
    Route::get('/users/create',[UserController::class,'create'])->middleware('admin_auth');
    Route::post('/users/insert',[UserController::class,'store'])->name('user.insert')->middleware('admin_auth');
    Route::get('/users/edit/{id}',[UserController::class,'edit'])->middleware('admin_auth');
    Route::post('/users/update',[UserController::class,'update'])->name('user.update')->middleware('admin_auth');
    Route::get('users/delete/{id}',[UserController::class,'delete'])->middleware('admin_auth');
    Route::get('/logout',function(){
                session()->forget('ADMIN_LOGIN');
                session()->forget('ADMIN_ID');
                session()->forget('ADMIN_NAME');
                session()->forget('ADMIN_EMAIL');
                session()->flash('icon','success');
                session()->flash('msg','Logout Successfully');
                return redirect('admin/login');
    });
});