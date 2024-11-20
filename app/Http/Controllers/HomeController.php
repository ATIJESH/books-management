<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the top 5 books, users, and reviews
        $books = Book::latest()->take(5)->get();
        $users = User::latest()->take(5)->get();
        $reviews = Review::latest()->take(5)->get();

        // Pass data to the view
        return view('home', compact('books', 'users', 'reviews'));
    }
}
