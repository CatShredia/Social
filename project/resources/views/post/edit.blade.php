@extends('layouts.default')

@section('content')
    @include('includes.header')
    <main class="main">
        <div class="container mt-5">
            <h1>Редактировать пост</h1>

            <div class="text-center">
                @if($post->image_storage_url)
                    <img src="{{ asset('storage/posts/images/' . $post->image_storage_url) }}" alt="{{ $post->title }}"
                        class="mb-2 rounded img-fluid" style="max-height: 200px; width: auto;">
                @else
                    <div class="mb-2"
                        style="height: 200px; display: flex; justify-content: center; align-items: center; background-color: #f0f0f0; color: #888;">
                        No Image
                    </div>
                @endif
            </div>

            <!-- Форма редактирования поста -->
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Контент</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
                        rows="5">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="likes" class="form-label">Лайки</label>
                    <input type="number" class="form-control @error('likes') is-invalid @enderror" id="likes" name="likes"
                        value="{{ old('likes', $post->likes) }}">
                    @error('likes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Категория</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id">
                        <option value="">Выберите категорию</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Теги</label>
                    <select class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <x-images-form></x-images-form>

                <button type="submit" class="mt-3 btn btn-primary">Сохранить изменения</button>
            </form>
        </div>
    </main>
    @include('includes.footer')
@endsection