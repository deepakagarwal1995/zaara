<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\LocalCitiesController;
use App\Http\Controllers\CabsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [VisitorsController::class, 'index'])->name('index');
Route::post('/local-cabs', [VisitorsController::class, 'local_cabs'])->name('local_cabs');
Route::get('/autocomplete-city', [VisitorsController::class, 'autocomplete'])->name('autocomplete.city');
Route::get('/about', [VisitorsController::class, 'about'])->name('about');
Route::get('/faq', [VisitorsController::class, 'faq'])->name('faq');
Route::get('/contact', [VisitorsController::class, 'contact'])->name('contact');
Route::get('/termscondition', [VisitorsController::class, 'termscondition'])->name('termscondition');
Route::get('/privacypolicy', [VisitorsController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('/cancelation_policy', [VisitorsController::class, 'cancelation_policy'])->name('cancelation_policy');
Route::get('/blog', [VisitorsController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [VisitorsController::class, 'blog_detail'])->name('blog_detail');
Route::get('/page/{slug}', [VisitorsController::class, 'page'])->name('page');
Route::post('/outstation-cabs', [VisitorsController::class, 'outstation_cabs'])->name('outstation_cabs');

Route::post('/checkout_outs', [VisitorsController::class, 'checkout_outs'])->name('checkout_outs');
Route::post('/payment_outs', [VisitorsController::class, 'payment_outs'])->name('payment_outs');

Route::post('/checkout', [VisitorsController::class, 'checkout'])->name('checkout');
Route::post('/payment', [VisitorsController::class, 'payment'])->name('payment');

Route::get('/test', [VisitorsController::class, 'test'])->name('test');

// Route::get('pay-u-response',[VisitorsController::class,'payUResponse'])->name('pay.u.response');
// Route::get('pay-u-cancel',[VisitorsController::class,'payUCancel'])->name('pay.u.cancel');
Route::post('pay-u-response',[VisitorsController::class,'payUResponse'])->name('pay.u.response');
Route::post('pay-u-cancel',[VisitorsController::class,'payUCancel'])->name('pay.u.cancel');


Route::get('/driver/registration/', [VisitorsController::class, 'driver_registration'])->name('driver_registration');
Route::post('/driver/registration_action/', [VisitorsController::class, 'driver_registration_action'])->name('driver_registration.action');



Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('cab', CabsController::class);
    Route::resource('pages', PagesController::class);
    Route::resource('local_city', LocalCitiesController::class);
    Route::resource('blogs', BlogsController::class);
    Route::resource('driver', DriverController::class);
    Route::resource('booking', BookingController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/driver/status/{id}', [DriverController::class, 'status'])->name('driver.status');
});

Route::get('/storage-link', function () {
    $target = storage_path('app/public');
    $link = public_path('/storage');
    echo symlink($target, $link);
    // echo "symbolic link created successfully";
});
