<?php

use Illuminate\Support\Facades\Route;

//Route::middleware(['auth'])->group(function () {
//
//
//});
Route::resource('sliders', App\Http\Controllers\SliderController::class, []);
