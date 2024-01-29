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

//TODO 更好的redirect寫法

use Intervention\Image\Facades\Image;

Route::get('/', function () {
    $user = Auth::user();
    if($user == null){
        return redirect('/home');
    }
    if($user->hasRole('admin')){
        return redirect('/admin');
    }else{
        return redirect('/home');
    }});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['prefix' => '/admin','middleware' => 'role:admin'], function () {
    Route::get('/', function () {return view('admin.index');})->name('admin');

    Route::get('/listItemInfo', 'Admin\itemInfoController@index' )->name('admin.item-info');
    Route::post('/addItem', 'Admin\itemInfoController@uploadImage')->name('admin.item-info.upload-image');

});


