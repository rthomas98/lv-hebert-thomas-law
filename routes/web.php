<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Trademark Services

Route::get('/trademark-services/trademark-services-overview', function () {
    return Inertia::render('Trademark/TrademarkServicesOverview');
})->name('trademark-services-overview');

Route::get('/trademark-services/trademark-search-and-clearance', function () {
    return Inertia::render('Trademark/TrademarkSearchAndClearance');
})->name('trademark-search-and-clearance');

Route::get('/trademark-services/trademark-application-and-registration', function () {
    return Inertia::render('Trademark/TrademarkApplicationAndRegistration');
})->name('trademark-application-and-registration');

Route::get('/trademark-services/trademark-monitoring', function () {
    return Inertia::render('Trademark/TrademarkMonitoring');
})->name('trademark-monitoring');

Route::get('/trademark-services/opposition-and-cancellation-proceedings', function () {
    return Inertia::render('Trademark/OppositionAndCancellationProceedings');
})->name('opposition-and-cancellation-proceedings');

Route::get('/trademark-services/trademark-enforcement-and-litigation', function () {
    return Inertia::render('Trademark/TrademarkEnforcementAndLitigation');
})->name('trademark-enforcement-and-litigation');

Route::get('/trademark-services/trademark-renewal', function () {
    return Inertia::render('Trademark/Trademark/TrademarkRenewal');
})->name('trademark-renewal');

Route::get('/trademark-services/trademark-licensing-agreements', function () {
    return Inertia::render('Trademark/TrademarkLicensingAgreements');
})->name('trademark-licensing-agreements');

Route::get('/trademark-services/international-trademark-registration', function () {
    return Inertia::render('Trademark/InternationalTrademarkRegistration');
})->name('international-trademark-registration');

Route::get('/trademark-services/trademark-portfolio-management', function () {
    return Inertia::render('Trademark/TrademarkPortfolioManagement');
})->name('trademark-portfolio-management');

Route::get('/other-services/other-services-overview', function () {
    return Inertia::render('Others/OtherLegalServicesOverview');
})->name('other-services-overview');

Route::get('/other-services/business-law', function () {
    return Inertia::render('Others/BusinessLaw');
})->name('business-law');

Route::get('/other-services/estate-planning', function () {
    return Inertia::render('Others/EstatePlanning');
})->name('estate-planning');

Route::get('/other-services/general-counsel-services', function () {
    return Inertia::render('Others/GeneralCounselServices');
})->name('general-counsel-services');

Route::get('/other-services/privacy-and-data-protection', function () {
    return Inertia::render('Others/PrivacyAndDataProtection');
})->name('privacy-and-data-protection');

Route::get('/about-me', function () {
    return Inertia::render('AboutMe');
})->name('about-me');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/privacy', function () {
    return Inertia::render('Privacy');
})->name('privacy');

Route::get('/terms', function () {
    return Inertia::render('Terms');
})->name('terms');

require __DIR__.'/auth.php';
