<?php

use App\Loop;
use App\Node;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//TODO測試esp32的api，待刪除
Route::middleware('auth:api')->post('/test_esp32', 'Admin\itemInfoController@uploadImage')->name('admin.item-info.upload-image');

