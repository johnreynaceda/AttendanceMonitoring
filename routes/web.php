<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/attendance', function () {
    return view('attendance');
})->name('attendance');




Route::get('/dashboard', function () {
    if (auth()->user()->is_admin == true) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('employee.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


//ADMINISTRATOR routes
Route::prefix('administrator')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/employee-list', function () {
        return view('admin.employee-list');
    })->name('admin.employee-list');
    Route::get('/employee/add-employee', function () {
        return view('admin.employee.add');
    })->name('admin.employee-add');
    Route::get('/department', function () {
        return view('admin.department');
    })->name('admin.department');
    Route::get('/schedule', function () {
        return view('admin.schedule');
    })->name('admin.schedule');
    Route::get('/attendance', function () {
        return view('admin.attendance');
    })->name('admin.attendance');
    Route::get('/report', function () {
        return view('admin.report');
    })->name('admin.report');
    Route::get('/message', function () {
        return view('admin.message');
    })->name('admin.message');
});

//EMPLOYEE routes
Route::prefix('employee')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('employee.index');
    })->name('employee.dashboard');
    Route::get('/schedule', function () {
        return view('employee.schedule');
    })->name('employee.schedule');
    Route::get('/my-attendance', function () {
        return view('employee.my-attendance');
    })->name('employee.my-attendance');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';