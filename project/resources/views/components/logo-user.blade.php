<div class="flex items-center text-sm rounded-full focus:outline-none">
    <div class="flex items-center justify-center w-8 h-8 text-white bg-gray-400 rounded-full">
        @if (Auth::user()->image_storage_url == null)
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        @else
            evrjnrevbh
        @endif
    </div>
    <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
    <svg class="w-4 h-4 ml-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd" />
    </svg>
</div>