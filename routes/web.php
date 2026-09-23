<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/classes', 'classes')->name('classes');
Route::view('/equipment', 'equipment')->name('equipment');
Route::view('/membership', 'membership')->name('membership');
Route::view('/contact', 'contact')->name('contact');

Route::post('/api/chatbot', [ChatbotController::class, 'ask'])->name('chatbot.ask');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
