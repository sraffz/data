<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

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

Auth::routes();

Route::get('/home','HomeController@index')->name('dashboard');

Route::middleware(['auth'])->group(function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::post('tambah-jabatan',[PageController::class, 'tambahjabatan']);
	Route::post('tambah-skim',[PageController::class, 'tambahskim']);
	Route::post('tambah-gred',[PageController::class, 'tambahgred']);
	Route::post('tambah-jawatan',[PageController::class, 'tambahjawatan']);
	Route::post('tambah-pegawai',[PageController::class, 'tambahpegawai']);
	
});

Route::middleware(['auth'])->group(function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
	Route::get('{page}/{id}', ['as' => 'page.withid', 'uses' => 'PageController@withid']);
	Route::get('{page}/{id}', ['as' => 'pegawai.pgw', 'uses' => 'PageController@pgw']);
});


