<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('auth')->group(function () {

    Route::prefix('farms')->group(function () {

        Route::get('/create', [App\Http\Controllers\Backend\FarmController::class, 'create'])->name('farms.create')->middleware('permission:create.farms');

        Route::post('/create', [App\Http\Controllers\Backend\FarmController::class, 'store'])->name('farms.store')->middleware('permission:create.farms');
         
        Route::prefix('{farm_id}')->group(function () {
    
            Route::put('/update', [App\Http\Controllers\Backend\FarmController::class, 'update'])->name('farms.update')->middleware('permission:edit.farms');

            Route::get('/edit', [App\Http\Controllers\Backend\FarmController::class, 'edit'])->name('farms.edit')->middleware('permission:edit.farms');

            Route::delete('/', [App\Http\Controllers\Backend\FarmController::class, 'destroy'])->name('farms.destroy')->middleware('permission:delete.farms');
            
            Route::get('/', [App\Http\Controllers\Backend\FarmController::class, 'show'])->name('farms.view')->middleware('permission:view.farms');

        });

        Route::get('/', [App\Http\Controllers\Backend\FarmController::class, 'index'])->name('farms')->middleware('permission:view.farms');
 
    });

    Route::get('/permissions', [App\Http\Controllers\Backend\AccessControl\PermissionsController::class, 'index'])->name('permissions')->middleware('permission:view.permissions');


    Route::prefix('roles')->group(function () {

        Route::get('/create', [App\Http\Controllers\Backend\AccessControl\RolesController::class, 'create'])->name('roles.create')->middleware('permission:create.roles');

        
        Route::prefix('{role_id}')->group(function () {
    
            Route::get('/edit', [App\Http\Controllers\Backend\AccessControl\RolesController::class, 'edit'])->name('roles.edit')->middleware('permission:edit.roles');

            Route::get('/', [App\Http\Controllers\Backend\AccessControl\RolesController::class, 'view'])->name('roles.view')->middleware('permission:view.roles');

        });
            
        Route::get('/', [App\Http\Controllers\Backend\AccessControl\RolesController::class, 'index'])->name('roles')->middleware('permission:view.roles');
 
    });

    Route::prefix('users')->group(function () {
        
        Route::prefix('{user_id}')->group(function () {

        Route::get('/assign-roles', [App\Http\Controllers\Backend\AccessControl\UsersController::class, 'assign_roles'])->name('users.assign.roles')->middleware('permission:assign.roles.to.users');

            Route::get('/', [App\Http\Controllers\Backend\AccessControl\UsersController::class, 'view'])->name('users.view')->middleware('permission:view.users');

        });
            
        Route::get('/', [App\Http\Controllers\Backend\AccessControl\UsersController::class, 'index'])->name('users')->middleware('permission:view.users');
 
    });

    Route::prefix('verify-email')->group(function () {

        Route::get('/', App\Http\Controllers\Auth\EmailVerificationPromptController::class)->name('verification.notice');

        Route::get('/{id}/{hash}', App\Http\Controllers\Auth\VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    });
    
    Route::post('email/verification-notification', [App\Http\Controllers\Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');

    Route::prefix('confirm-password')->group(function () {

        Route::get('/', [App\Http\Controllers\Auth\ConfirmablePasswordController::class, 'show'])->name('password.confirm');

        Route::post('/', [App\Http\Controllers\Auth\ConfirmablePasswordController::class, 'store']);

    });

    Route::post('logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');

});

Route::middleware('guest')->group(function () {

    Route::get('register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');

    Route::post('register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);

    Route::get('login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])->name('password.request');

    Route::post('forgot-password', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [App\Http\Controllers\Auth\NewPasswordController::class, 'create'])->name('password.reset');

    Route::post('reset-password', [App\Http\Controllers\Auth\NewPasswordController::class, 'store'])->name('password.store');

});

Route::get('/', function () {
    return view('frontend.home');
})->name('home');
