<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\AgentController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\SubscriptionController;
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
    Route::get('/blocked', 'blocked')->name('blocked');
    Route::get('/block/{id}', 'doBlock')->name('do.block');
    Route::get('/unblock/{id}', 'doUnBlock')->name('do.unblock');
});

Route::controller(AgentController::class)->prefix('agent')->as('agent.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/history/{id}', 'purchaseHistory')->name('purchase.history');
});
Route::controller(SubscriptionController::class)->prefix('subscription')->as('subscription.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/save', 'save')->name('save');
});
