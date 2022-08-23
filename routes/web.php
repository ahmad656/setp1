<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
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

Route::prefix('cms/admin/')->group(function(){
    Route::view('' , 'cms.parent' );
    Route::view('temp' , 'cms.temp' );
    Route::resource('countries' , CountryController::class);
    Route::post('countries_update/{id}', [CountryController::class, 'update']);//خاص بعملية التعديل بطريقة الجيسون
    Route::resource('cities' , CityController::class);
    Route::resource('admins' , AdminController::class);
    Route::post('admins_update/{id}', [AdminController::class, 'update']);//خاص بعملية التعديل بطريقة الجيسون
    

});
