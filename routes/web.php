<?php

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

Route::get('view', function () {
    return view('login');
});

Route::post('model/services/registerServices','Mycontroller@registerServices')->name("registerServices");

Route::get('model/services/getDataServices','Mycontroller@getDataServices');

Route::get('model/account/getData','Mycontroller@getData');

Route::post('model/account/postLogin','Mycontroller@postLogin');

Route::post('model/account/postRegister','Mycontroller@postRegister')->name("postRegister");

Route::get('model/accessories/getDataAccessories','Mycontroller@getDataAccessories');

Route::get('model/accessories/getDataAccessoriesAll','Mycontroller@getDataAccessoriesAll');

Route::post('model/vehicleInformation/checkAcount','Mycontroller@checkAcount')->name("checkAcount");

Route::post('model/vehicleInformation/RegisterVehicleInfomation','Mycontroller@RegisterVehicleInfomation')->name("RegisterVehicleInfomation");

Route::post('model/vehicleInformation/UpdateVehicleInfomation','Mycontroller@UpdateVehicleInfomation')->name("UpdateVehicleInfomation");

Route::post('model/services/getDataPutServices','Mycontroller@getDataPutServices')->name("getDataPutServices");
