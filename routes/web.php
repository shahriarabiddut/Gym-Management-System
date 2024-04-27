<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('root');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact/store', [HomeController::class, 'contactStore'])->name('contact.store');
Route::get('/api/data/{id}', [HomeController::class, 'apiData'])->name('api.data');
//oAuth2
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
//User Routes
Route::get('user', [ProfileController::class, 'index'])->middleware(['auth'])->name('user.dashboard');
// Route::get('user', [ProfileController::class, 'index'])->middleware(['auth'])->middleware(['auth', 'verified'])->name('user.dashboard');

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile.view');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/editpassword', [ProfileController::class, 'editpassword'])->name('profile.editpassword');
    Route::put('/profile/updatepassword', [ProfileController::class, 'updatepassword'])->name('profile.passwordupdate');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Support Routes
    Route::get('support/{id}/delete', [SupportController::class, 'destroy'])->name('support.destroy');
    Route::resource('support', SupportController::class);
    //Enroll Routes
    Route::get('enroll/{id}/delete', [MembershipController::class, 'destroy'])->name('enroll.destroy');
    Route::get('enrollprint/', [MembershipController::class, 'generatePDF'])->name('enroll.print');
    Route::resource('enroll', MembershipController::class);

    // Select Plan
    Route::get('/plan', [MembershipController::class, 'selectPlan'])->name('plan.plan');
    Route::put('/plan/edit', [MembershipController::class, 'planupdate'])->name('plan.update');

    // Payment
    Route::get('/payments', [PaymentController::class, 'index'])->name('plan.payments');
    Route::get('/payment/{id}', [PaymentController::class, 'planPayment'])->name('plan.payment');
    Route::put('/payment/store', [PaymentController::class, 'paymentupdate'])->name('plan.paymentUpdate');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/staff.php';
