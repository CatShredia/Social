@extends('layouts.default')

@section('content')
    @include('includes.header')
    <main class="main">
        <div class="container mt-5">
            <h1>Редактировать пост</h1>

            <div class="text-center">
                @if($post->image_storage_url)
                    <img src="{{ asset('storage/posts/images/' . $post->image_storage_url) }}" alt="{{ $post->title }}"
                        class="img-fluid mb-2 rounded" style="max-height: 200px; width: auto;">
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

                <!-- Поле для загрузки изображения -->
                <div class="mb-3">
                    <label for="image_file" class="form-label">Изображение</label>
                    <input type="file" class="form-control @error('image_file') is-invalid @enderror" id="image_file"
                        name="image_file" onchange="previewImage(event)">
                    @error('image_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Место для предварительного просмотра изображения -->
                <div class="mb-3" id="image-preview-container" style="display:none;">
                    <img id="image-preview" src="" alt="Предпросмотр изображения" class="img-fluid">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Сохранить изменения</button>
            </form>
        </div>
    </main>
    @include('includes.footer')

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function () {
                const imagePreview = document.getElementById('image-preview');
                const previewContainer = document.getElementById('image-preview-container');
                imagePreview.src = reader.result;
                previewContainer.style.display = 'block';  // Показываем контейнер с изображением
            };

            if (file) {
                reader.readAsDataURL(file); // Читаем файл как URL
            }
        }
    </script>
@endsection