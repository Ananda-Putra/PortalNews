<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('user');
});

Route::get('/portaladmin', [NewsController::class,'index']);

