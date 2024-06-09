<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\BackendInsurancesController;
use App\Http\Controllers\BackendClaimController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClaimController;
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

// Головна сторінка
Route::get('/', function () {
    return view('welcome');
});

// Авторизовані користувачі
Route::middleware(['auth:web'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


    // Заявки
    Route::prefix('claim')->group(function () {
        Route::get('/create', [ClaimController::class, 'create'])->name('claim.create');
        Route::post('/create', [ClaimController::class, 'claimSaving'])->name('claim.store');
        Route::get('/show/{id}', [ClaimController::class, 'showClaim'])->name('claim.show');
        Route::get('/shows', [ClaimController::class, 'showClaims'])->name('claim.shows');
    });

    // Страховки
    Route::prefix('insurances')->group(function () {
        Route::get('/', [InsuranceController::class, 'showAllInsurances'])->name('insurance.insurances');
        Route::get('/{id}', [InsuranceController::class, 'showInsurance'])->name('insurance.insurance');
    });

    // Платежи
    Route::prefix('payment')->group(function () {
        Route::get('/form', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
        Route::post('/process', [PaymentController::class, 'processPayment'])->name('payment.process');
    });
});

// Гостьові користувачі
Route::middleware(['guest:web'])->group(function () {
    // Регистрація
    Route::get('/registration', [RegistrationController::class, 'showRegistrationForm']);
    Route::post('/registration', [RegistrationController::class, 'processRegistration']);

    // Вход
    Route::get('/login', [RegistrationController::class, 'showLoginForm']);
    Route::post('/login', [RegistrationController::class, 'processLogin']);
});

// Backend
Route::prefix('backend')->group(function () {
    // Авторизація для працівників
    Route::get('/login', [EmployeeController::class, 'showLoginForm'])->name('backend.login');
    Route::post('/login', [EmployeeController::class, 'login']);

    // Головна сторінка
    Route::middleware('auth:employee')->get('/home', function () {
        return view('backend.home');
    });

    Route::middleware('guest:employee')->get('/', function () {
        return redirect()->route('backend.login');
    });

    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('backend.analytics');

    // Заявки
    Route::middleware('auth:employee')->group(function () {
        Route::get('/claim/shows', [BackendClaimController::class, 'showAllClaims'])->name('backend.shows');
        Route::get('/show/{id}', [BackendClaimController::class, 'showSingleClaim'])->name('backend.show');
        Route::put('/update-claim/{id}', [BackendClaimController::class, 'updateClaim'])->name('backend.updateClaim');
    });

    // Страховки
    Route::group(['prefix' => 'insurances'], function () {
        Route::get('/', [BackendInsurancesController::class, 'showsAllInsurances'])->name('backend.insurances.shows');
        Route::get('/create', [BackendInsurancesController::class, 'createNewInsurance'])->name('backend.insurances.create');
        Route::post('/', [BackendInsurancesController::class, 'insuranceSaving'])->name('backend.insurances.store');
        Route::get('/{id}/edit', [BackendInsurancesController::class, 'edit'])->name('backend.insurances.edit');
        Route::put('/{id}', [BackendInsurancesController::class, 'update'])->name('backend.insurances.update');
        Route::delete('/{id}', [BackendInsurancesController::class, 'destroy'])->name('backend.insurances.destroy');
    });
});
