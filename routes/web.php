<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Admin-Login', [AdminControllers::class, 'Login']);
Route::post('/Admin-Login', [AdminControllers::class, 'CheckLogin']);
Route::get('/dashboard',[AdminControllers::class,'dashboard']);
Route::get('/admin-categories',[AdminControllers::class,'categories']); 
Route::get('/admin-logout',[AdminControllers::class,'logout']);
Route::get('/admin-categories', [AdminControllers::class, 'categories']);
Route::post('/admin-categories', [AdminControllers::class, 'AddCategories']);
Route::delete('/admin-categories/{id}', [AdminControllers::class, 'DeleteCategory']);
Route::get('/admin-quiz', [AdminControllers::class, 'quiz']);
Route::post('/admin-quiz', [AdminControllers::class, 'AddQuiz']);