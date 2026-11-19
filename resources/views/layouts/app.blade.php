<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('portfolio.name'))</title>
    <meta name="description" content="@yield('meta_description', config('portfolio.tagline'))">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col antialiased {{ request()->routeIs('admin.*', 'login') ? 'bg-ink text-paper' : 'bg-paper text-ink' }}">
    @unless(request()->routeIs('admin.*', 'login'))
        <header class="fixed right-4 top-4 z-50">
            <details class="group">
                <summary class="grid h-12 w-12 cursor-pointer place-items-center rounded-full bg-ink text-paper shadow-lg">☰</summary>
                <nav class="mt-2 flex flex-col gap-1 rounded-2xl bg-ink p-3 text-paper shadow-xl">
                    <a href="{{ route('home') }}" class="rounded-lg px-3 py-2 text-xs uppercase tracking-widest hover:bg-white/10">Inicio</a>
                    <a href="{{ route('projects.index') }}" class="rounded-lg px-3 py-2 text-xs uppercase tracking-widest hover:bg-white/10">Proyectos</a>
                    <a href="{{ route('about') }}" class="rounded-lg px-3 py-2 text-xs uppercase tracking-widest hover:bg-white/10">Sobre mí</a>
                    <a href="{{ route('contact.show') }}" class="rounded-lg px-3 py-2 text-xs uppercase tracking-widest hover:bg-white/10">Contacto</a>
                </nav>
            </details>
        </header>
    @endunless

    <main class="flex-1">
        @yield('content')
    </main>

    @unless(request()->routeIs('admin.*', 'login'))
        <footer class="bg-mist px-4 py-16 text-center">
            <p class="titulo-gigante titulo-gigante--seccion">Contacto</p>
            <div class="mt-8 flex flex-wrap justify-center gap-6 text-xs uppercase tracking-widest sm:text-sm">
                <a href="mailto:{{ config('portfolio.email') }}" class="hover:underline">{{ config('portfolio.email') }}</a>
                <a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener" class="hover:underline">GitHub</a>
                <a href="{{ config('portfolio.linkedin') }}" target="_blank" rel="noopener" class="hover:underline">LinkedIn</a>
            </div>
        </footer>
    @endunless
</body>
</html>
