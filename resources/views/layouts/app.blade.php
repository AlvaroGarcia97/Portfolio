<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('portfolio.name'))</title>
    <meta name="description" content="@yield('meta_description', config('portfolio.tagline'))">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-200 antialiased flex flex-col">
    <header class="sticky top-0 z-40 border-b border-white/5 bg-slate-950/80 backdrop-blur">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-semibold text-white">
                <span class="grid h-9 w-9 place-items-center rounded-lg bg-gradient-to-br from-indigo-500 to-cyan-400 text-sm font-bold text-slate-950">AG</span>
                <span class="hidden sm:inline">{{ config('portfolio.name') }}</span>
            </a>

            <nav class="flex items-center gap-1 text-sm">
                @php
                    $links = [
                        ['route' => 'home', 'label' => 'Inicio'],
                        ['route' => 'projects.index', 'label' => 'Proyectos'],
                        ['route' => 'about', 'label' => 'Sobre mí'],
                        ['route' => 'contact.show', 'label' => 'Contacto'],
                    ];
                @endphp
                @foreach ($links as $link)
                    <a href="{{ route($link['route']) }}"
                       class="rounded-lg px-3 py-2 transition hover:bg-white/5 hover:text-white {{ request()->routeIs($link['route']) ? 'text-white' : 'text-slate-400' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>
        </div>
    </header>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="border-t border-white/5">
        <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-6 py-8 text-sm text-slate-400 sm:flex-row">
            <p>© {{ date('Y') }} {{ config('portfolio.name') }}. Hecho con Laravel.</p>
            <div class="flex items-center gap-4">
                <a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener" class="transition hover:text-white">GitHub</a>
                <a href="{{ config('portfolio.linkedin') }}" target="_blank" rel="noopener" class="transition hover:text-white">LinkedIn</a>
                <a href="mailto:{{ config('portfolio.email') }}" class="transition hover:text-white">Email</a>
            </div>
        </div>
    </footer>
</body>
</html>
