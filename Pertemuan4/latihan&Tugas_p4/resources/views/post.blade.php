<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>
<body class="bg-white font-sans text-gray-900 antialiased">

    <nav class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-4xl mx-auto px-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-tight hover:text-blue-700">My Blog</a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-10">
        
        <a href="/posts" class="inline-flex items-center text-sm text-gray-500 hover:text-blue-700 mb-6 transition">
            &larr; Back to all posts
        </a>

        <div class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                {{ $post->category->name }}
            </span>
            <span>&bull;</span>
            <span>{{ $post->created_at->format('d F Y') }}</span>
            <span>&bull;</span>
            <span>by {{ $post->author->name ?? 'Admin' }}</span>
        </div>

        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
            {{ $post->title }}
        </h1>

        @if ($post->image)
            <div class="mb-8 rounded-lg overflow-hidden shadow-sm">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full object-cover max-h-[200px]">
            </div>
        @else
            <div class="mb-8 rounded-lg overflow-hidden shadow-sm">
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="w-full object-cover max-h-[400px]">
            </div>
        @endif

        <article class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
            {!! $post->body !!}
        </article>

    </main>

    <footer class="border-t border-gray-100 py-8 mt-10">
        <div class="max-w-4xl mx-auto px-4 text-center text-gray-400 text-sm">
            &copy; 2025 My Blog. Created for Assignment.
        </div>
    </footer>

</body>
</html>