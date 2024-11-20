<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Book;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        // Eager load the relationships to get the user and book data along with reviews
        $reviews = Review::with(['user', 'book'])->get();

        // Pass the reviews, user names, and book titles to the Blade view
        return view('reviews.index', compact('reviews'));
    }
}
