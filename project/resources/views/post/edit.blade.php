@extends('layouts.default')

@section('content')
    @include('includes.header')
    <main class="main">
        <div class="container mt-5">
            <h1>Редактировать пост</h1>

            <!-- Форма редактирования поста -->
            <form action="{{ route('post.update', $post->id) }}" method="POST">
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
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5"
                    >{{ old('content', $post->content) }}</textarea>
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
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
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

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published"
                        {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Опубликован</label>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Сохранить изменения</button>
            </form>
        </div>
    </main>
    @include('includes.footer')
@endsection
