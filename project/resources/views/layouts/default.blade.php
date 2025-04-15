<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    @yield('content')

    @if(session('clearLocalStorage'))
        @push('scripts')
            <script>
                localStorage.removeItem('imagePreview');
            </script>
        @endpush
    @endif

    @stack('scripts')
</body>

</html>