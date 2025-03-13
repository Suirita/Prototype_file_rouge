@extends('layouts.public')

@section('content')
<div class="container mx-auto my-12 px-6">

    <!-- Header -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-900">Article Details</h1>
    </div>

    <!-- Article Card -->
    <div class="bg-white shadow-xl rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
        <!-- Article Image -->
        <img class="w-full h-80 object-cover rounded-t-lg transform transition-transform duration-300 hover:scale-105"
            src="{{ $article->image_url ?: 'https://ui-avatars.com/api/?name=' . urlencode($article->title) . '&background=random&color=fff&bold=true&size=300&length=2' }}" 
            alt="{{ $article->title }}">

        <div class="p-8 space-y-4">

            <!-- Article Title -->
            <h2 class="text-3xl font-semibold text-gray-900">{{ $article->title }}</h2>

            <!-- Author and Metadata -->
            <div class="flex flex-wrap gap-4 mb-6 text-sm text-gray-600">
                <p>By <span class="font-medium text-gray-800">{{ $article->user->name }}</span></p>
                <p>Published on <span>{{ $article->created_at->format('F j, Y') }}</span></p>
                <p>Category: 
                    <span class="inline-block bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 text-white text-xs font-semibold rounded-full px-3 py-1">
                        {{ $article->category->name }}
                    </span>
                </p>
            </div>

            <!-- Article Content -->
            <div class="text-lg text-gray-800 leading-relaxed">
                {{ $article->content }}
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="bg-gray-50 shadow-lg rounded-lg p-8 mt-12">
        <h3 class="text-2xl font-semibold text-gray-900 mb-6">Comments</h3>

        <!-- Display Comments -->
        @if ($article->comments->isEmpty())
            <p class="text-gray-600 mt-4">No comments yet. Be the first to comment!</p>
        @else
            <div class="mt-6 space-y-6">
                @foreach ($article->comments as $comment)
                    <div class="flex space-x-4 border-b border-gray-300 pb-4">
                        <!-- User Avatar -->
                        <img class="w-14 h-14 rounded-full object-cover" 
                            src="{{ $comment->user->profile_picture ?? 'https://ui-avatars.com/api/?name=' . urlencode($comment->user->name) . '&background=random&color=fff&bold=true&size=400&length=2' }}" 
                            alt="{{ $comment->user->name }}">

                        <div class="flex-1">
                            <!-- User Name and Timestamp -->
                            <div class="flex justify-between items-center">
                                <p class="font-medium text-gray-800">{{ $comment->user->name }}</p>
                                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>

                            <!-- Comment Content -->
                            <p class="mt-2 text-gray-700">{{ $comment->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Add Comment Form -->
        <form action="{{ route('public.article.comments.store', $article->id) }}" id="comment-form" method="POST" class="mt-8">
            @csrf
            <textarea name="content" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 transition-all" placeholder="Write your comment..." required></textarea>

            <button type="submit" class="mt-4 w-full px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                Add Comment
            </button>
        </form>
    </div>

    <!-- Back to Articles Button -->
    <div class="mt-12 text-center">
        <a href="{{ route('public.public.index') }}" class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all inline-block">
            Back to Articles
        </a>
    </div>
</div>
@endsection
