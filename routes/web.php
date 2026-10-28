<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Admin-Login', [AdminControllers::class, 'Login']);
Route::post('/Admin-Login', [AdminControllers::class, 'CheckLogin']);
Route::get('/dashboard',[AdminControllers::class,'dashboard']);