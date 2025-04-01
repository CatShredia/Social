@extends('layouts.default')

@section('content')
    @include('includes.header')
    <main class="main">
        <div class="container mt-5">
            <div class="post">
                <h1>{{ $post->title }}</h1>
                <p class="text-muted">Дата создания: {{ $post->created_at->format('d-m-Y H:i') }}</p>
                <p class="mb-3">{{ $post->content }}</p>
                <p class="mb-3">Категория: {{ $post->category->name }}</p>
                <p><strong>Лайков:</strong> {{ $post->likes }}</p>

                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-warning">Редактировать пост</a>

                <a href="{{ route('post.index') }}" class="btn btn-outline-secondary">Назад к списку</a>
            </div>
        </div>
    </main>
    @include('includes.footer')
@endsection
