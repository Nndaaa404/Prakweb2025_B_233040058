<x-layout>
    <x-slot:title>
        Categories
    </x-slot:title>

    <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Kategori</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        @if (count($categories) > 0)
            <ul class="divide-y divide-gray-200">
                @foreach ($categories as $category)
                    <li class="py-3 px-2 text-lg text-gray-700 hover:bg-gray-50">
                        <a href="/categories/{{ $category->name }}" class="font-medium hover:text-blue-600">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 italic text-center py-4">
                Belum ada kategori yang ditambahkan.
            </p>
        @endif
    </div>
</x-layout>
