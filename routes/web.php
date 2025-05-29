<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudesController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('solicitudes', SolicitudesController::class);