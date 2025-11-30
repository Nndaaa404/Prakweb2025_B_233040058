<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen font-sans flex flex-col">

    <nav class="bg-white shadow p-4">
        <div class="max-w-4xl mx-auto">
            <div class="flex space-x-6">
                <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="/about" class="text-gray-700 hover:text-blue-600 font-medium">About</a>
                <a href="/posts" class="text-gray-700 hover:text-blue-600 font-medium">Posts</a>
                <a href="/categories" class="text-gray-700 hover:text-blue-600 font-medium">Categories</a>
                <a href="/contact" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
                <a href="/blog" class="text-gray-700 hover:text-blue-600 font-medium">Blog</a>
            </div>
        </div>
    </nav>
    

    <main class="max-w-4xl mx-auto p-4 grow">
        {{ $slot }}
    </main>

    <footer class="bg-white border-t border-gray-200 p-4 mt-8">
        <div class="max-w-4xl mx-auto text-center text-sm text-gray-500">
            &copy; 2025 Tugas Praktikum WEB.
        </div>
    </footer>

</body>
</html>