<x-layout>
    <x-slot:title>
        Posts
    </x-slot:title>

    <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Posts</h1>

    <div class="space-y-4">
        @foreach ($posts as $post)
            <article class="bg-white p-6 rounded-lg shadow-md">

                <h2 class="text-xl font-semibold text-gray-900 mb-2">
                    <a href="/posts/{{ $post->slug }}" class="hover:text-blue-600">
                        {{ $post->title }}
                    </a>
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    {{ $post->excerpt }}
                </p>
            </article>
        @endforeach
    </div>
</x-layout>
