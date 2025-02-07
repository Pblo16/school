<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Professors\View as Professors;
use App\Livewire\Students\View as Students;
use App\Livewire\Subject\View as Subject;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/professors/{action?}', Professors::class)
        ->name('professors');
    Route::get('/students/{action?}', Students::class)
        ->name('students');
    Route::get('/subject/{action?}', Subject::class)
        ->name('subject');
});
