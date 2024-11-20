@extends('dashboard')

@section('content')
    <div class="max-w-7xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-blue-600 text-white text-center py-4">
            <h2 class="text-3xl font-semibold">All Reviews</h2>
        </div>

        <div class="p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($reviews->isEmpty())
                <p class="text-gray-500">No reviews available at the moment.</p>
            @else
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                        <thead class="bg-gray-100 text-left">
                            <tr>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Sr. No.</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Book Title</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">User Name</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Rating</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Comment</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-700">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $index => $review)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4 text-sm text-gray-800">{{ $index + 1 }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-600">{{ $review->book->title }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-600">{{ $review->user->name }}</td>
                                    <td class="py-3 px-4 text-sm text-yellow-500">{{ $review->rating }} / 5</td>
                                    <td class="py-3 px-4 text-sm text-gray-600">{{ Str::limit($review->comment, 100) }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-600">{{ $review->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
