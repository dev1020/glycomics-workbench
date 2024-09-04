<?php

use Illuminate\Support\Facades\Route;

//Route::middleware(['auth'])->group(function () {
    Route::resource('roles', App\Http\Controllers\RoleController::class, []);
    Route::get('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class,'addPermissionToRole'])->name('addPermissionToRole');
    Route::put('roles/{roleId}/give-permissions',[App\Http\Controllers\RoleController::class,'savePermissionToRole'])->name('savePermissionToRole');

    //});
