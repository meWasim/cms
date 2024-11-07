@props(['article'])

<div class="space-y-6">
    <div class="p-5 bg-white rounded-lg shadow-lg border border-gray-200">
        <article class="grid grid-cols-12 gap-4">
            <!-- Thumbnail Section -->
            <div class="col-span-4">
                <a href="">
                    <img class="w-full rounded-lg" src="{{ $article->getThumbnailUrl() }}" alt="thumbnail">
                </a>
            </div>

            <!-- Content Section -->
            <div class="col-span-8 space-y-3">
                <!-- Author and Date -->
                <div class="flex items-center text-sm text-gray-500 space-x-3">
                    <img class="w-7 h-7 rounded-full" src="{{ $article->author->profile_photo_url }}"
                        alt="{{ $article->author->name }}">
                    <span>{{ $article->author->name }}</span>
                    <span>•</span>
                    <span>{{ $article->published_at->diffForHumans() }}</span>
                </div>

                <!-- Title -->
                <h2 class="text-xl font-semibold text-gray-900 leading-tight">
                    <a href="http://127.0.0.1:8000/blog/first%20post">
                        {{ $article->title }}
                    </a>
                </h2>

                <!-- Excerpt -->
                <p class="text-gray-700 text-sm leading-relaxed">
                    {{ $article->getExcerpt() }}
                </p>

                <!-- Categories -->
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach ($article->categories as $category)
                        <x-articles.category-badge :category="$category" />
                    @endforeach
                </div>

                <!-- Read Time and Like Button -->
                <div class="flex items-center justify-between text-sm text-gray-500 mt-3">
                    <!-- Read Time -->
                    <span>{{ $article->getReadTime() }} min read</span>

                    <!-- Like Button -->
                    <button class="flex items-center space-x-1 text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        <span>1</span>
                    </button>
                </div>
            </div>
        </article>
    </div>
</div>
