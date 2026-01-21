<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::livewire('/admin/login', 'pages::admin.auth.login')
    // ->middleware('guest')
    ->name('admin.login');

Route::livewire('/admin/forgot-password', 'pages::admin.auth.forgot-password')
    ->name('admin.forgot-password');
