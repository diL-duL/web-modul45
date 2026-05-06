<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MajorsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\View\View;
                                                                                                            
Route::get('/', action: function (): View {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

    Route::get('/majors', [MajorsController::class, 'index'])->name('majors.index');
    Route::get('/majors/create', [MajorsController::class, 'create'])->name('majors.create');
    Route::post('/majors', [MajorsController::class, 'store'])->name('majors.store');
    Route::get('/majors/{id}', [MajorsController::class, 'show'])->name('majors.show');
    Route::get('/majors/{id}/edit', [MajorsController::class, 'edit'])->name('majors.edit');
    Route::put('/majors/{id}', [MajorsController::class, 'update'])->name('majors.update');
    Route::delete('/majors/{id}', [MajorsController::class, 'destroy'])->name('majors.destroy');
});


        // modul 5

// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\StudentController;
// use App\Http\Controllers\MajorsController;
// use Illuminate\Contracts\View\View;
// use Illuminate\Support\Facades\Route;

// Route::get('/', action: function (): View {
//     return view('welcome');
// });

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::prefix('students')->group(function () {
//     Route::get('', [StudentController::class, 'index'])->name('students.index');
//     Route::get('/create', [StudentController::class, 'create'])->name('students.create');
//     Route::post('', [StudentController::class, 'store'])->name('students.store');
//     Route::get('/{id}', [StudentController::class, 'show'])->name('students.show');
//     Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
//     Route::put('/{id}', [StudentController::class, 'update'])->name('students.update');
//     Route::delete('/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
// });

// Route::prefix('majors')->group(function () {
//     Route::get('', [MajorsController::class, 'index'])->name('majors.index');
//     Route::get('/create', [MajorsController::class, 'create'])->name('majors.create');
//     Route::post('', [MajorsController::class, 'store'])->name('majors.store');
//     Route::get('/{id}', [MajorsController::class, 'show'])->name('majors.show');
//     Route::get('/{id}/edit', [MajorsController::class, 'edit'])->name('majors.edit');
//     Route::put('/{id}', [MajorsController::class, 'update'])->name('majors.update');
//     Route::delete('/{id}', [MajorsController::class, 'destroy'])->name('majors.destroy');
// });


        // modul 4
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\StudentController;
// use Illuminate\Contracts\View\View;
// use Illuminate\Support\Facades\Route;

// Route::get('/', action: function (): View {
//     return view('welcome');
// });

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::prefix('students')->group(function () {
//     Route::get('/', [StudentController::class, 'index'])->name('students.index');
//     Route::get('/create', [StudentController::class, 'create'])->name('students.create');
//     Route::get('/{id}', [StudentController::class, 'show'])->name('students.show');
//     Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
// });


        // modul 3
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\StudentController;
// use App\Http\Controllers\CalculatorController;
// use Illuminate\View\View;

// Route::get(uri: '/', action: function (): View {
//     return view('welcome');
// });

// Basic route
// Route::get(uri: '/students', action: function (): string {
//     return 'Students data...';
// });

// Redirect route
// Route::redirect(uri: '/redirect', destination: '/students');

// Named route
// Route::get(uri: '/students/create', action: function (): string {
//     return 'Create student data';
// })->name('students.create');

// Route with parameter
// Route::get(uri: '/students/{id}', action: function ($id): string {
//     return 'Student ID: ' . $id;
// });

// Route with parameter and optional parameter


// Menggunakan Route Group dengan Prefix 'students'
// Route::prefix('students')->group(function () {
//     Route::get('/',[StudentController::class, 'index']);
//     Route::get('/create',[StudentController::class, 'create'])->name('students.create');
//     Route::get('/{id}',[StudentController::class, 'show']);
// });

// Route::get(uri: '/hitung/{angka1}/{angka2}/{operasi}', action: [CalculatorController::class, 'calc']);