<?php

use App\http\controllers\IndividualEventController;
use App\http\controllers\GroupEventController;
use App\http\controllers\LecturerController;
use App\http\controllers\StaffController;
use App\http\controllers\StudentController;
use App\http\controllers\ApproveJoinController;

use App\http\controllers\staff\UserController as StaffUserController;

use App\http\controllers\lecturer\EventController as LecturerEventController;
use App\http\controllers\lecturer\UserController as LecturerUserController;
use App\http\controllers\lecturer\JoinEventController as LecturerJoinEventController;

use App\http\controllers\student\EventController as StudentEventController;
use App\http\controllers\student\UserController as StudentUserController;
use App\http\controllers\student\JoinEventController as StudentJoinEventController;

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

Route::group(['middleware' => 'staff', 'prefix' => 'staff', 'as' => 'staff.'], function () {
    Route::resource('user', StaffUserController::class);
});

Route::group(['middleware' => 'lecturer','prefix' => 'lecturer', 'as' => 'lecturer.'], function () {
    Route::resource('event', LecturerEventController::class);
    Route::resource('user', LecturerUserController::class);
    Route::resource('join', LecturerJoinEventController::class);
    Route::post('join/group', [LecturerJoinEventController::class, 'join'])->name('join.group');
});

Route::group(['middleware' => 'student','prefix' => 'student', 'as' => 'student.'], function () {
    Route::resource('event', StudentEventController::class);
    Route::resource('user', StudentUserController::class);
    Route::resource('join', StudentJoinEventController::class);
    Route::post('join/group', [StudentJoinEventController::class, 'join'])->name('join.group');
});

Route::group(['middleware' => 'admin','prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('student', StudentController::class);
    Route::resource('lecturer', LecturerController::class);
    Route::resource('staff', StaffController::class);

    Route::resource('individual', IndividualEventController::class);
    Route::post('individual/approve', [IndividualEventController::class, 'approve'])->name('individual.approve');
    Route::post('individual/reject', [IndividualEventController::class, 'reject'])->name('individual.reject');
    Route::post('individual/revise', [IndividualEventController::class, 'revise'])->name('individual.revise');

    Route::resource('group', GroupEventController::class);
    Route::post('group/open', [GroupEventController::class, 'open'])->name('group.open');
    Route::post('group/close', [GroupEventController::class, 'close'])->name('group.close');

    Route::resource('join', ApproveJoinController::class);
    Route::post('join/{id}/acceptStudent', [ApproveJoinController::class, 'acceptStudent'])->name('event.acceptStudent');
    Route::post('join/{id}/rejectStudent', [ApproveJoinController::class, 'rejectStudent'])->name('event.rejectStudent');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
