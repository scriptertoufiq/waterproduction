<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BottleController;
use App\Http\Controllers\BottleSizeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\DestroyedBottleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TransectionController;
use App\Http\Controllers\WaterProductionController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/view/user', [App\Http\Controllers\UserController::class, 'index'])->name('viewuser');

// clients route
Route::resource('/clients',ClientController::class)->middleware('auth');
// bottle size route
Route::resource('/bottlesize',BottleSizeController::class)->middleware('auth');
// raw material route
Route::resource('/materials',RawMaterialController::class)->middleware('auth');
// bottle stock route
Route::resource('/bottles',BottleController::class)->middleware('auth');
// bottle destroy route
Route::resource('/destroyedbottles',DestroyedBottleController::class)->middleware('auth');
// bank  route
Route::resource('/banks',BankController::class)->middleware('auth');
// bank account  route
Route::resource('/bankaccounts',BankAccountController::class)->middleware('auth');
// transection  route
Route::resource('/transections',TransectionController::class)->middleware('auth');
// staff  route
Route::resource('/staffs',StaffController::class)->middleware('auth');
// staff  route
Route::resource('/salary',SalaryController::class)->middleware('auth');
// payment  route
Route::resource('/payments',PaymentController::class)->middleware('auth');
// staff commission  route
Route::resource('/commissions',CommissionController::class)->middleware('auth');
// production  route
Route::resource('/productions',WaterProductionController::class)->middleware('auth');
// accounts  route
Route::resource('/accounts',AccountController::class)->middleware('auth');
// product  route
Route::resource('/products',ProductController::class)->middleware('auth');
// sell  route
Route::resource('/sells',SellController::class)->middleware('auth');
// Categoory  route
Route::resource('/category',CategoryController::class)->middleware('auth');
// report  route
Route::resource('/reports',ReportController::class)->middleware('auth');
// bottle search ajax
Route::POST('/searchBottle','App\Http\Controllers\WaterProductionController@searchBottle')->name('searchBottle')->middleware('auth');
// product search ajax
Route::POST('/searchProduct','App\Http\Controllers\ProductController@searchProduct')->name('searchProduct')->middleware('auth');
// product price search ajax for
Route::POST('/productPrice','App\Http\Controllers\BottleSizeController@productPrice')->name('productPrice')->middleware('auth');
// sell page product price search ajax for
Route::POST('/SearchProductPrice','App\Http\Controllers\SellController@SearchProductPrice')->name('SearchProductPrice')->middleware('auth');
// search bottle due
Route::POST('/SearchBottleDue','App\Http\Controllers\ClientBottleController@SearchBottleDue')->name('SearchBottleDue')->middleware('auth');
// debit credit search
Route::get('/dcSearch','App\Http\Controllers\ReportController@dcSearch')->name('dcSearch')->middleware('auth');
// sell report Search
Route::get('/sellReport','App\Http\Controllers\ReportController@sellReport')->name('sellReport')->middleware('auth');
Route::get('/sellReportSearch','App\Http\Controllers\ReportController@sellReportSearch')->name('sellReportSearch')->middleware('auth');
// staff collection report Search
Route::get('/moneyCollection','App\Http\Controllers\ReportController@moneyCollection')->name('moneyCollection')->middleware('auth');
Route::get('/moneyCollectionSearch','App\Http\Controllers\ReportController@moneyCollectionSearch')->name('moneyCollectionSearch')->middleware('auth');
// client  report Search
Route::get('/clientReport','App\Http\Controllers\ReportController@clientReport')->name('clientReport')->middleware('auth');
Route::get('/clientReportSearch','App\Http\Controllers\ReportController@clientReportSearch')->name('clientReportSearch')->middleware('auth');
// loss/profit  report Search
Route::get('/profitLoss','App\Http\Controllers\ReportController@profitLoss')->name('profitLoss')->middleware('auth');
Route::get('/profitLossSearch','App\Http\Controllers\ReportController@profitLossSearch')->name('profitLossSearch')->middleware('auth');
// edit user
Route::get('/edituser/{id}','App\Http\Controllers\UserController@edituser')->middleware('auth');
Route::POST('/updateuser/{id}','App\Http\Controllers\UserController@updateuser')->middleware('auth');



