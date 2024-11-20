<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management Login</title>
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
            <h2 class="text-3xl font-bold text-gray-800">Welcome to the Book Management System</h2>
            <p class="text-gray-600 mt-2">Please log in to manage books, ratings, and reviews.</p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="/login">
            <!-- CSRF Token for security (Laravel) -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Session Status -->
            <div class="mb-4">
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <label for="email" class="block text-gray-700 font-semibold">Email Address</label>
                <input id="email" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="email" name="email" required autofocus autocomplete="username" value="{{ old('email') }}">
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
                <input id="password" class="block mt-1 w-full p-2 border border-gray-300 rounded-md" type="password" name="password" required autocomplete="current-password">
                <div class="text-red-500 mt-2">
                    <!-- Error messages for password (if any) -->
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <!-- Forgot Password and Login Button -->
            <div class="flex items-center   mt-6">
                {{-- <div class="flex justify-start">
                    <a href="/password/request" class="underline text-sm text-gray-600 hover:text-gray-900">Forgot your password?</a>
                </div> --}}
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Log in</button>
            </div>
        </form>

        <!-- Footer or Additional Information -->
        <div class="text-center mt-8">
            <p class="text-sm text-gray-600">New to Book Management? <a href="/register" class="text-indigo-600 hover:text-indigo-700">Create an account</a></p>
        </div>

    </div>

</body>
</html>
