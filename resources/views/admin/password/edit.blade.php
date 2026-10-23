@extends('layouts.admin')

@section('title', 'Cambiar contraseña')

@section('content')
    <div class="mx-auto max-w-md">
        <h1 class="text-2xl font-semibold text-slate-900">Cambiar contraseña</h1>
        <p class="mt-1 text-sm text-slate-500">
            Introduce tu contraseña actual y la nueva (mínimo 8 caracteres).
        </p>

        <form method="POST" action="{{ route('admin.password.update') }}" class="mt-6 grid gap-5">
            @csrf
            @method('PUT')

            <div>
                <label for="current_password" class="block text-sm font-medium text-slate-700">Contraseña actual</label>
                <input id="current_password" name="current_password" type="password" required autocomplete="current-password"
                       class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">
                @error('current_password')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Nueva contraseña</label>
                <input id="password" name="password" type="password" required autocomplete="new-password"
                       class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">
                @error('password')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Repite la nueva contraseña</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                       class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700">
                    Guardar contraseña
                </button>
                <a href="{{ route('admin.dashboard') }}" class="text-sm text-slate-500 transition hover:text-slate-800">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
