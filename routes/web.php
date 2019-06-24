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
  if (Auth::check()&&Auth::user()->id_jabatan == 1) {
    return redirect('/adminhr');
  }
  else if (Auth::check()&&Auth::user()->id_jabatan == 4) {
    return redirect('kabid');
  }
  else if (Auth::check()&&Auth::user()->id_jabatan == 3) {
    return redirect('manajer');
  }
  else if (Auth::check()&&Auth::user()->id_jabatan == 2) {
    return redirect('pimpinan');
  }
  else {
    return view('welcome');
  }
});

Route::get('/home', function(){
  return view('welcome');
});

Route::group(['middleware'=>'auth'], function(){
  Route::resource('kriteria', 'KriteriaController');
  Route::get('/getData', 'KriteriaController@getData')->name('getData');
  Route::get('/readKriteria', 'KriteriaController@read')->name('readKriteria');
  Route::get('/getKaryawan', 'KaryawanController@getKaryawan')->name('getKaryawan');
  Route::get('/getKaryawanNonAdmin', 'KaryawanController@getKaryawanNonAdmin')->name('getKaryawanNonAdmin')->middleware('auth');
  Route::get('/nilaiKriteria', 'KriteriaController@nilaiKriteria')->name('nilaiKriteria');
  Route::put('/updateNilaiKriteria', 'KriteriaController@updateNilaiKriteria')->name('updateNilaiKriteria');
  Route::resource('karyawan', 'KaryawanController');
  Route::get('/nonadmin', 'KaryawanController@nonadmin')->name('karyawan.nonadmin');
  Route::get('karyawan/{karyawan}/nilai', 'KaryawanController@nilai');
  Route::post('/nilaiKaryawan/{karyawan}', 'NilaiKaryawanController@updateNilaiKaryawan')->name('NilaiKaryawan.nilai');
  Route::get('nilaiKaryawan/{karyawan}/edit', 'NilaiKaryawanController@editNilaiKaryawan')->name('NilaiKaryawan.edit');
  Route::patch('nilaiKaryawan/{karyawan}/updateexist', 'NilaiKaryawanController@updateExistingNilai')->name('NilaiKaryawan.update');
  Route::get('nilaiKaryawan/{idjabatan}/analyze','NilaiKaryawanController@analisa')->name('NilaiKaryawan.analisa');
  Route::put('/updatenilai','KaryawanController@updateNilaiKaryawan')->name('updateNilaiKaryawan');
});

Route::group(['middleware'=>'adminhr'],function(){
  Route::put('/updatenilai','KaryawanController@updateNilaiKaryawan')->name('updateNilaiKaryawan');
});

Auth::routes();
Route::get('adminhr',function(){
    return redirect('/kriteria');
})->middleware('auth','adminhr');

Route::get('kabid',function(){
    return redirect('/nonadmin');
})->middleware('auth','kabid');

Route::get('manajer',function(){
    return redirect('/nonadmin');
})->middleware('auth','manajer');

Route::get('pimpinan',function(){
    return redirect('/nonadmin');
})->middleware('auth','pimpinan');



Route::group(['middleware' => 'disablepreventback'], function(){
  Auth::routes();
  Session::flush();
  Route::get('/home', 'HomeController@index');
});

// Route::get('/home', 'HomeController@index')->name('home');
