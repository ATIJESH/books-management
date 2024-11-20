<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management Register</title>
    <!-- Link to Tailwind CSS for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Main Container -->
    <div class="max-w-md mx-auto my-10 p-8 bg-white rounded-lg shadow-lg">
        <!-- Book Management Logo -->
        <div class="text-center mb-8">
            <img src="images/book-logo.jpg" alt="Book Management" class="mx-auto mb-4" width="120">
            <h2 class="text-3xl font-bold text-gray-800">Create Your Account</h2>
            <p class="text-gray-600 mt-2">Please register to manage books, ratings, and reviews.</p>
        </div>

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}">
            <!-- CSRF Token for security (Laravel) -->
            @csrf

            <!-- Name -->
            <div class="mt-6">
                <label for="name" class="block text-gray-700 font-semibold">Name</label>
                <input id="name" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="text" name="name" required autofocus autocomplete="name" value="{{ old('name') }}">
                <div class="text-red-500 mt-2">
                    <!-- Error messages for name (if any) -->
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <label for="email" class="block text-gray-700 font-semibold">Email Address</label>
                <input id="email" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="email" name="email" required autocomplete="username" value="{{ old('email') }}">
                <div class="text-red-500 mt-2">
                    <!-- Error messages for email (if any) -->
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input id="password" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="password" name="password" required autocomplete="new-password">
                <div class="text-red-500 mt-2">
                    <!-- Error messages for password (if any) -->
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-gray-700 font-semibold">Confirm Password</label>
                <input id="password_confirmation" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="password" name="password_confirmation" required autocomplete="new-password">
                <div class="text-red-500 mt-2">
                    <!-- Error messages for password confirmation (if any) -->
                    @error('password_confirmation')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Register Button -->
            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Register</button>
            </div>
        </form>

        <!-- Footer or Additional Information -->
        <div class="text-center mt-8">
            <p class="text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700">Login here</a></p>
        </div>

    </div>

</body>
</html>
