<x-dashboard-layout>
    <x-slot:title>Edit Post</x-slot:title>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Edit Post</h2>
            
            <form method="post" action="{{ route('dashboard.update', $post->slug) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                    <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('title') border-red-500 @enderror" value="{{ old('title', $post->title) }}" required>
                    @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-5">
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Slug</label>
                    <input type="text" id="slug" name="slug" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" value="{{ old('slug', $post->slug) }}" readonly>
                </div>

                <div class="mb-5">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                    <select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Post Image</label>
                    
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-preview mb-3 col-sm-5 max-h-40 rounded block">
                    @else
                        <img class="img-preview mb-3 col-sm-5 max-h-40 rounded hidden">
                    @endif

                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" name="image" type="file" onchange="previewImage()">
                    @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-5">
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Body</label>
                    <textarea id="body" name="body" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('body', $post->body) }}</textarea>
                    @error('body')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update Post</button>
            </form>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            slug.value = title.value.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        });

        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
</x-dashboard-layout>