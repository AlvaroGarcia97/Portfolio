<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acceso · {{ config('portfolio.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="grid min-h-screen place-items-center bg-slate-950 px-6 text-slate-200 antialiased">
    <div class="w-full max-w-sm">
        <div class="mb-8 text-center">
            <span class="mx-auto grid h-12 w-12 place-items-center rounded-xl bg-gradient-to-br from-indigo-500 to-cyan-400 text-lg font-bold text-slate-950">AG</span>
            <h1 class="mt-4 text-xl font-semibold text-white">Panel de administración</h1>
            <p class="mt-1 text-sm text-slate-400">Accede para gestionar tu portfolio.</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5 rounded-2xl border border-white/10 bg-white/5 p-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-slate-300">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 w-full rounded-xl border border-white/10 bg-slate-950/50 px-4 py-2.5 text-white outline-none transition focus:border-indigo-400">
                @error('email')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-300">Contraseña</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 w-full rounded-xl border border-white/10 bg-slate-950/50 px-4 py-2.5 text-white outline-none transition focus:border-indigo-400">
            </div>

            <label class="flex items-center gap-2 text-sm text-slate-400">
                <input type="checkbox" name="remember" class="rounded border-white/20 bg-slate-950/50">
                Recordarme
            </label>

            <button type="submit"
                    class="w-full rounded-xl bg-indigo-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-400">
                Entrar
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-slate-300">← Volver al sitio</a>
        </p>
    </div>
</body>
</html>
