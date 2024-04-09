<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [ExcelController::class,'index'])->name('index');
Route::post('form_submission', [ExcelController::class,'insert'])->name('form_submission');
