<?php

use Illuminate\Support\Facades\Route;


Route::resource('permissions', App\Http\Controllers\PermissionController::class, []);
