<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Models\MstTraining;

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
    $trainings = MstTraining::all();
    return view('welcome', compact('trainings'));
});

Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Route untuk Admin Page, hanya akses jika telah login
Route::get('/admin/dashboard', function () {
    return view('admin');
})->middleware('auth');

// Updated resource route with name prefix "admin"
Route::resource('admin/training', App\Http\Controllers\TrainingController::class, ['as' => 'admin']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UsersController::class);
    Route::get('profile', [UserController::class, 'editProfile'])
         ->name('profile')
         ->middleware('auth');
});

Route::get('/user/details', [App\Http\Controllers\UserController::class, 'getLoggedInUserDetails']);

Route::patch('/user/update', [UserController::class, 'updateUser'])->middleware('auth');
