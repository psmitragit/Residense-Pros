<?php

use App\Http\Controllers\Agent\DashboardController;
use App\Http\Controllers\Agent\PropertyController;
use App\Http\Controllers\Agent\SubscriptionController;
use Illuminate\Support\Facades\Route;
use Stripe\Subscription;

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

Route::controller(SubscriptionController::class)->as('subscription.')->prefix('my-subscriptions')->group(function(){
    Route::get('/', 'index')->name('index');
});
