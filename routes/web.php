<?php

use App\Http\Controllers\Agent\SubscriptionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\AgentController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Middleware\AgentLoggedInMiddleware;
use App\Http\Middleware\CheckUserLoggedInMiddleware;
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
    Route::match(['get', 'post'], '/',  'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/faqs', 'faqs')->name('faq');
    Route::match(['get', 'post'], '/blogs', 'blogs')->name('blogs');
    Route::get('/contact-us', 'contact')->name('contact');
    Route::post('/do-enquiry', 'doEnquiry')->name('do.enquiry');
    Route::post('/add-remove-fev', 'addRemoveFevorit')->name('property.add-remove-fev');
    Route::post('/notify-me', 'doNotifyMe')->name('do.notify.me');
    Route::post('/do-contact', 'doContact')->name('do.contact');
    //PROPERTIES
    Route::match(['get', 'post'], '/properties', 'properties')->name('properties');
    Route::post('/properties/map', 'propertiesMap')->name('property.map');
    Route::post('/properties/get-closest-properties', 'closestProperties')->name('property.closest');
    Route::get('/property-details/{slug}', 'propertyDetails')->name('property.details');
    Route::get('/terms-and-condition', 'staticPage')->name('terms');
    Route::get('/privecy-policy', 'staticPage')->name('privacy');
    Route::get('/cookie-policy', 'staticPage')->name('cookie.policy');
});

Route::controller(BlogController::class)->as('blog.')->group(function () {
    Route::get('/blog/{slug}', 'blogDetails')->name('details');
    Route::post('/blog-like', 'blogLike')->name('like');
    Route::post('/comment', 'comment')->name('comment');
});

Route::middleware('web', AgentLoggedInMiddleware::class)->controller(AgentController::class)->group(function () {
    Route::get('/add-property', 'addProperty')->name('property.add');
    Route::get('/update-property/{id}', 'updateProperty')->name('property.update');
    Route::post('/do-add-property', 'doAddProperty')->name('agent.property.add.do');
});

Route::middleware(CheckUserLoggedInMiddleware::class)->group(function () {
    Route::get('/fevorites', [HomeController::class, 'fevorites'])->name('user.fevorites');
    Route::get('/edit-profile', [HomeController::class, 'editProfile'])->name('user.edit.profile');
    Route::post('/do-edit-profile', [HomeController::class, 'doEditProfile'])->name('do.edit-profile');
    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('user.change.password');
    Route::post('/do-changhe-password', [HomeController::class, 'doChangePassword'])->name('do.change.password');
});

Route::controller(SubscriptionController::class)->group(function () {
    Route::get('agent/subscription', 'subscription')->name('agent.subscription');
    Route::get('/subscription/thank-you/{id}', 'thankYou')->name('subscription.thank.you');
    Route::post('/subscription/create-payment', 'createPayment')->name('subscription.create.payment');
});

Route::get('update-property-count/{id}', function ($id) {
    return updatePropertyCount($id);
})->name('update.property.count');

Route::get('/sitemap', [HomeController::class, 'sitemap'])->name('sitemap');
