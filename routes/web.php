<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Eksik use satırı eklendi

// Ana site rotaları
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\SearchRescueController;
use App\Http\Controllers\OnlineCoursesController;
use App\Http\Controllers\AccountNumbersController;
use App\Http\Controllers\KvkkController;

// Ana Site Rotaları
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hakkimizda', [AboutController::class, 'index'])->name('about');
Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');
Route::post('/iletisim', [ContactController::class, 'send'])->name('contact.send');
Route::get('/projelerimiz', [ProjectsController::class, 'index'])->name('projects');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery');
Route::get('/sss', [FaqController::class, 'index'])->name('faq');
Route::get('/bagis-yap', [DonationController::class, 'index'])->name('donation');
Route::post('/bagis-yap', [DonationController::class, 'store'])->name('donation.store');
Route::get('/acil-durum-mudahale', [EmergencyController::class, 'index'])->name('emergency');
Route::get('/arama-kurtarma', [SearchRescueController::class, 'index'])->name('search-rescue');
Route::get('/online-kurslar', [OnlineCoursesController::class, 'index'])->name('online-courses');
Route::get('/hesap-numaralari', [AccountNumbersController::class, 'index'])->name('account-numbers');
Route::get('/kvkk', [KvkkController::class, 'index'])->name('kvkk');

// Admin Routes (middleware kaldırıldı)
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Routes
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login']);

    // Authenticated Routes (middleware yok)
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    // Site Settings
    Route::get('settings', [App\Http\Controllers\Admin\SiteSettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [App\Http\Controllers\Admin\SiteSettingController::class, 'update'])->name('settings.update');
    // Gallery Management
    Route::get('gallery', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/create', [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('gallery.store');
    Route::get('gallery/{gallery}/edit', [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('gallery/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('gallery/{gallery}', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::post('gallery/order', [App\Http\Controllers\Admin\GalleryController::class, 'updateOrder'])->name('gallery.updateOrder');

    // Announcements Management
    Route::get('announcements', [App\Http\Controllers\Admin\AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('announcements/create', [App\Http\Controllers\Admin\AnnouncementController::class, 'create'])->name('announcements.create');
    Route::post('announcements', [App\Http\Controllers\Admin\AnnouncementController::class, 'store'])->name('announcements.store');
    Route::get('announcements/{announcement}/edit', [App\Http\Controllers\Admin\AnnouncementController::class, 'edit'])->name('announcements.edit');
    Route::put('announcements/{announcement}', [App\Http\Controllers\Admin\AnnouncementController::class, 'update'])->name('announcements.update');
    Route::delete('announcements/{announcement}', [App\Http\Controllers\Admin\AnnouncementController::class, 'destroy'])->name('announcements.destroy');
    Route::post('announcements/order', [App\Http\Controllers\Admin\AnnouncementController::class, 'updateOrder'])->name('announcements.updateOrder');
});

// Laravel default auth routes
require __DIR__.'/auth.php';
Auth::routes();

// Default home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
