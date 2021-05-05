<?php

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
 

Auth::routes();

Route::get('/', function () {
    return view('website.home');
})->name('website');
Route::get('/about', function () {
    return view('website.about');
});
Route::get('/category', function () {
    return view('website.category');
});
Route::get('/post', function () {
    return view('website.post');
});
Route::get('/contact', function () {
    return view('website.contact');
});
Route::get('/test', function () {
    return view('admin.dashboard.index');
});
Route::group(['prefix'=>'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboadr', function(){
        return view("admin.dashboard.index"); 
    });
    Route::resource('category', 'CaregoryController');  
});