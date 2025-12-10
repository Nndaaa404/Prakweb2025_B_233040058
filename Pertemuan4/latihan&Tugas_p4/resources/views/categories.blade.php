<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog | Categories</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>
<body class="bg-white font-sans text-gray-900 antialiased">

    <nav class="bg-white border-b border-gray-200 py-4 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-tight hover:text-blue-700">My Blog</a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-10">
        
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Explore Topics</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($categories as $category)
            <a href="/posts?category={{ $category->slug }}" class="group relative block h-48 overflow-hidden rounded-xl bg-gray-900 shadow-md hover:shadow-xl transition-all duration-300">
                
                <img 
                    src="https://source.unsplash.com/500x500?{{ $category->name }}" 
                    alt="{{ $category->name }}" 
                    class="absolute inset-0 h-full w-full object-cover opacity-60 transition-opacity group-hover:opacity-40"
                />

                <div class="absolute inset-0 flex flex-col items-center justify-center p-4 text-center">
                    <h2 class="text-2xl font-bold text-white tracking-widest uppercase drop-shadow-md">
                        {{ $category->name }}
                    </h2>
                    
                    <span class="mt-2 inline-block rounded-full bg-blue-600 px-3 py-1 text-xs font-medium text-white opacity-0 transition-opacity group-hover:opacity-100">
                        View Posts
                    </span>
                </div>
            </a>
            @endforeach
        </div>

    </main>

    <footer class="border-t border-gray-100 py-8 mt-10">
        <div class="max-w-4xl mx-auto px-4 text-center text-gray-400 text-sm">
            &copy; 2025 My Blog. All Categories.
        </div>
    </footer>

</body>
</html>