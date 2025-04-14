@extends('layouts.default')

@section('content')
    @include('includes.header')
    <main class="main">
        <div class="container mt-5">
            <div class="post">
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
                <h1>{{ $post->title }}</h1>
                <p class="text-muted">Дата создания: {{ $post->created_at->format('d-m-Y H:i') }}</p>
                <p class="mb-3">{{ $post->content }}</p>
                <p class="mb-3">Категория: {{ $post->category->name }}</p>
                <p><strong>Лайков:</strong> {{ $post->likes }}</p>

                <p class="mb-1">Теги:</p>
                @if($post->tags->isNotEmpty())
                    <ul>
                        @foreach($post->tags as $tag)
                            <li>{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Нет тегов</p>
                @endif

                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-warning">Редактировать пост</a>

                <a href="{{ route('post.index') }}" class="btn btn-outline-secondary">Назад к списку</a>
            </div>
        </div>
    </main>
    @include('includes.footer')
@endsection