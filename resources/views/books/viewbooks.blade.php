@extends('dashboard')

@section('content')
    <div class="max-w-7xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-blue-600 text-white text-center py-4">
            <h2 class="text-3xl font-semibold">All Books</h2>
        </div>

        <div class="p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($books->isEmpty())
                <p class="text-gray-500">No books available at the moment.</p>
            @else
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                        <thead class="bg-gray-100 text-left">
                            <tr>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Sr. No.</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Title</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Author</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Description</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Rating</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Front Image</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Back Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4 text-sm text-gray-800">{{ $loop->iteration }}</td> 
                                    <td class="py-3 px-4 text-sm text-gray-800">{{ $book->title }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-600">{{ $book->author }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-600">{{ Str::limit($book->description, 100) }}</td>
                                    <td class="py-3 px-4 text-sm text-yellow-500">{{ $book->rating }} / 5</td>
                                    <td class="py-3 px-4 text-sm">
                                        @if($book->book_front_img)
                                            <img src="{{ Storage::url($book->book_front_img) }}" class="w-20 h-20 object-cover rounded-md mx-auto">
                                        @else
                                            <span class="text-gray-400">No Image</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-sm">
                                        @if($book->book_back_img)
                                            <img src="{{ Storage::url($book->book_back_img) }}" alt="Back Image" class="w-20 h-20 object-cover rounded-md mx-auto">
                                        @else
                                            <span class="text-gray-400">No Image</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
