<?php

use App\Http\Controllers\Append\Admin\UserController;
use App\Http\Controllers\Append\Admin\PermissionController;
use App\Http\Controllers\Append\Admin\RoleController;
use App\Http\Controllers\Append\Admin\ClientController;
use App\Http\Controllers\Append\Admin\FeatureController;
use App\Http\Controllers\Append\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Append\Admin\MenuController;
use App\Http\Controllers\Append\Admin\ProjectCategoryController as AdminProjectCategoryController;
use App\Http\Controllers\Append\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Append\IndexController;
use App\Http\Controllers\Append\ServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// WEBSITE "APPEND"
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('services/{service}', [ServiceController::class, 'show'])
    ->name('services.show');

// ADMIN PANEL
Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function() {
    Route::get('/', [AdminIndexController::class, 'index']);
    Route::resource('clients', ClientController::class);
    Route::resource('services', AdminServiceController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('project-categories', AdminProjectCategoryController::class);

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
