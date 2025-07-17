<?php

use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\AgentController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/edit-profile', 'editProfile')->name('edit.profile');
    Route::post('/do-edit-profile', 'doEditProfile')->name('profile.do-edit');
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

Route::controller(AgentController::class)->prefix('agent')->as('agent.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/history/{id}', 'purchaseHistory')->name('purchase.history');
});

Route::controller(SubscriptionController::class)->prefix('subscription')->as('subscription.')->group(function () {
    Route::get('/plans', 'index')->name('index');
    Route::post('/save', 'save')->name('save');
    Route::get('/history', 'history')->name('history');
});

Route::controller(AdsController::class)->prefix('ads')->as('ads.')->group(function () {
    Route::get('/position', 'position')->name('position');
    Route::get('/all', 'all')->name('all');
    Route::get('/revenue', 'revenue')->name('revenue');
    Route::get('/pending', 'pending')->name('pending');
    Route::get('/pending/{id}', 'pending')->name('pending.details');
    Route::post('/update', 'update')->name('update');
    Route::get('/reject/{id}', 'reject')->name('reject');
    Route::get('/approve/{id}', 'approve')->name('approve');
    Route::get('/show-details/{id}', 'showDetails')->name('show.details');
});

Route::controller(FaqController::class)->prefix('faq')->as('faq.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::post('/add-edit', 'addEdit')->name('add.edit');
    Route::post('/sort', 'sort')->name('sort');
    Route::get('/get/{id}', 'get')->name('get');
});
