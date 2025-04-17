<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Social</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/js/mytailwindcss.js'
    ])
    @stack('styles')
</head>

<body>
    {{-- header --}}
    @include('includes.header')

    {{-- content --}}
    @yield('content')

    {{-- sessions --}}
    @if(session('clearLocalStorage'))
        @push('scripts')
            <script>
                localStorage.removeItem('imagePreview');
            </script>
        @endpush
    @endif

    {{-- footer --}}
    @include('includes.footer')

    @stack('scripts')
</body>

</html>