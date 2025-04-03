<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite(['resources/css/mytailwind.css']) --}}
</head>

<body class="container" style="padding: 10px">
    <a href="#" class="text-black me-3"><i class="fab fa-facebook-f fa-lg"></i></a>
    <a href="#" class="text-black me-3"><i class="fab fa-twitter fa-lg"></i></a>
    <a href="#" class="text-black me-3"><i class="fab fa-instagram fa-lg"></i></a>
    <a href="#" class="text-black me-3"><i class="fab fa-linkedin-in fa-lg"></i></a>
    <a href="#" class="text-black"><i class="fab fa-youtube fa-lg"></i></a>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <button class="btn bg-blue-500 text-white p-4">Test Button</button>
    <br>
    <button type="button" class="button" id="button_test">Test</button>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('#button_test').addEventListener('click', function () {
                console.log('pooper:');
                console.log(window.Popper);
                console.log('jquery:');
                console.log(window.jQuery);
                console.log('tailwind:');
                console.log(window.tailwind);
            })
        })
    </script>

    <h1>Livewire counter:</h1>
    @livewire('counter')

    @livewireScripts
</body>

</html>
