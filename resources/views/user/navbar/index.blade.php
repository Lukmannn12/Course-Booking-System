<header class="fixed inset-x-0 top-0 z-50 shadow-md bg-white">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" id="menu-toggle" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{ route('home') }}"
                class="text-sm font-semibold transition-all duration-200 hover:underline hover:underline-offset-8 {{ request()->routeIs('home') ? 'text-blue-600 underline underline-offset-8' : 'text-gray-900' }}">
                Home
            </a>
            <a href="/form" class="text-sm font-semibold {{ request()->routeIs('product*') ? 'text-blue-600' : 'text-gray-900' }}">Form Pmesanan</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center space-x-4">
    @auth
    <span class="text-sm font-semibold text-gray-900">Welcome, {{ auth()->user()->name }}</span>
    <livewire:logout-button />
    @else
    <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-900 hover:bg-gray-50 px-4 py-2 rounded">Log in</a>
    @endauth
</div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-50"></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
                </a>
                <button type="button" id="close-menu" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root lg:hidden">
                <div class="-my-6 divide-y divide-gray-200">
                    <!-- Navigasi Utama -->
                    <div class="space-y-2 py-6">
                        <a href="{{ route('home') }}"
                            class="block px-4 py-2 text-base font-semibold rounded-lg transition hover:bg-gray-100 {{ request()->routeIs('home') ? 'text-blue-600 bg-gray-100' : 'text-gray-900' }}">
                            Home
                        </a>
                        <a href="#features" class="block px-4 py-2 text-base font-semibold rounded-lg text-gray-900 hover:bg-gray-100">Features</a>
                        <a href="#marketplace" class="block px-4 py-2 text-base font-semibold rounded-lg text-gray-900 hover:bg-gray-100">Marketplace</a>
                        <a href="#company" class="block px-4 py-2 text-base font-semibold rounded-lg text-gray-900 hover:bg-gray-100">Company</a>
                    </div>

                    <!-- Login -->
                    <div class="py-6">
                        @auth
                        <span class="text-sm font-semibold text-gray-900">Welcome, {{ auth()->user()->name }}</span>
                        @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-900 hover:bg-gray-50 px-4 py-2 rounded">Log in</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    document.getElementById('close-menu').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.add('hidden');
    });
</script>