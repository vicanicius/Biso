<?php

use App\Http\Controllers\AverageController;
use Illuminate\Support\Facades\Route;

Route::post('/average', [AverageController::class, 'calc']);