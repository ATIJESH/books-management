<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\HomeController;

// Root route
Route::get('/', function () {
    return redirect('/login'); // Redirect root to login page
});

// Login Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/dashboard', function () {
    // Check if the authenticated user is an admin
    if (Auth::check() && Auth::user()->role === 'admin') {
        // Redirect to the home route if the user is an admin
        return redirect()->route('home', [], 301); // Permanent redirect to home
    } else {
        // Redirect to the shop route if the user is not an admin
        return redirect()->route('book.shop');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [BookController::class, 'index'])->name('book.shop');
// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Book Routes

    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/view', [BookController::class, 'viewBooks'])->name('books.viewbooks');
    Route::post('/books/{book}/review', [BookController::class, 'storeReview'])->name('book.storeReview');

    // Comment Routes
    Route::post('/comments/{book}', [CommentController::class, 'store'])->name('comments.store');

    // Checkout Routes
    Route::get('/checkout/{book}', [CheckoutController::class, 'show'])->name('checkout');
    Route::post('/checkout/{book}/review', [CheckoutController::class, 'submitReview'])->name('checkout.submit');

    // Reviews and Ratings
    Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews.index');
});

// Load Auth Routes
require __DIR__.'/auth.php';
