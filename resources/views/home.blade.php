@extends('dashboard')

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Top 5 Books, Users, and Reviews</h1>

    <!-- Top Books Card -->
    <div class="mb-6 p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Top Books</h2>
        <ul class="list-disc pl-5 text-gray-600">
            @foreach($books as $book)
                <li class="mb-2">{{ $book->title }} by <span class="font-semibold">{{ $book->author }}</span></li>
            @endforeach
        </ul>
    </div>

    <!-- Top Users Card -->
    <div class="mb-6 p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Top Users</h2>
        <ul class="list-disc pl-5 text-gray-600">
            @foreach($users as $user)
                <li class="mb-2">{{ $user->name }} <span class="text-gray-500">({{ $user->email }})</span></li>
            @endforeach
        </ul>
    </div>

    <!-- Top Reviews Card -->
    <div class="p-6 bg-white rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Top Reviews</h2>
        <ul class="list-disc pl-5 text-gray-600">
            @foreach($reviews as $review)
                <li class="mb-2">"{{ $review->content }}" - <span class="font-semibold">{{ $review->user->name }}</span></li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
