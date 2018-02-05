<?php
header('Access-Control-Allow-Credentials: true');
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::group(['middleware' => 'cors'], function(){
    Route::post('/', 'IndexController@index')->name('index');
//});


//Route::resource('bank_accounts', 'Api\BankAccountsController', ['except' => ['create', 'edit']]);
