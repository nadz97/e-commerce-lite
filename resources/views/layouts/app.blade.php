<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles


</head>

<body class="font-sans antialiased bg-teal">
    <div class="h-screen flex flex-col">


        {{-- Fixed Header --}}
        @if (!request()->is('404') && !request()->is('500'))
            <header class="fixed top-0 left-0 right-0 z-40">
                <livewire:layout.header :title="$header ?? 'Dashboard'" />
            </header>
        @endif


        {{-- Main Layout --}}
        <main class="flex flex-row flex-1 pt-[80px] relative" x-data="{ fading: false }"
            x-on:navigate-start.window="fading = true"
            x-on:navigate-finish.window="setTimeout(() => fading = false, 150)">
            <!-- Sidebar (Fixed) -->
            <aside class="fixed top-[80px] left-0 h-[calc(100vh-80px)] w-64 p-6">
                <livewire:sidebar />
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 ml-72 p-6 overflow-y-auto transition-opacity duration-500"
                :class="{ 'opacity-0': fading, 'opacity-100': !fading }">
                {{ $slot }}
            </div>
        </main>
    </div>

    @livewireScripts
</body>

</html>
