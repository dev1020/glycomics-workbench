<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('pages', App\Http\Controllers\PageController::class, []);
    //@softdelete
    Route::put('pages/{page}/restore', [App\Http\Controllers\PageController::class, 'restore'])->name('pages.restore');
    Route::delete('pages/{page}/purge', [App\Http\Controllers\PageController::class, 'purge'])->name('pages.purge');
    Route::post('pages/uploadImagesTinymce', [App\Http\Controllers\PageController::class,'uploadImagesTinymce']);
    //@endsoftdelete
});
