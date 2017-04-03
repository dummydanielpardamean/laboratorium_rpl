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

Route::get('/', [
    'as' => 'index',
    'uses' => function () {
        return view('landing');
    },
])->middleware('guest');

/**
 * Route Untuk entity mahasiswa
 */

Route::get('/mahasiswa/register', 'Mahasiswa\RegisterController@getRegister')
    ->name('mahasiswa.register');

Route::post('/mahasiswa/register', 'Mahasiswa\RegisterController@store');

Route::get('/mahasiswa/login', 'Mahasiswa\LoginController@getLogin')
    ->name('mahasiswa.login');

Route::post('/mahasiswa/login', [
    'uses' => 'Mahasiswa\LoginController@login',
]);

Route::get('/mahasiswa/logout', 'Mahasiswa\LoginController@logout')
    ->name('mahasiswa.logout');

Route::get('/mahasiswa', [
    'as' => 'mahasiswa',
    'uses' => 'Mahasiswa\PagesController@getHome',
]);

Route::get('/mahasiswa/praktikkum', [
    'as' => 'mahasiswa.praktikkum.index',
    'uses' => 'Mahasiswa\JadwalPraktikkum@index',
]);

Route::get('/mahasiswa/praktikkum/{id?}', [
    'as' => 'mahasiswa.praktikkum.show',
    'uses' => 'Mahasiswa\JadwalPraktikkum@show',
]);

Route::get('/mahasiswa/praktikkum/{id}/{nim}', 'Mahasiswa\PagesController@nilai')->name('mahasiswa.nilai');

/**
 * Route ganti gambar untuk mahasiswa
 */

Route::get('/mahasiswa/picture', [
    'as' => 'mahasiswa.picture',
    'uses' => 'Mahasiswa\ProfilePicture@edit',
]);

Route::post('/mahasiswa/picture', [
    'uses' => 'Mahasiswa\ProfilePicture@update',
]);

/**
 * Route untuk mengubah password mahasiswa
 */

Route::get('/mahasiswa/password', 'Mahasiswa\Password@edit')
    ->name('mahasiswa.password');

Route::post('/mahasiswa/password', 'Mahasiswa\Password@update');

/**
 * Route Untuk asisten
 */
Route::get('/asisten', [
    'as' => 'asisten.index',
    'uses' => 'Asisten\NilaiController@index',
]);

Route::get('/asisten/{id}', [
    'as' => 'asisten.show',
    'uses' => 'Asisten\NilaiController@show',
]);

Route::get('/asisten/{id}/{nim}', [
    'as' => 'asisten.upload',
    'uses' => 'Asisten\NilaiController@edit',
]);

Route::post('/asisten/{id}/{nim}', [
    'uses' => 'Asisten\NilaiController@update',
]);

/**
 * Daftar Routing Untuk entity Dosen
 */

Route::get('/dosen', [
    'as' => 'dosen.home',
    'uses' => 'Dosen\PagesController@getHome',
]);

Route::get('/dosen/login', [
    'as' => 'dosen.login',
    'uses' => 'Dosen\PagesController@getLogin',
    'middleware' => 'guest',
]);

Route::post('/dosen/login', [
    'uses' => 'Dosen\LoginController@login',
    'middleware' => 'guest',
]);

Route::get('/dosen/logout', [
    'as' => 'dosen.logout',
    'uses' => 'Dosen\LoginController@logout',
]);

Route::get('/dosen/picture', [
    'as' => 'dosen.picture',
    'uses' => 'Dosen\ProfilePicture@edit',
]);

Route::post('/dosen/picture', [
    'uses' => 'Dosen\ProfilePicture@update',
]);

Route::get('/dosen/password', 'Dosen\Password@edit')
    ->name('dosen.password');

Route::post('/dosen/password', 'Dosen\Password@update');

Route::get('/dosen/praktikkum', [
    'as' => 'dosen.praktikkum.index',
    'uses' => 'Dosen\JadwalPraktikkum@index',
]);

Route::get('/dosen/praktikkum/create', [
    'as' => 'dosen.praktikkum.create',
    'uses' => 'Dosen\JadwalPraktikkum@create',
]);

Route::post('/dosen/praktikkum/create', [
    'uses' => 'Dosen\JadwalPraktikkum@store',
]);

Route::post('/dosen/praktikkum/check', [
    'as' => 'dosen.praktikkum.check',
    'uses' => 'Dosen\JadwalPraktikkum@check',
]);

Route::get('/dosen/praktikkum/{id}', [
    'as' => 'dosen.praktikkum.show',
    'uses' => 'Dosen\JadwalPraktikkum@show',
]);

Route::get('/dosen/praktikkum/{id}/nilai/{nim}', 'Dosen\JadwalPraktikkum@nilai')
    ->name('dosen.praktikkum.nilai');

Route::get('/dosen/praktikkum/{id}/delete', 'Dosen\JadwalPraktikkum@destroy')
    ->name('dosen.praktikkum.destroy')
    ->middleware('ValidDosen');

/**
 * Route untuk entity admin
 */

Route::get('/admin/mahasiswa', 'Admin\MahasiswaController@index')
    ->name('admin.mahasiswa.index');

Route::get('/admin/mahasiswa/{nim}/edit', 'Admin\MahasiswaController@edit')
    ->name('admin.mahasiswa.edit');

Route::post('/admin/mahasiswa/{nim}/edit', 'Admin\MahasiswaController@update');

Route::get('/admin/mahasiswa/{nim}/delete', 'Admin\MahasiswaController@destroy')
    ->name('admin.mahasiswa.destroy');

Route::get('/admin/dosen', 'Admin\DosenController@index')
    ->name('admin.dosen.index');

Route::get('/admin/dosen/create', 'Admin\DosenController@create')
    ->name('admin.dosen.create');
Route::post('/admin/dosen/create', 'Admin\DosenController@store');

Route::get('/admin/dosen/{nim}/edit', 'Admin\DosenController@edit')
    ->name('admin.dosen.edit');

Route::post('/admin/dosen/{nim}/edit', 'Admin\DosenController@update');

Route::get('/admin/dosen/{nip}/delete', 'Admin\DosenController@destroy')
    ->name('admin.dosen.destroy');
