@extends('layouts.default')

@section('content')
    @include('includes.header')
    <main class="main">
        <div class="container mt-2">
            <h1>Создать новый пост</h1>

            <!-- Форма создания поста с возможностью загрузки изображения -->
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Контент</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
                        rows="5">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="likes" class="form-label">Лайки</label>
                    <input type="number" class="form-control @error('likes') is-invalid @enderror" id="likes" name="likes"
                        value="{{ old('likes', 0) }}">
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
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
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

                <button type="submit" class="btn btn-success mt-3">Создать пост</button>
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