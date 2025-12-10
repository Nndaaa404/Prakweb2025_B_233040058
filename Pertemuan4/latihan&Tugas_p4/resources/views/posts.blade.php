<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog | {{ $title ?? 'Home' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-50 font-sans antialiased">

    <nav class="bg-white border-gray-200 dark:bg-gray-900 shadow-sm sticky top-0 z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-bold whitespace-nowrap text-gray-900 dark:text-white">My Blog</span>
            </a>

            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    
                    <li>
                        <a href="/" class="block py-2 px-3 rounded md:p-0 {{ Request::is('/') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:text-white md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500' }}" aria-current="page">Home</a>
                    </li>

                    <li>
                        <a href="/categories" class="block py-2 px-3 rounded md:p-0 {{ Request::is('categories*') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:text-white md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500' }}">Categories</a>
                    </li>

                    <li>
                        <a href="/about" class="block py-2 px-3 rounded md:p-0 {{ Request::is('about') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:text-white md:dark:text-blue-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500' }}">About</a>
                    </li>

                    @auth
                        <li>
                            <a href="/dashboard" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Dashboard ({{ auth()->user()->name }})
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="/login" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow-sm py-10 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $title ?? 'Latest Articles' }}</h1>
            <p class="text-gray-500 mb-6">Discover news, stories, and knowledge.</p>
            
            <div class="max-w-xl mx-auto">
                <form action="/posts"> 
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for articles..." value="{{ request('search') }}">
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        @if ($posts->count())
            <div class="bg-white border border-gray-200 rounded-xl shadow-lg mb-12 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="grid md:grid-cols-2">
                    <div class="relative h-64 md:h-auto overflow-hidden">
                        @if ($posts[0]->image)
                            <img class="absolute inset-0 w-full h-full object-cover transform hover:scale-105 transition duration-500" src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->title }}">
                        @else
                            <img class="absolute inset-0 w-full h-full object-cover" src="https://source.unsplash.com/1200x800?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->category->name }}">
                        @endif
                    </div>
                    <div class="p-8 flex flex-col justify-center">
                        <div class="mb-4">
                            <a href="/posts?category={{ $posts[0]->category->slug }}">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-blue-400">
                                    {{ $posts[0]->category->name }}
                                </span>
                            </a>
                        </div>
                        <h2 class="mb-3 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="/posts/{{ $posts[0]->slug }}" class="hover:underline hover:text-blue-700 transition">{{ $posts[0]->title }}</a>
                        </h2>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span>By <a href="/posts?author={{ $posts[0]->author->username ?? '#' }}" class="font-medium text-gray-900 hover:underline">{{ $posts[0]->author->name ?? 'Admin' }}</a></span>
                            <span class="mx-2">•</span>
                            <span>{{ $posts[0]->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="mb-6 text-gray-600 line-clamp-3">{{ $posts[0]->excerpt }}</p>
                        <a href="/posts/{{ $posts[0]->slug }}" class="inline-flex items-center text-blue-600 font-semibold hover:underline">
                            Read full article
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2">
                @foreach ($posts->skip(1) as $post)
                <div class="bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full overflow-hidden">
                    
                    <div class="relative h-48 overflow-hidden">
                        <a href="/posts?category={{ $post->category->slug }}" class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-3 py-1 rounded-full shadow z-10 hover:bg-white">
                            {{ $post->category->name }}
                        </a>
                        @if ($post->image)
                            <img class="w-full h-full object-cover hover:scale-110 transition duration-500" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                        @else
                            <img class="w-full h-full object-cover hover:scale-110 transition duration-500" src="https://source.unsplash.com/500x400?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                        @endif
                    </div>

                    <div class="p-5 flex flex-col flex-grow">
                        <div class="mb-2 text-xs text-gray-500">
                            {{ $post->created_at->format('d M Y') }} • By {{ $post->author->name ?? 'Admin' }}
                        </div>
                        <a href="/posts/{{ $post->slug }}">
                            <h5 class="mb-3 text-xl font-bold tracking-tight text-gray-900 hover:text-blue-600 line-clamp-2">{{ $post->title }}</h5>
                        </a>
                        <p class="mb-4 font-normal text-gray-600 flex-grow line-clamp-3">
                            {{ Str::limit($post->excerpt, 100) }}
                        </p>
                        <a href="/posts/{{ $post->slug }}" class="inline-flex items-center font-medium text-blue-600 hover:underline">
                            Read more
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <p class="text-2xl font-semibold text-gray-600 mb-2">No posts found.</p>
                <p class="text-gray-500">Try adjusting your search or category filter.</p>
                <a href="/" class="text-blue-600 hover:underline mt-4 inline-block">Clear all filters</a>
            </div>
        @endif

        <div class="mt-12 flex justify-center">
             {{ $posts->links() }} 
        </div>
    </main>

    <footer class="bg-white border-t mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
            &copy; 2025 My Blog. All rights reserved.
        </div>
    </footer>

</body>
</html>