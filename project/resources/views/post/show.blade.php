@extends('layouts.default')

@section('content')
    <main class="container mx-auto mt-5">
        <div class="overflow-hidden bg-white rounded-lg shadow">
            <div class="px-4 py-5 sm:p-6">
                <div class="mb-4 text-center">
                    @if($post->image_storage_url)
                        <img src="{{ asset('storage/posts/images/' . $post->image_storage_url) }}" alt="{{ $post->title }}"
                            class="mx-auto mb-2 rounded-lg" style="max-height: 200px; width: auto;">
                    @else
                        <div class="flex items-center justify-center h-48 mb-2 text-gray-500 bg-gray-100">
                            No Image
                        </div>
                    @endif
                </div>

                <h1 class="mb-2 text-3xl font-semibold text-gray-900">{{ $post->title }}</h1>
                <p class="mb-4 text-gray-500">Дата создания: {{ $post->created_at->format('d-m-Y H:i') }}</p>

                <div class="mb-4 text-gray-700">
                    {{ $post->content }}
                </div>

                <p class="mb-3 text-gray-700">Категория: {{ $post->category->name }}</p>

                <p class="mb-4 text-gray-700"><strong>Лайков:</strong> {{ $post->likes }}</p>

                <p class="mb-1 text-gray-700">Теги:</p>
                @if($post->tags->isNotEmpty())
                    <ul class="pl-4 list-disc list-inside">
                        @foreach($post->tags as $tag)
                            <li>{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Нет тегов</p>
                @endif

                <div class="flex justify-between mt-6">
                    <a href="{{ route('post.edit', $post->id) }}"
                        class="px-4 py-2 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-700">
                        Редактировать пост
                    </a>

                    <a href="{{ route('post.index') }}"
                        class="px-4 py-2 font-bold text-white bg-gray-500 rounded hover:bg-gray-700">
                        Назад к списку
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection