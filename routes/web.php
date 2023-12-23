<?php

use App\Http\Controllers\BackendInsurancesController;
use App\Http\Controllers\BackendClaimController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClaimController;

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



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:web'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/claim/create', [ClaimController::class, 'create'])->name('claim.create');
    Route::post('/claim/create', [ClaimController::class, 'store'])->name('claim.store');
    Route::get('/claim/show/{id}', [ClaimController::class, 'show'])->name('claim.show');
    Route::get('/claim/shows/', [ClaimController::class, 'shows'])->name('claim.shows');

    Route::get('/profile/insurances', [ProfileController::class, 'insurances'])->name('profile.insurances');
    Route::get('/profile/insurance/{id}', [ProfileController::class, 'insurance'])->name('profile.insurance');

    Route::get('/payment/form', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
});

Route::middleware(['guest:web'])->group(function () {
    Route::get('/registration', [RegistrationController::class, 'showRegistrationForm']);
    Route::post('/registration', [RegistrationController::class, 'processRegistration']);

    Route::get('/login', [RegistrationController::class, 'showLoginForm']);
    Route::post('/login', [RegistrationController::class, 'processLogin']);
});


Route::group(['prefix' => 'backend'], function () {
    Route::get('/login', [EmployeeController::class, 'showLoginForm'])->name('backend.login');
    Route::post('/login', [EmployeeController::class, 'login']);

    Route::middleware('auth:employee')->get('/home', function () {
        return view('backend.home');
    });
    Route::middleware('guest:employee')->get('/', function () {
        return redirect()->route('backend.login');
    });

    Route::middleware('auth:employee')->get('/claim/shows', [BackendClaimController::class, 'showAllClaims'])->name('backend.shows');
    Route::middleware('auth:employee')->get('/show/{id}', [BackendClaimController::class, 'show'])->name('backend.show');
    Route::middleware('auth:employee')->put('/update-status/{id}', [BackendClaimController::class, 'updateStatus'])->name('backend.updateStatus');

    Route::get('/insurances', [BackendInsurancesController::class, 'shows'])->name('backend.insurances.shows');
    Route::get('/insurances/create', [BackendInsurancesController::class, 'create'])->name('backend.insurances.create');
    Route::post('/insurances', [BackendInsurancesController::class, 'store'])->name('backend.insurances.store');
    Route::get('/insurances/{id}/edit', [BackendInsurancesController::class, 'edit'])->name('backend.insurances.edit');
    Route::put('/insurances/{id}', [BackendInsurancesController::class, 'update'])->name('backend.insurances.update');
    Route::delete('/insurances/{id}', [BackendInsurancesController::class, 'destroy'])->name('backend.insurances.destroy');

});
