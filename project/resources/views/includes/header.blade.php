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
                {{-- @can('view-admin-button', Auth::user()) --}}
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">Admin</a>
                </div>
                {{-- @endcan --}}
            </div>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="justify-content: end">
                <div class="navbar-nav">
                    @if(Auth::check())
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="" alt="icon of user">
                                {{ Auth::user()->name }}
                                сюда
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a href="{{ route('profile.edit') }}">Profile</a>
                                </li>
                                <li>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a class="nav-link active" aria-current="page" href="{{ route('profile.edit') }}">
                            <i class="fa-solid fa-circle-user" style="font-size: 2em"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>