@extends('layouts.default')

@section('content')
    <main class="container mx-auto mt-4">
        <h1 class="mb-4 text-3xl font-semibold">Список постов</h1>

        <div class="mb-4">
            <a href="{{ route('post.create') }}"
                class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">
                Создать новый пост
            </a>
        </div>

        <div class="space-y-4">
            @foreach ($posts as $post)
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="text-center">
                            @if($post->image_storage_url)
                                <img src="{{ asset('storage/posts/images/' . $post->image_storage_url) }}" alt="{{ $post->title }}"
                                    class="mx-auto mb-2 rounded-lg" style="max-height: 200px; width: auto;">
                            @else
                                <div class="flex items-center justify-center h-48 mb-2 text-gray-500 bg-gray-100">
                                    No Image
                                </div>
                            @endif
                        </div>

                        <h5 class="mb-2 text-xl font-medium text-gray-900">{{ $post->title }}</h5>
                        <p class="mb-2 text-gray-700">{{ Str::limit($post->content, 150) }}</p>

                        <div class="mb-2 text-sm text-gray-500">
                            Лайков: {{ $post->likes }}
                        </div>

                        <p class="mb-3 text-gray-700">Категория: {{ $post->category->name }}</p>

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

                        <div class="mt-2 text-sm text-gray-500">
                            Дата создания: {{ $post->created_at->format('d-m-Y H:i') }}
                        </div>

                        <div class="flex justify-between mt-4">
                            <a href="{{ route('post.show', $post) }}"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                Читать далее
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection