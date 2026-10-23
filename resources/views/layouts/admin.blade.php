<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') · {{ config('portfolio.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">
    @php
        $unread = \App\Models\Message::unread()->count();
    @endphp

    <header class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-3 px-4 py-3">
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 font-semibold text-slate-900">
                    <span class="grid h-8 w-8 place-items-center rounded-lg bg-slate-900 text-xs font-bold text-white">AG</span>
                    Panel
                </a>

                <nav class="flex items-center gap-1 text-sm">
                    @php
                        $adminLinks = [
                            ['route' => 'admin.dashboard', 'label' => 'Inicio'],
                            ['route' => 'admin.projects.index', 'label' => 'Proyectos'],
                            ['route' => 'admin.messages.index', 'label' => 'Mensajes'],
                            ['route' => 'admin.password.edit', 'label' => 'Contraseña'],
                        ];
                    @endphp

                    @foreach ($adminLinks as $link)
                        <a href="{{ route($link['route']) }}"
                           class="flex items-center gap-2 rounded-lg px-3 py-2 transition hover:bg-slate-100 {{ request()->routeIs($link['route']) ? 'bg-slate-100 font-medium text-slate-900' : 'text-slate-500' }}">
                            {{ $link['label'] }}
                            @if ($link['route'] === 'admin.messages.index' && $unread > 0)
                                <span class="rounded-full bg-indigo-500 px-2 py-0.5 text-xs font-semibold text-white">{{ $unread }}</span>
                            @endif
                        </a>
                    @endforeach
                </nav>
            </div>

            <div class="flex items-center gap-3 text-sm">
                <a href="{{ route('home') }}" target="_blank" class="text-slate-500 transition hover:text-slate-900">Ver sitio ↗</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="rounded-lg border border-slate-200 px-3 py-1.5 text-slate-600 transition hover:bg-slate-100">
                        Salir
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8">
        @if (session('status'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
