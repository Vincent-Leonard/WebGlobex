<?php

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

Route::resource('event', EventController::class);
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('student', StudentController::class);
    Route::resource('lecturer', LecturerController::class);
    Route::resource('event', EventController::class);
    Route::resource('staff', StaffController::class);
});
Route::group(['middleware' => 'lecturer','prefix' => 'lecturer', 'as' => 'lecturer.'], function () {
    Route::resource('lecturer', LecturerController::class);
    Route::resource('event', EventController::class);

    Route::post('guests/{id}/approve', [CreatorGuestController::class, 'approve'])->name('guests.approve');
    Route::post('guests/{id}/decline', [CreatorGuestController::class, 'decline'])->name('guests.decline');
});
Route::group(['middleware' => 'student','prefix' => 'student', 'as' => 'student.'], function () {
    Route::resource('student', StudentController::class);
    Route::resource('event', EventController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
