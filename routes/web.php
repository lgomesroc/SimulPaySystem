<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/add-items', [CartController::class, 'handRequest']);
