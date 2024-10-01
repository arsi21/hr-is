<?php

use Livewire\Volt\Volt;
use App\Models\Employee;
use App\Livewire\Employees;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::view('employees', 'employees.index')
    ->middleware(['auth'])
    ->name('employees.index');

Route::view('employees/create', 'employees.create')
    ->middleware(['auth'])
    ->name('employees.create');

Route::view('employees/{employee}/edit', 'employees.edit')
    ->middleware(['auth'])
    ->name('employees.edit');

Route::get('api/departments', [DepartmentController::class, 'apiIndex'])->name('api.department.index');


// Volt::route('employees/{employee}/edit', 'employees.edit')
//     ->middleware(['auth'])
//     ->name('employees.edit');

// Route::get('employees/{employee}/edit', function ($employee) {
//     // dd($employee);
//     return view('employees.edit', ['employee' => $employee]);
// })
//     ->middleware(['auth'])
//     ->name('employees.edit');

require __DIR__.'/auth.php';
