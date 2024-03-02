<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PmsteacherController;
use App\Http\Controllers\PresentController;
use App\Http\Controllers\PresteacherController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SessionController::class, 'index'])->name('login');
    Route::post('/login', [SessionController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function(){
        return redirect('/');
    });
    Route::get('/', [DashboardController::class, 'admin'])->name('dashboard')->middleware('userAkses:admin');
    Route::get('/presteacher', [DashboardController::class, 'guru'])->middleware('userAkses:guru');
    Route::get('presteacher/exportasdqwezxc', [PresteacherController::class, 'export'])->middleware('userAkses:guru');



    Route::resource('teacher', TeacherController::class)->middleware('userAkses:admin');
    Route::resource('subject', SubjectController::class)->middleware('userAkses:admin');
    Route::resource('present', PresentController::class)->middleware('userAkses:admin');
    Route::resource('permission', PermissionController::class)->middleware('userAkses:admin');
    Route::get('present/export/excel', [PresentController::class, 'exportpresent'])->middleware('userAkses:admin');
    Route::get('teacher/export/excel/{id}', [TeacherController::class, 'export'])->middleware('userAkses:admin');

    Route::resource('presteacher', PresteacherController::class)->middleware('userAkses:guru');
    Route::Resource('pmsteacher', PmsteacherController::class)->middleware('userAkses:guru');

    Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
});

// Route::get('/', function () {
    //     return view('dashboard.teacher');
    // })->name('teacher');



