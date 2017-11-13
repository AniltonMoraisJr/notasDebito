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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/logoff', function () {
    Auth::logout();
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'] , function() {
    Route::get('/admin',  'AdminController@index')->name('admin');
    Route::prefix('admin')->group(function(){
        Route::resource('/empresa', 'EmpresaController');
        Route::resource('/cliente', 'ClienteController');
        Route::resource('/projeto', 'ProjetoController');
        Route::resource('/nota', 'NotaController');
    });
});