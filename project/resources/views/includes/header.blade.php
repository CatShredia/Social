<header class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">Social</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{ route('post.index') }}">Posts</a>
                </div>
                @can('view-admin-button', Auth::user())
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">Admin</a>
                    </div>
                @endcan
            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="justify-content: end">
                <div class="navbar-nav">

                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                        @if(Auth::check())
                            <img src="#" alt="icon of user">
                            {{ Auth::user()->name }}
                        @else
                            <i class="fa-solid fa-circle-user" style="font-size: 2em"></i>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
