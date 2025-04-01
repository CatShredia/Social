@extends('layouts.default')

@section('content')
    @include('includes.header')
    <main class="main">
        <div class="container mt-2">
            <h1>Список постов</h1>

            <div class="list-group">
                @foreach ($posts as $post)
                    <div class="list-group-item">
                        <h5 class="mb-1">{{ $post->title }}</h5>
                        <p class="mb-1">{{ \Illuminate\Support\Str::limit($post->content, 150) }}</p>
                        <small>Лайков: {{ $post->likes }}</small>
                        <small class="text-muted d-block mt-2">Дата создания:
                            {{ $post->created_at->format('d-m-Y H:i') }}</small>
                        <div class="d-flex justify-content-between mt-2">
                            <a href="#" class="btn btn-outline-primary">Читать далее</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    @include('includes.footer')
@endsection
