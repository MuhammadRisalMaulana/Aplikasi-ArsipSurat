<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=Nunito">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="font-sans antialiased bg-gray-100">

    <div x-data="{ sidebarOpen: true }" class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="bg-white border-r border-gray-200 w-120 flex flex-col transition-all duration-300">

            <!-- User Profile (top sidebar) -->
            @auth
                <div class="flex items-center gap-3 p-4 border-b">
                    <div
                        class="rounded-full bg-gray-200 w-10 h-10 flex items-center justify-center text-gray-600 text-lg font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            @endauth

            <!-- Menu Title -->
            <div class="px-4 py-2 text-gray-500 uppercase text-xs font-semibold">Menu</div>

            <!-- Menu Links -->
            <nav class="flex-1 px-3 py-2 space-y-1">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    class="flex items-center gap-3 hover:bg-gray-100 rounded-md transition-colors duration-200">
                    <span class="text-gray-800 font-medium">Dashboard</span>
                </x-nav-link>

                <x-nav-link :href="route('arsip.index')" :active="request()->is('arsip*')"
                    class="flex items-center gap-3 hover:bg-gray-100 rounded-md transition-colors duration-200">
                    <span class="text-gray-800 font-medium">Arsip</span>
                </x-nav-link>

                <x-nav-link :href="route('kategori.index')" :active="request()->is('kategori*')"
                    class="flex items-center gap-3 hover:bg-gray-100 rounded-md transition-colors duration-200">
                    <span class="text-gray-800 font-medium">Kategori</span>
                </x-nav-link>

                <x-nav-link :href="route('about')" :active="request()->is('about')"
                    class="flex items-center gap-3 hover:bg-gray-100 rounded-md transition-colors duration-200">
                    <span class="text-gray-800 font-medium">About</span>
                </x-nav-link>
            </nav>

            <!-- Logout (bottom sidebar) -->
            @auth
                <div class="px-4 py-3 mt-auto border-t">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-2 py-2 text-sm bg-red-500 text-white rounded hover:bg-red-600 transition-colors duration-200">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow px-4 py-4">
                @yield('header')
            </header>

            <main class="flex-1 p-4">
                @yield('content')
            </main>
        </div>

@stack('scripts')
    </div>

</body>

</html>
