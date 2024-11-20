<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

    <!-- Main Container -->
    <div class="flex min-h-screen">
        <!-- Sidebar Section -->
        <aside class="bg-gray-800 text-white w-64 p-6">
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-extrabold">Dashboard</h1>
                <p class="text-sm text-gray-400 mt-2">Welcome back!</p>
            </div>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded-md text-gray-300 hover:text-white hover:bg-gray-700">
                            Home
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('books.create') }}" class="block py-2 px-4 rounded-md text-gray-300 hover:text-white hover:bg-gray-700">
                            Add Books
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('books.viewbooks') }}" class="block py-2 px-4 rounded-md text-gray-300 hover:text-white hover:bg-gray-700">
                            View Books
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('reviews.index') }}" class="block py-2 px-4 rounded-md text-gray-300 hover:text-white hover:bg-gray-700">
                            Rating & Comments
                        </a>
                    </li>

                    <li class="mt-8">
                        <a href="{{ route('logout') }}" class="block py-2 px-4 rounded-md text-gray-300 hover:text-white hover:bg-red-600"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 bg-white shadow-md rounded-md m-6 p-8">
            <div class="border-b pb-4 mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Welcome to the Dashboard</h2>
                <p class="text-gray-600 mt-2">Manage your application settings and features.</p>
            </div>

            <!-- Page Content Yield -->
            @yield('content')
        </main>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

</body>
</html>
