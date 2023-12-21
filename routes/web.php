<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminAuthController;
use App\Http\Controllers\admin\newUserCreateController;
use App\Http\Controllers\web\homeController;
use App\Http\Controllers\web\userAuthController;

Route::get('/', [homeController::class,'index'])->name('web.home'); // admin web

Route::get('/test', [homeController::class,'test'])->name('web.test'); // admin web
Route::get('/Logout', [homeController::class,'Logout'])->name('web.Logout'); // admin web

Route::get('/login', [userAuthController::class,'index'])->name('web.login'); // login web
Route::get('/register', [userAuthController::class,'register'])->name('web.register'); // register web

Route::get('admin/login', [adminAuthController::class,'login'])->name('admin.login'); // admin login
Route::post('admin/check', [adminAuthController::class,'check'])->name('admin.check'); // admin check

Route::post('admin/createAdmin', [newUserCreateController::class,'create'])->name('admin.createAdmin'); // admin checkofficerComplains
Route::get('admin/dashboard', [newUserCreateController::class,'dashboard'])->name('admin.dashboard'); // admin dashboard

Route::post('admin/register', [userAuthController::class,'register_create'])->name('web.register_create'); // admin register
Route::post('admin/loginCheck', [userAuthController::class,'loginCheck'])->name('web.loginCheck'); // admin check

Route::post('web/complain/create', [homeController::class,'create_complain'])->name('web.complain.create'); // web dashboard

Route::post('web/assign/officer', [adminAuthController::class,'assign_user'])->name('admin.assign.officer'); // web assign officer
Route::get('admin/officerComplains', [adminAuthController::class,'officerComplains'])->name('admin.officerComplains'); // admin login

Route::post('admin/chnageStatusOficer', [adminAuthController::class,'chnageStatusOficer'])->name('admin.chnageStatusOficer'); // web assign officer

Route::get('admin/LogOut', [adminAuthController::class,'LogOut'])->name('admin.LogOut'); // admin LogOut