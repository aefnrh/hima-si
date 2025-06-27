<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\KabinetController;
use App\Http\Controllers\Admin\KabinetDivisionController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\AspirationController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ClubController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Division routes
    Route::resource('divisions', DivisionController::class);
    
    // Work Program routes
    Route::get('divisions/{division}/work-programs', [\App\Http\Controllers\Admin\WorkProgramController::class, 'index'])->name('divisions.work-programs.index');
    Route::get('divisions/{division}/work-programs/create', [\App\Http\Controllers\Admin\WorkProgramController::class, 'create'])->name('divisions.work-programs.create');
    Route::post('divisions/{division}/work-programs', [\App\Http\Controllers\Admin\WorkProgramController::class, 'store'])->name('divisions.work-programs.store');
    Route::get('divisions/{division}/work-programs/{index}/edit', [\App\Http\Controllers\Admin\WorkProgramController::class, 'edit'])->name('divisions.work-programs.edit');
    Route::put('divisions/{division}/work-programs/{index}', [\App\Http\Controllers\Admin\WorkProgramController::class, 'update'])->name('divisions.work-programs.update');
    Route::delete('divisions/{division}/work-programs/{index}', [\App\Http\Controllers\Admin\WorkProgramController::class, 'destroy'])->name('divisions.work-programs.destroy');
    
    // Event routes
    Route::resource('events', EventController::class);
    
    // Cabinet routes
    Route::resource('kabinet', KabinetController::class);
    
    // Combined Kabinet and Division routes
    Route::get('kabinet-division', [KabinetDivisionController::class, 'index'])->name('kabinet-division.index');
    Route::get('kabinet-division/kabinet/create', [KabinetDivisionController::class, 'createKabinet'])->name('kabinet-division.kabinet.create');
    Route::post('kabinet-division/kabinet', [KabinetDivisionController::class, 'storeKabinet'])->name('kabinet-division.kabinet.store');
    Route::get('kabinet-division/kabinet/{kabinet}/edit', [KabinetDivisionController::class, 'editKabinet'])->name('kabinet-division.kabinet.edit');
    Route::put('kabinet-division/kabinet/{kabinet}', [KabinetDivisionController::class, 'updateKabinet'])->name('kabinet-division.kabinet.update');
    Route::delete('kabinet-division/kabinet/{kabinet}', [KabinetDivisionController::class, 'destroyKabinet'])->name('kabinet-division.kabinet.destroy');
    Route::get('kabinet-division/kabinet/{kabinet}', [KabinetDivisionController::class, 'showKabinet'])->name('kabinet-division.kabinet.show');
    
    Route::get('kabinet-division/division/create', [KabinetDivisionController::class, 'createDivision'])->name('kabinet-division.division.create');
    Route::post('kabinet-division/division', [KabinetDivisionController::class, 'storeDivision'])->name('kabinet-division.division.store');
    Route::get('kabinet-division/division/{division}/edit', [KabinetDivisionController::class, 'editDivision'])->name('kabinet-division.division.edit');
    Route::put('kabinet-division/division/{division}', [KabinetDivisionController::class, 'updateDivision'])->name('kabinet-division.division.update');
    Route::delete('kabinet-division/division/{division}', [KabinetDivisionController::class, 'destroyDivision'])->name('kabinet-division.division.destroy');
    
    // Member routes
    Route::resource('members', MemberController::class);
    
    // Aspiration routes - only index, show, update, destroy
    Route::resource('aspirations', AspirationController::class)->except(['create', 'store', 'edit']);
    
    // Newsletter routes
    Route::get('newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    Route::delete('newsletter/{id}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');
    Route::get('newsletter/export', [NewsletterController::class, 'export'])->name('newsletter.export');
    
    // Club routes
    Route::resource('clubs', ClubController::class);
    
    // Gallery routes
    Route::resource('galleries', GalleryController::class);
    
    // Profile routes
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    // Settings routes
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});