@extends('layouts.default')
@section('content')
    <main class="main">
        <div class="container mx-auto mt-2 mb-10">
            <h1 class="mb-4 text-2xl font-bold">Создать новый пост</h1>
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Заголовок</label>
                    <input type="text"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm @error('title') border-red-500 @enderror"
                        id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Контент</label>
                    <textarea
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm @error('content') border-red-500 @enderror"
                        id="content" name="content" rows="5">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="likes" class="block text-sm font-medium text-gray-700">Лайки</label>
                    <input type="number"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm @error('likes') border-red-500 @enderror"
                        id="likes" name="likes" value="{{ old('likes', 0) }}">
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
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <x-images-form></x-images-form>

                <button type="submit"
                    class="px-4 py-2 mt-3 font-semibold text-white bg-green-600 rounded-md hover:bg-green-500">Создать
                    пост</button>
            </form>
        </div>
    </main>

@endsection