<?php
// app/Http/Controllers/BookController.php
namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{


    public function index()
    {
        // Fetch books with pagination
        $books = Book::paginate(9); // Adjust the number of items per page as needed
        return view('book-shopping', compact('books'));
    }

// In BookController.php
public function viewbooks()
{
    // Fetch all books from the database
    $books = Book::all();

    // Pass the books data to the view
    return view('books.viewbooks', compact('books'));
}



    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'book_front_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'book_back_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $book = new Book($validatedData);

        if ($request->hasFile('book_front_img')) {
            $book->book_front_img = $request->file('book_front_img')->store('public/images');
        }

        if ($request->hasFile('book_back_img')) {
            $book->book_back_img = $request->file('book_back_img')->store('public/images');
        }

        $book->save();

        return redirect()->route('books.create')->with('success', 'Book added successfully!');
    }

    public function storeReview(Request $request, $bookId)
    {
        // Validate the input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        // Find the book
        $book = Book::findOrFail($bookId);

        // Store the comment
        if ($request->comment) {
            Comment::create([
                'user_id' => Auth::id(),
                'book_id' => $bookId,
                'comment' => $request->comment,
            ]);
        }

        // Update the book's rating
        $book->rating = $request->rating; // This could be updated to calculate the average rating if needed
        $book->save();

        // Redirect back with success message
        return back()->with('success', 'Your review has been submitted!');
    }
}
