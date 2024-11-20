<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Preloader styles */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgb(246, 245, 245);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('images/loader-img.gif') }}" alt="Loading..." />
    </div>

    <!-- Navbar -->
    <header class="bg-green-600 text-white">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <!-- Logo -->
            <a href="#" class="text-2xl font-bold">Book Store</a>

            <!-- Navigation Links -->
            <nav class="space-x-4">
                <a href="#home" class="hover:underline">Home</a>
                <a href="#books" class="hover:underline">Books</a>
                <a href="#about" class="hover:underline">About</a>
                <a href="#contact" class="hover:underline">Contact</a>
            </nav>

            <!-- Login Button -->
            <div>
                <a href="{{ route('login') }}" class="bg-white text-green-600 font-medium px-4 py-2 rounded hover:bg-gray-200 transition-colors">
                    Login
                </a>
            </div>
        </div>
    </header>

    <!-- Banner Section -->
    <section id="home" class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('images/bookbg.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold mb-4">Welcome to Book Store</h1>
                <p class="text-lg mb-6">Discover your next favorite book with us.</p>
                <a href="#books" class="bg-green-600 hover:bg-greeb-700 text-white px-6 py-3 rounded font-medium">
                    Browse Books
                </a>
            </div>
        </div>
    </section>

    <!-- Books Section -->
    <section id="books" class="py-12">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Our Collection</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($books as $book)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="relative">
                            <div class="slider">
                                <img
                                    src="{{ $book->book_front_img ? Storage::url($book->book_front_img) : asset('images/default-front.jpg') }}"
                                    alt="Front of {{ $book->title }}"
                                    class="w-full h-64 object-cover">
                                <img
                                    src="{{ $book->book_back_img ? Storage::url($book->book_back_img) : asset('images/default-back.jpg') }}"
                                    alt="Back of {{ $book->title }}"
                                    class="w-full h-64 object-cover hidden">
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">{{ $book->title }}</h3>
                            <p class="text-gray-600 mb-2">by <span class="font-medium">{{ $book->author }}</span></p>
                            <p class="text-sm text-gray-700 mb-4">{{ Str::limit($book->description, 100, '...') }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-green-600">⭐ {{ $book->rating }}/5</span>
                                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors">
                                    <a href="{{ route('checkout', ['book' => $book->id]) }}" class="text-white">Check out</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $books->links('pagination::tailwind') }}
            </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sliders = document.querySelectorAll('.slider');
            sliders.forEach(slider => {
                let images = slider.querySelectorAll('img');
                let current = 0;

                // Toggle images every 2 seconds
                setInterval(() => {
                    images[current].classList.add('hidden');
                    current = (current + 1) % images.length;
                    images[current].classList.remove('hidden');
                }, 5000);
            });

            // Hide the preloader after a minimum of 3 seconds
            setTimeout(() => {
                document.querySelector('.preloader').style.display = 'none';
            }, 3000);  // Adjust this value to 3000 ms (3 seconds) or 4000 ms (4 seconds)
        });
    </script>


</body>
</html>
