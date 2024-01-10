<?php

use App\Http\Controllers\Append\Admin\UserController;
use App\Http\Controllers\Append\Admin\PermissionController;
use App\Http\Controllers\Append\Admin\RoleController;
use App\Http\Controllers\Append\Admin\ClientController;
use App\Http\Controllers\Append\Admin\FeatureController;
use App\Http\Controllers\Append\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Append\Admin\MenuController;
use App\Http\Controllers\Append\Admin\PostCategoryController as AdminPostCategoryController;
use App\Http\Controllers\Append\Admin\PostController as AdminPostController;
use App\Http\Controllers\Append\Admin\ProjectCategoryController as AdminProjectCategoryController;
use App\Http\Controllers\Append\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Append\Admin\QuestionController;
use App\Http\Controllers\Append\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Append\Admin\TagController as AdminTagController;
use App\Http\Controllers\Append\Admin\TestimonialController;
use App\Http\Controllers\Append\CommentController;
use App\Http\Controllers\Append\ContactController;
use App\Http\Controllers\Append\IndexController;
use App\Http\Controllers\Append\PostCategoryController;
use App\Http\Controllers\Append\PostController;
use App\Http\Controllers\Append\ProjectCategoryController;
use App\Http\Controllers\Append\ProjectController;
use App\Http\Controllers\Append\ServiceController;
use App\Http\Controllers\Append\TagController;
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
Route::get('services/{service}/', [ServiceController::class, 'show'])
    ->name('services.show');
Route::get('services/pdf/{service}/', [ServiceController::class, 'downloadPdf'])
    ->name('services.pdf');
Route::get('services/doc/{service}/', [ServiceController::class, 'downloadDoc'])
    ->name('services.doc');
Route::get('projects/', [ProjectController::class, 'index'])
    ->name('projects.index');
Route::get('projects/{project}/', [ProjectController::class, 'show'])
    ->name('projects.show');
Route::get('project-categories/{category}/', [ProjectCategoryController::class, 'show'])
    ->name('project-categories.show');
Route::get('post-categories/{category}', [PostCategoryController::class, 'show'])
    ->name('post-categories.show');
Route::get('tags/{tag}', [TagController::class, 'show'])->name('tags.show');
Route::get('posts/', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('comments/store', [CommentController::class, 'store'])
    ->name('comments.store');
Route::post('contact/store', [ContactController::class, 'store'])
    ->name('contact.store');


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
    Route::resource('projects', AdminProjectController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('post-categories', AdminPostCategoryController::class);
    Route::resource('tags', AdminTagController::class);
    Route::resource('posts', AdminPostController::class);

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
