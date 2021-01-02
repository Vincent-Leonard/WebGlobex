<?php

use App\http\controllers\EventController;
use App\http\controllers\LecturerController;
use App\http\controllers\StaffController;
use App\http\controllers\StudentController;

use App\http\controllers\staff\EventController as StaffEventController;
use App\http\controllers\staff\LecturerController as StaffLecturerController;
use App\http\controllers\staff\StaffController as StaffStaffController;
use App\http\controllers\staff\StudentController as StaffStudentController;

use App\http\controllers\Lecturer\EventController as LecturerEventController;
use App\http\controllers\lecturer\LecturerController as LecturerLecturerController;
use App\http\controllers\lecturer\StaffController as LecturerStaffController;
use App\http\controllers\lecturer\StudentController as LecturerStudentController;

use App\http\controllers\student\EventController as StudentEventController;
use App\http\controllers\student\LecturerController as StudentLecturerController;
use App\http\controllers\student\StaffController as StudentStaffController;
use App\http\controllers\student\StudentController as StudentStudentController;

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
    return view('welcome');
});

// Route::resource('event', EventController::class);
// Route::resource('student', StudentController::class);
// Route::resource('lecturer', LecturerController::class);
// Route::resource('staff', StaffController::class);
Route::resource('user', UserController::class);

Route::post('event/approve', [EventController::class, 'approve'])->name('event.approve');
Route::post('event/reject', [EventController::class, 'reject'])->name('event.reject');
Route::post('event/revise', [EventController::class, 'revise'])->name('event.revise');

Route::group(['middleware' => 'staff', 'prefix' => 'staff', 'as' => 'staff.'], function () {
    Route::resource('event', StaffEventController::class);
});

Route::group(['middleware' => 'lecturer','prefix' => 'lecturer', 'as' => 'lecturer.'], function () {
    Route::resource('event', LecturerEventController::class);
    Route::post('profile', [LecturerLecturerController::class, 'profile'])->name('lecturer.profile');
});

Route::group(['middleware' => 'student','prefix' => 'student', 'as' => 'student.'], function () {
    Route::resource('event', StudentEventController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
