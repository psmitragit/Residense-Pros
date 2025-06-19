<?php

use App\Http\Controllers\Agent\SubscriptionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\AgentController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Middleware\AgentLoggedInMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->as('auth.')->group(function () {
    //USER
    Route::post('signup', 'signup')->name('signup');
    Route::get('varify-email/{id}', 'varifyEmail')->where('id', '.*')->name('varify.email');
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
    Route::post('forgot-password', 'forgotPassword')->name('forgot.password');
    //ADMIN
    Route::get('admin/login', 'adminLogin')->name('admin.login');
    Route::post('admin/login', 'doAdminLogin')->name('admin.do.login');
    Route::get('admin/logout', 'adminLogout')->name('admin.logout');
});
Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
Route::post('do-reset-password', [AuthController::class, 'doResetPassword'])->name('do.password.reset');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/faqs', 'faqs')->name('faq');
    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/contact-us', 'contact')->name('contact');
    Route::get('/terms-and-condition', 'termsAndCondition')->name('terms');
    Route::get('/privecy-policy', 'privectyPolicy')->name('privacy');
    Route::get('/cookie-policy', 'cookiePolicy')->name('cookie.policy');
    //PROPERTIES
    Route::get('/properties', 'properties')->name('properties');
    Route::get('/property-details/{id}', 'propertyDetails')->name('property.details');
});

Route::middleware('web', AgentLoggedInMiddleware::class)->controller(AgentController::class)->group(function(){
    Route::get('/add-property', 'addProperty')->name('property.add');
    Route::post('/do-add-property', 'doAddProperty')->name('agent.property.add.do');
});

Route::controller(SubscriptionController::class)->group(function(){
    Route::get('agent/subscription', 'subscription')->name('agent.subscription');
    Route::get('/subscription/thank-you/{id}', 'thankYou')->name('subscription.thank.you');
    Route::post('/subscription/create-payment', 'createPayment')->name('subscription.create.payment');
});
