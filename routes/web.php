<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LinkController::class,"index"])->name("home");
Route::get('/create', [LinkController::class,"createForm"])->name("create");
Route::get('/fetch', [LinkController::class,"fetchForm"])->name("fetch");
Route::get('/show', [LinkController::class,"show"])->name("show");
Route::get('/original', [LinkController::class,"original"])->name("original");

Route::post('/store',[LinkController::class,"store"])->name("store");
Route::post('/fetchLink',[LinkController::class,"fetch"])->name("fetchLink");

Route::get('/short/{token}',[LinkController::class,'redirect'])->name('redirect');