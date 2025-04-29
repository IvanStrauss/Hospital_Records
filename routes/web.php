<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\Doctor\DoctorAppointmentController;
use App\Http\Controllers\Doctor\DoctorPatientController;




Route::get('/', function () {
    return view('auth.login');
});

Route::get('/layouts/doctor', function () {
    return view('layouts.doctor');
});

Route::get('/admin/dashboard', function () {
    return view('dashboards.admin');
});

Route::get('/admin/dashboard', function () {
    return view('dashboards.admin');
})->name('admin.dashboard');


Route::get('/admin/manage-doctors', function () {
    return view('admin.doctors.index');
})->name('admin.index.doctors');

Route::get('/admin/manage-patients', function () {
    return view('manage_patients.admin');
})->name('admin.manage_patients');

Route::get('/admin/manage-appointments', function () {
    return view('apointments.admin');
})->name('admin.manage_appointments');

Route::get('/admin/user-management', function () {
    return view('admin.user_management');
})->name('admin.user_management');

//logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::view('/login', 'auth.login')->name('login');


// Show Login Page (GET)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Handle Login Form Submit (POST)
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Redirect based on role
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role === 'doctor') {
            return redirect()->route('doctor.dashboard');
        } elseif (Auth::user()->role === 'patient') {
            return redirect()->route('patient.dashboard');
        }

        // Default fallback
        return redirect('/admin/dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials. Please try again.',
    ]);
});

//DashboardController
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('/admin/doctors', DoctorController::class);

Route::resource('/admin/manage-doctors', DoctorController::class, [
    'names' => [
        'index' => 'admin.manage_doctors.index',
        'create' => 'admin.manage_doctors.create',
        'store' => 'admin.manage_doctors.store',
        'edit' => 'admin.manage_doctors.edit',
        'update' => 'admin.manage_doctors.update',
        'destroy' => 'admin.manage_doctors.destroy',
    ]
]);

//Patient Controller
Route::resource('/admin/manage-patients', PatientController::class, [
    'names' => [
        'index' => 'admin.manage_patients.index',
        'create' => 'admin.manage_patients.create',
        'store' => 'admin.manage_patients.store',
        'edit' => 'admin.manage_patients.edit',
        'update' => 'admin.manage_patients.update',
        'destroy' => 'admin.manage_patients.destroy',
    ]
]);

//Appointment Controller
Route::resource('/admin/manage-appointments', AppointmentController::class, [
    'names' => [
        'index' => 'admin.manage_appointments.index',
        'create' => 'admin.manage_appointments.create',
        'store' => 'admin.manage_appointments.store',
        'edit' => 'admin.manage_appointments.edit',
        'update' => 'admin.manage_appointments.update',
        'destroy' => 'admin.manage_appointments.destroy',
    ]
]);

//user management
Route::resource('/admin/user-management', UserController::class, [
    'names' => [
        'index' => 'admin.user_management.index',
        'create' => 'admin.user_management.create',
        'store' => 'admin.user_management.store',
        'edit' => 'admin.user_management.edit',
        'update' => 'admin.user_management.update',
        'destroy' => 'admin.user_management.destroy',
    ]
]);

//doctor routing
Route::prefix('doctor')->name('doctor.')->middleware('auth', 'role:doctor')->group(function () {
    Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/appointments', [DoctorAppointmentController::class, 'index'])->name('my_appointments');
    Route::get('/patients', [DoctorPatientController::class, 'index'])->name('patient_records');
    Route::get('/confirm-appointments', [DoctorAppointmentController::class, 'confirm'])->name('confirm_appointments');
});

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// (Your admin routes and doctor routes here...)

Route::prefix('doctor')->name('doctor.')->middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('doctor')->name('doctor.')->middleware(['auth', 'role:doctor'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});








