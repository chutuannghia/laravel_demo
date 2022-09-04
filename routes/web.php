<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\theloaiController;
use App\Http\Controllers\tintucController;
use App\Http\Controllers\loaitinController;
use App\Http\Controllers\binhluanController;
use App\Http\Controllers\slideController;
use App\Http\Controllers\userController;

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

Route::group(['prefix'=>'','middleware'=>'adminMiddleware'],function(){
    Route::get('/',[dashboardController::class,'Dashboard'])->name('dashboard');
    Route::group(['prefix'=>'theloai'],function(){
        Route::get('danhsach',[theloaiController::class,'dsTheLoai'])->name('dstheloai');
        Route::get("Them",[theloaiController::class,"getThemTheLoai"])->name("themtl");
        Route::post("Them",[theloaiController::class,"postThemTheLoai"]);
        Route::get("Sua/{id}",[theloaiController::class,"getSuaTheLoai"])->name("suatl");
        Route::post("Sua/{id}",[theloaiController::class,"postSuaTheLoai"]);
        Route::get("Xoa/{id}", [theloaiController::class,"getXoaTheLoai"])->name("xoatl");
    });

    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach',[tintucController::class,'dsTinTuc'])->name('dstt');
        Route::get("Themtt",[tintucController::class,"getThemTinTuc"])->name("themtt");
        Route::post("Themtt",[tintucController::class,"postThemTinTuc"]);
        Route::get("Suatt/{id}",[tintucController::class,"getSuaTinTuc"])->name("suatt");
        Route::post("Suatt/{id}",[tintucController::class,"postSuaTinTuc"]);
        Route::get("Xoatt/{id}", [tintucController::class,"getXoaTinTuc"])->name("xoatt");
    });
    Route::group(['prefix'=>'loaitin'],function(){
        Route::get('danhsach',[loaitinController::class,'dsLoaiTin'])->name('dslt');
        Route::get("Them",[loaitinController::class,"getThemLoaiTin"])->name("themlt");
        Route::post("Them",[loaitinController::class,"postThemLoaiTin"]);
        Route::get("Sua/{id}",[loaitinController::class,"getSuaLoaiTin"])->name("sualt");
        Route::post("Sua/{id}",[loaitinController::class,"postSuaLoaiTin"]);
        Route::get("Xoa/{id}", [loaitinController::class,"getXoaLoaiTin"])->name("xoalt");
    });

    Route::group(['prefix'=>'binhluan'],function(){
        Route::get('danhsach',[binhluanController::class,'dsBinhLuan'])->name('dsbl');
        Route::get("Them",[binhluanController::class,"getThemBinhLuan"])->name("thembl");
        Route::post("Them",[binhluanController::class,"postThemBinhLuan"]);
        Route::get("Sua/{id}",[binhluanController::class,"getSuaBinhLuan"])->name("suabl");
        Route::post("Sua/{id}",[binhluanController::class,"postSuaBinhLuan"]);
        Route::get("Xoa/{id}", [binhluanController::class,"getXoaBinhLuan"])->name("xoabl");
    });

    Route::group(['prefix'=>'slide'],function(){
        Route::get('danhsach',[slideController::class,'dsSlide'])->name('dssl');
        Route::get("Them",[slideController::class,"getThemSlide"])->name("themsl");
        Route::post("Them",[slideController::class,"postThemSlide"]);
        Route::get("Sua/{id}",[slideController::class,"getSuaSlide"])->name("suasl");
        Route::post("Sua/{id}",[slideController::class,"postSuaSlide"]);
        Route::get("Xoa/{id}", [slideController::class,"getXoaSlide"])->name("xoasl");
    });

    Route::group(['prefix'=>'user'],function(){
        Route::get('danhsach',[userController::class,'dsUser'])->name('dsuser');
        Route::group(['prefix'=>'','middleware'=>'UserAdmin'],function(){
            Route::get("Them",[userController::class,"getThemUser"])->name("themuser");
            Route::post("Them",[userController::class,"postThemUser"]);
            Route::get("Sua/{id}",[userController::class,"getSuaUser"])->name("suauser");
            Route::post("Sua/{id}",[userController::class,"postSuaUser"]);
            Route::get("Xoa/{id}", [userController::class,"getXoaUser"])->name("xoauser");
        });
    });

    Route::get('doimk',[AuthController::class,'getDoiMk'])->name('doimk');
    Route::post('doimk',[AuthController::class,'postDoiMk']);
});


Route::group(['prefix'=>'auth'],function(){
    Route::get('register',[AuthController::class,'getRegister'])->name('register');
    Route::post('register',[AuthController::class,'postRegister']);
    Route::get('login',[AuthController::class,'getLogin'])->name('login');
    Route::post('login',[AuthController::class,'postLogin']);
    Route::get('logout',[AuthController::class,'Logout'])->name('logout');

});

//login social
//github
Route::get('/auth/github/redirect' ,[AuthController::class, 'githubredirect'])->name('githublogin');

Route::get('/auth/github/callback', [AuthController::class, 'githubcallback']);

// google

Route::get('/auth/google/redirect' ,[AuthController::class, 'googleredirect'])->name('googlelogin');

Route::get('/auth/google/callback', [AuthController::class, 'googlecallback']);
