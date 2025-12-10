<x-dashboard-layout>
    <x-slot:title>Post Categories</x-slot:title>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Post Categories</h1>

            @if(session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">Success!</span> {{ session('success') }}
            </div>
            @endif

            <a href="{{ route('dashboard.categories.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-4 inline-block">
                Create New Category
            </a>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">Category Name</th>
                            <th scope="col" class="px-6 py-3">Slug</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $category->name }}</td>
                            <td class="px-6 py-4">{{ $category->slug }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('dashboard.categories.edit', $category->slug) }}" class="font-medium text-yellow-600 hover:underline bg-yellow-100 p-2 rounded">Edit</a>
                                <form action="{{ route('dashboard.categories.destroy', $category->slug) }}" method="post" class="inline-block">
                                    @method('delete')
                                    @csrf
                                    <button class="font-medium text-red-600 hover:underline bg-red-100 p-2 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>