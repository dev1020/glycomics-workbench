<?php

use Illuminate\Support\Facades\Route;

//Route::middleware(['auth'])->group(function () {
    Route::resource('users', App\Http\Controllers\UserController::class, []);
Route::get('users/{userId}/assign-roles',[App\Http\Controllers\UserController::class,'assignRoleToUser'])->name('assignRoleToUser');
Route::put('users/{userId}/assign-roles',[App\Http\Controllers\UserController::class,'saveRoleToUser'])->name('saveRoleToUser');
//});
