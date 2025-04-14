<header class="bg-gray-100 shadow-sm">
    <nav class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Логотип и основные ссылки -->
            <div class="flex items-center">
                <a href="{{ route('index') }}" class="text-xl font-bold text-gray-900">Social</a>

                <!-- Кнопка мобильного меню (скрыта на десктопе) -->
                <button class="p-2 ml-4 text-gray-500 rounded-md md:hidden hover:text-gray-900 focus:outline-none"
                    x-data="{ open: false }" @click="open = !open" aria-expanded="false">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Основное меню -->
                <div class="hidden md:flex md:ml-6 md:space-x-8">
                    <a href="{{ route('post.index') }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-indigo-500">
                        Posts
                    </a>

                    {{-- @can('view-admin-button', Auth::user()) --}}
                    <a href="{{ route('admin.index') }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300">
                        Admin
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>

            <!-- Меню пользователя -->
            <div class="flex items-center">
                @if(Auth::check())
                    <div class="relative ml-4" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-sm rounded-full focus:outline-none">
                            <div class="flex items-center justify-center w-8 h-8 text-white bg-gray-400 rounded-full">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 ml-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Выпадающее меню -->
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu">
                            <form method="POST" action="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                @csrf
                                <button type="submit" class="w-full text-left">{{ __('Log Out') }}</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('profile.edit') }}" class="ml-4 text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>

        <!-- Мобильное меню (показывается при клике) -->
        <div class="md:hidden" x-show="open" @click.away="open = false">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('post.index') }}"
                    class="block py-2 pl-3 pr-4 text-base font-medium text-indigo-700 border-l-4 border-indigo-500 bg-indigo-50">
                    Posts
                </a>
                {{-- @can('view-admin-button', Auth::user()) --}}
                <a href="{{ route('admin.index') }}"
                    class="block py-2 pl-3 pr-4 text-base font-medium text-gray-600 border-l-4 border-transparent hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">
                    Admin
                </a>
                {{-- @endcan --}}
            </div>
        </div>
    </nav>
</header>