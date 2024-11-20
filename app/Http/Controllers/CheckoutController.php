<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show(Book $book)
    {
        return view('checkout', compact('book'));
    }

    // Handle review submission
    public function submitReview(Request $request, Book $book)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to login page with a message
            return redirect()->route('login')->with('error', 'You must be logged in to submit a review.');
        }

        // Validate the review data
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Save the review
        Review::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        // Redirect back to the checkout page with success message
        return redirect()->route('checkout', ['book' => $book->id])
                         ->with('success', 'Your review has been submitted successfully!');
    }
}
