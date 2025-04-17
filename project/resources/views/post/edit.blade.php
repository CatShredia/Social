@extends('layouts.default')
@section('content')
    <main class="main">
        <div class="container mx-auto mt-5 mb-10">
            <h1 class="mb-4 text-2xl font-bold">Редактировать пост</h1>
            <div class="mb-4 text-center">
                @if($post->image_storage_url)
                    <img src="{{ asset('storage/posts/images/' . $post->image_storage_url) }}" alt="{{ $post->title }}"
                        class="mb-2 rounded img-fluid" style="max-height: 200px; width: auto;">
                @else
                    <div class="mb-2"
                        style="height: 200px; display: flex; justify-content: center; align-items: center; background-color: #f0f0f0; color: #888;">
                        Нет изображения
                    </div>
                @endif
            </div>
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Заголовок</label>
                    <input type="text"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm @error('title') border-red-500 @enderror"
                        id="title" name="title" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Контент</label>
                    <textarea
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm @error('content') border-red-500 @enderror"
                        id="content" name="content" rows="5">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="likes" class="block text-sm font-medium text-gray-700">Лайки</label>
                    <input type="number"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm @error('likes') border-red-500 @enderror"
                        id="likes" name="likes" value="{{ old('likes', $post->likes) }}">
                    @error('likes')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Категория</label>
                    <select
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm @error('category_id') border-red-500 @enderror"
                        id="category_id" name="category_id">
                        <option value="">Выберите категорию</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="tags" class="block text-sm font-medium text-gray-700">Теги</label>
                    <select
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm @error('tags') border-red-500 @enderror"
                        id="tags" name="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="image_file" class="block text-sm font-medium text-gray-700">Изображение</label>
                    <input type="file"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm file:border-0 file:bg-green-500 file:text-white file:rounded-md file:px-4 file:py-2 hover:file:bg-green-600 @error('image_file') border-red-500 @enderror"
                        id="image_file" name="image_file" onchange="previewImage(event)">
                    @error('image_file')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4" id="image-preview-container" style="display:none;">
                    <img id="image-preview" src="" alt="Предпросмотр изображения"
                        class="w-full h-auto mt-2 border border-gray-300 rounded-lg shadow-md">
                </div>
                <button type="submit"
                    class="px-4 py-2 mt-3 font-semibold text-white bg-green-600 rounded-md hover:bg-green-500">Сохранить
                    изменения</button>
            </form>
        </div>
    </main>
    @push('scripts')
        <script>
            function previewImage(event) {
                const file = event.target.files[0];
                const reader = new FileReader();
                reader.onload = function () {
                    const imagePreview = document.getElementById('image-preview');
                    const previewContainer = document.getElementById('image-preview-container');
                    imagePreview.src = reader.result;
                    previewContainer.style.display = 'block';
                };
                if (file) {
                    reader.readAsDataURL(file);
                }
            }
            document.addEventListener('DOMContentLoaded', function () {
                const imagePreview = document.getElementById('image-preview');
                const previewContainer = document.getElementById('image-preview-container');
                const savedImage = localStorage.getItem('imagePreview');
                if (savedImage) {
                    imagePreview.src = savedImage;
                    previewContainer.style.display = 'block';
                }
            });
        </script>
    @endpush
@endsection