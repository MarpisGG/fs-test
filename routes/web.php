<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\blogController;


// Auth
Route::post('/api/login', [AuthController::class, 'login']);
Route::post('/api/logout', [AuthController::class, 'logout']);


// Blog
Route::get('/api/blog', [BlogController::class, 'index']); // Get all blog posts
Route::post('/api/blog', [BlogController::class, 'store']); // Create a new blog post
Route::delete('/api/blog/{id}', [BlogController::class, 'destroy']); // Delete blog post
Route::put('/api/blog/{id}', [BlogController::class, 'update']); // Update blog post using PUT 
Route::post('/api/blog/{id}', [BlogController::class, 'update']); // Add this route to handle form POST with _method=PUT
Route::get('/api/blog/{slug}', [blogController::class, 'show']); // Menampilkan pesan berdasarkan slug


Route::get('/', function () {
    return view('welcome');
});

Route::get('/{pathMatch}', function () {
    return view('welcome');
})->where('pathMatch', '.*');