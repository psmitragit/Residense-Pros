<?php

use App\Http\Controllers\Agent\AdsController;
use App\Http\Controllers\Agent\DashboardController;
use App\Http\Controllers\Agent\PropertyController;
use App\Http\Controllers\Agent\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(PropertyController::class)->prefix('property')->as('property.')->group(function () {
    Route::get('/published', 'published')->name('published');
    Route::get('/drafted', 'drafted')->name('drafted');
    Route::get('/blocked', 'blocked')->name('blocked');
    Route::get('/archive', 'archive')->name('archive');
    Route::get('/archive/{id}', 'archiveProperty')->name('do.archive');
    Route::get('/unarchive/{id}', 'unarchiveProperty')->name('do.unarchive');
});

Route::controller(AdsController::class)->prefix('ads')->as('ads.')->group(function () {
    Route::get('/all', 'all')->name('all');
    Route::get('/add', 'add')->name('add');
    Route::post('/save', 'save')->name('save');
    Route::post('/preview', 'preview')->name('preview');
    Route::get('/ad-demoview', 'previewAd')->name('preview.ad');
});

Route::controller(SubscriptionController::class)->as('subscription.')->prefix('my-subscriptions')->group(function(){
    Route::get('/', 'index')->name('index');
});
