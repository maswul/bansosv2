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

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('bansos.utama');
})->name('dashboard');

Route::group(['prefix'=>'hibah', 'middleware' => ['auth:sanctum','verified'],'as'=>'hibah.'], function () {
    route::get('uang', [\App\Http\Controllers\PokmasC::class, 'main']);
});

Route::group(['prefix'=>'sppd', 'middleware' => ['auth:sanctum','verified'],'as'=>'hibah.'], function () {
    route::get('home', function(){
        return view('sppd.baru');
    });
    route::get('master/pegawai', function(){
        return view('sppd.master.pegawai');
    });
    route::get('spt', function(){
        return view('spt.home');
    });
});
