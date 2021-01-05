<?php

use App\http\controllers\EventController;
use App\http\controllers\LecturerController;
use App\http\controllers\StaffController;
use App\http\controllers\StudentController;

use App\http\controllers\staff\EventController as StaffEventController;
use App\http\controllers\staff\UserController as StaffUserController;

use App\http\controllers\lecturer\EventController as LecturerEventController;
use App\http\controllers\lecturer\UserController as LecturerUserController;

use App\http\controllers\student\EventController as StudentEventController;
use App\http\controllers\student\UserController as StudentUserController;
use App\http\controllers\student\AdminEventController as StudentAdminController;

use App\http\controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('home');
});

// Route::resource('event', EventController::class);
// Route::resource('student', StudentController::class);
// Route::resource('lecturer', LecturerController::class);
// Route::resource('staff', StaffController::class);
// Route::resource('user', UserController::class);

Route::post('event/approve', [EventController::class, 'approve'])->name('event.approve');
Route::post('event/reject', [EventController::class, 'reject'])->name('event.reject');
Route::post('event/revise', [EventController::class, 'revise'])->name('event.revise');


Route::group(['middleware' => 'staff', 'prefix' => 'staff', 'as' => 'staff.'], function () {
    // Route::resource('event', StaffEventController::class);
    Route::resource('user', StaffUserController::class);
});

Route::group(['middleware' => 'lecturer','prefix' => 'lecturer', 'as' => 'lecturer.'], function () {
    Route::resource('event', LecturerEventController::class);
    Route::resource('user', LecturerUserController::class);
});

Route::group(['middleware' => 'student','prefix' => 'student', 'as' => 'student.'], function () {
    Route::resource('event', StudentEventController::class);
    Route::resource('user', StudentUserController::class);
    Route::resource('admin', StudentAdminController::class);
    Route::post('admin/join', [StudentAdminController::class, 'join'])->name('admin.join');
});

Route::group(['middleware' => 'admin','prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('student', StudentController::class);
    Route::resource('lecturer', LecturerController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('event', StaffEventController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
