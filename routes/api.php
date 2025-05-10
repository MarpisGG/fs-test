<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;


Route ::post ('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/blog', [blogController::class, 'index']); // Menampilkan semua pesan
Route::post('/blog', [blogController::class, 'store']); // Mengirim pesan
Route::get('/blog/{id}', [blogController::class, 'show']); // Menampilkan pesan berdasarkan ID
Route::delete('/blog/{id}', [blogController::class, 'destroy']);
Route::put('/blog/{id}', [blogController::class, 'update']); // Mengupdate pesan berdasarkan ID
Route::get('/blogs/{slug}', [BlogController::class, 'showBySlug']);