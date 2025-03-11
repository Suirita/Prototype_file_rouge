@extends('layouts.public')

@section('content')

<!-- Page Header -->
<div class="bg-gray-200 py-10">
    <h1 class="text-4xl font-bold text-center text-gray-800">
        Latest Articles
    </h1>
</div>
<!-- Filter Section -->
<div class="bg-gradient-to-r from-blue-50 via-white to-blue-50 shadow-lg rounded-lg p-8 mx-6 my-6">
    <form action="{{ route('public.public.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
        <!-- Category Filter -->
        <div class="flex flex-col">
            <label for="category" class="text-sm font-medium text-gray-700 mb-2">Category</label>
            <select name="category" id="category" 
                class="border border-gray-300 rounded-lg shadow-sm focus:ring-blue-400 focus:border-blue-400 transition ease-in-out duration-200 bg-white py-2 px-3">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    @if(request('category') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <!-- Search Input -->
        <div class="flex flex-col">
            <label for="search" class="text-sm font-medium text-gray-700 mb-2">Search</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" 
                placeholder="Search articles..."
                class="border border-gray-300 rounded-lg shadow-sm focus:ring-blue-400 focus:border-blue-400 transition ease-in-out duration-200 bg-white py-2 px-3">
        </div>

        <!-- Filter Button -->
        <div class="flex">
            <button type="submit" 
                class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-lg shadow-md px-6 py-3 hover:from-blue-600 hover:to-purple-600 transition duration-200">
                Apply Filter
            </button>
        </div>
    </form>
</div>

<!-- Articles Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 py-10 px-6">
    @forelse ($articles as $article)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:-translate-y-2 hover:shadow-2xl duration-300">
            <!-- Article Image -->
            <a href="{{ route('public.public.show', $article->id) }}">
                <img 
                    class="w-full h-56 object-cover rounded-lg transition duration-300 ease-in-out transform hover:scale-105"
                    src="{{ $article->image_url ?: 'https://ui-avatars.com/api/?name=' . urlencode($article->title) . '&background=random&color=fff&bold=true&size=400&length=2' }}" 
                    alt="{{ $article->title }}">
            </a>
            
            <!-- Article Content -->
            <div class="p-6">
                <!-- Category -->
                @if(!empty($article->category))
                    <span class="inline-block bg-purple-100 text-purple-600 text-xs font-semibold rounded-full px-3 py-1 mb-3">
                        {{ $article->category->name }}
                    </span>
                @endif

                <!-- Article Title -->
                <a href="{{ route('public.public.show', $article->id) }}" class="block text-2xl font-semibold text-gray-800 hover:text-purple-600 transition-colors duration-300">
                    {{ $article->title }}
                </a>

                <!-- Content Preview -->
                <p class="text-gray-600 mt-3 line-clamp-3">
                    {{ Str::limit($article->content, 100, '...') }}
                </p>
            </div>

            <!-- Footer Section -->
            <div class="bg-gray-100 px-6 py-4 flex justify-between items-center">
                <!-- Tags -->
                @if($article->tags->isNotEmpty())
                    <div class="flex flex-wrap gap-2">
                        @foreach ($article->tags as $tag)
                            <span class="text-xs bg-blue-100 text-blue-600 font-semibold px-2.5 py-0.5 rounded">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <!-- Author Info -->
                <div class="flex items-center">
                    <img 
                        class="w-10 h-10 rounded-full object-cover border-2 border-gray-200" 
                        src="{{ $article->user->profile_picture ?: 'https://ui-avatars.com/api/?name=' . urlencode($article->user->name) . '&background=random&color=fff&bold=true&rounded=true&size=400&length=2' }}" 
                        alt="{{ $article->user->name }}">
                    <p class="ml-2 text-sm font-medium text-gray-700">
                        {{ $article->user->name }}
                    </p>
                </div>
            </div>
        </div>
    @empty
        <!-- Empty State -->
        <div class="col-span-3 text-center">
            <p class="text-gray-600 text-lg">No articles available at the moment. Please check back later.</p>
        </div>
    @endforelse
</div>
<!-- Pagination -->
<div class="flex justify-center py-6">
    <nav class="inline-flex items-center space-x-2">
        <!-- Previous Button -->
        @if ($articles->onFirstPage())
            <span class="px-4 py-2 bg-gray-300 text-gray-500 border rounded-md cursor-not-allowed">
                &laquo; Previous
            </span>
        @else
            <a href="{{ $articles->previousPageUrl() }}" 
                class="px-4 py-2 bg-teal-600 text-white border rounded-md hover:bg-teal-700 transition duration-300">
                &laquo; Previous
            </a>
        @endif

        <!-- Page Numbers -->
        @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
            @if ($page == $articles->currentPage())
                <span class="px-4 py-2 bg-teal-600 text-white border rounded-md">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}" 
                    class="px-4 py-2 bg-white text-gray-700 border rounded-md hover:bg-teal-100 transition duration-300">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        <!-- Next Button -->
        @if ($articles->hasMorePages())
            <a href="{{ $articles->nextPageUrl() }}" 
                class="px-4 py-2 bg-teal-600 text-white border rounded-md hover:bg-teal-700 transition duration-300">
                Next &raquo;
            </a>
        @else
            <span class="px-4 py-2 bg-gray-300 text-gray-500 border rounded-md cursor-not-allowed">
                Next &raquo;
            </span>
        @endif
    </nav>
</div>


@endsection
