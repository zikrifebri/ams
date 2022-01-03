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

Route::get('check_db', function ()
{
    try {
        DB::connection()->getPdo();
        return 'DB Connected';
    }   catch (\Exception $e) {
        return 'DB Failed';
    }
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'berandaController@index');
Auth::routes(['register'=> true]);
Route::get('/cari' ,  'smController@cari');
Route::get('/surat-masuk', 'smController@suratmasuk');
Route::get('/surat-masuk/tambah-surat', 'smController@createsm');
Route::get('/surat-masuk/{suratmasuk}/edit' , 'smController@edit');
Route::patch('/surat-masuk/{suratmasuk}', 'smController@update');
Route::get('/surat-masuk/{suratmasuk}' , 'smController@show');
Route::delete('/surat-masuk{suratmasuk}', 'smController@destroy');
Route::post('/suratmasuk', 'smController@store');
Route::post('/surat-masuk/terusan', [App\Http\Controllers\smController::class, 'insert_terusan'])->name('terusan.simpan');
Route::get('/surat-masuk/departement/{id}', [App\Http\Controllers\smController::class, 'get_user_by_departement'])->name('departement.get_user');
Route::post('/surat-masuk/diterima', [App\Http\Controllers\smController::class, 'status_diterima'])->name('status_diterima.update');
Route::post('/tbl_surat_masuk/simpan_pesan', [App\Http\Controllers\smController::class, 'simpan_pesan'])->name('tbl_surat_masuk.simpan_pesan');
Route::get('/tbl_surat_masuk/isi_pesan/edit/{id}', [App\Http\Controllers\smController::class, 'get_disposisi'])->name('tbl_surat_masuk.get_disposisi');

Route::get('suratkeluar/cari' ,  'skController@cari');
Route::get('/surat-keluar', 'skController@index');
Route::get('/surat-keluar/create', 'skController@create');
Route::get('/surat-keluar/{suratkeluar}/edit' , 'skController@edit');
Route::patch('/surat-keluar/{suratkeluar}', 'skController@update');
Route::get('/surat-keluar/{suratkeluar}' , 'skController@show');
Route::post('/surat-keluar/destory', 'skController@destroy')->name('sk.delete');
Route::post('/suratkeluar', 'skController@store');

Route::resource('/chat', 'chatController');
Route::resource('/departement', 'asController')->parameters([
    'departement' => 'departement']);
Route::resource('/user', 'userController');
Route::get('/profile', [App\Http\Controllers\userController::class, 'userProfile'])->name('user_profile');
Route::post('/profile/simpan_edit', [App\Http\Controllers\userController::class, 'simpan_edit'])->name('simpan_edit');






Route::get('/date-mutator', 'suratController@dateMutator');



