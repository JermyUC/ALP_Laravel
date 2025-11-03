<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GuideController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlantController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/store', [CategoryController::class, 'index'])->name('store');
Route::get('/guide', [GuideController::class, 'index'])->name('guide');

