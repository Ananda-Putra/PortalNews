<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

// Halaman publik
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/news', [AdminNewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [AdminNewsController::class, 'create'])->name('news.create');
    Route::post('/news', [AdminNewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}', [AdminNewsController::class, 'show'])->name('news.show');
    Route::get('/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [AdminNewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [AdminNewsController::class, 'destroy'])->name('news.destroy');
});

Route::get('/test', function() {
    return 'Admin route works!';
});
