<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PropertyController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(BlogController::class)->prefix('blogs')->as('blog.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/add', 'add')->name('add');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::post('/add-edit', 'addEdit')->name('do-add-edit');
});

Route::controller(CategoryController::class)->prefix('categories')->as('categories.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/add-edit', 'addEdit')->name('add-edit');
    Route::get('/delete/{id}', 'delete')->name('delete');
});

Route::controller(PropertyController::class)->prefix('property')->as('property.')->group(function () {
    Route::get('/', 'index')->name('index');
});
