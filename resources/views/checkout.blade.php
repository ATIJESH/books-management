<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <header class="bg-green-600 text-white">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <a href="#" class="text-2xl font-bold">Book Store</a>
            <nav class="space-x-4">
                <a href="" class="hover:underline">Home</a>
                <a href="#books" class="hover:underline">Books</a>
                <a href="#about" class="hover:underline">About</a>
                <a href="#contact" class="hover:underline">Contact</a>
            </nav>
        </div>
    </header>


    <section id="checkout" class="py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Checkout - {{ $book->title }}</h2>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <!-- Book Image & Details -->
                <div class="w-full md:w-1/2 bg-white shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ $book->book_front_img ? Storage::url($book->book_front_img) : asset('images/default-front.jpg') }}"
                         alt="Front of {{ $book->title }}" class="w-full h-96 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $book->title }}</h3>
                        <p class="text-gray-600 mb-2">by <span class="font-medium">{{ $book->author }}</span></p>
                        <p class="text-sm text-gray-700 mb-4">{{ $book->description }}</p>
                        <span class="text-lg font-bold text-green-600">⭐ {{ $book->rating }}/5</span>
                    </div>
                </div>

                <!-- Rating & Comment Form -->
                <div class="w-full md:w-1/3 bg-white shadow-lg rounded-lg p-6">
                    <h4 class="text-2xl font-semibold mb-4">Leave a Review</h4>

                    <!-- Check if user is authenticated -->
                    @auth
                        <form action="{{ route('checkout.submit', ['book' => $book->id]) }}" method="POST">
                            @csrf
                            <!-- Rating -->
                            <div class="mb-4">
                                <label for="rating" class="block text-lg font-medium mb-2">Rating</label>
                                <select name="rating" id="rating" class="w-full p-2 border rounded-md">
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                </select>
                                @error('rating')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Comment -->
                            <div class="mb-4">
                                <label for="comment" class="block text-lg font-medium mb-2">Comment</label>
                                <textarea name="comment" id="comment" rows="4" class="w-full p-2 border rounded-md"
                                          placeholder="Write your comment here..."></textarea>
                                @error('comment')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                                Submit Review
                            </button>
                        </form>
                    @else
                        <!-- Show login/register prompt -->
                        <p class="text-gray-700">
                            You must <a href="{{ route('login') }}" class="text-green-600 hover:underline">log in</a> or
                            <a href="{{ route('register') }}" class="text-green-600 hover:underline">register</a> to leave a review.
                        </p>
                    @endauth
                </div>
            </div>

            @if(session('success'))
                <div class="mt-6 text-center text-green-600 font-medium">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="bg-gray-200 py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">About Us</h2>
            <p class="text-lg text-gray-700">We are passionate about books and bringing stories to life. Explore a wide range of genres and find the perfect book for you.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Book Store. All rights reserved.</p>
            <p class="mt-2">Contact us at: <a href="mailto:info@bookstore.com" class="underline">info@bookstore.com</a></p>
        </div>
    </footer>



</body>
</html>
