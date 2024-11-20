@extends('dashboard')

@section('content')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-blue-600 text-white text-center py-4">
            <h2 class="text-3xl font-semibold">Add a New Book</h2>
        </div>

        <div class="p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Book Title -->
                <div>
                    <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter book title"
                        required>
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Author -->
                <div>
                    <label for="author" class="block text-lg font-medium text-gray-700">Author</label>
                    <input
                        type="text"
                        id="author"
                        name="author"
                        value="{{ old('author') }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter author name"
                        required>
                    @error('author')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write a brief description">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Rating -->
                <div>
                    <label for="rating" class="block text-lg font-medium text-gray-700">Rating</label>
                    <select
                        id="rating"
                        name="rating"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="">Select Rating</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    @error('rating')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Book Front Image -->
                <div>
                    <label for="book_front_img" class="block text-lg font-medium text-gray-700">Front Image</label>
                    <input
                        type="file"
                        id="book_front_img"
                        name="book_front_img"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg">
                    @error('book_front_img')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Book Back Image -->
                <div>
                    <label for="book_back_img" class="block text-lg font-medium text-gray-700">Back Image</label>
                    <input
                        type="file"
                        id="book_back_img"
                        name="book_back_img"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg">
                    @error('book_back_img')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        class="w-full bg-green-600 text-green py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">
                        Add Book
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
