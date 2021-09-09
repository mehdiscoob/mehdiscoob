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

use App\Model\Phonenumber;
use Illuminate\Support\Facades\DB;

//
Route::prefix("admin")->group(function (){

    //Ajax Routes
//    Route::get('/getgroupbyid/{id}', 'Admin\Seminar\SeminarAjaxControler@getGroupById');
    Route::resource("group","Admin\Seminar\Define\GroupsController");
//    Route::resource("group-role","Admin\Seminar\Define\GrouproleController");
    Route::resource("group-user","Admin\Seminar\Define\GroupuserController");
//    Route::get("/city/{id}/addr","Admin\Seminar\SeminarAjaxControler@getAddrByCityId");

    Route::get('/test', function (){
    });
});
