@extends('layouts.app')

@section('title', 'Contacto · '.config('portfolio.name'))

@section('content')
    <section class="mx-auto max-w-2xl px-6 py-16">
        <h1 class="text-3xl font-bold text-white sm:text-4xl">Contacto</h1>
        <p class="mt-3 text-slate-400">
            ¿Tienes una oportunidad o simplemente quieres hablar? Rellena el formulario y te
            responderé lo antes posible.
        </p>

        @if (session('status'))
            <div class="mt-6 rounded-xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-300">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="mt-8 space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-slate-300">Nombre</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required
                       class="mt-1 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-white outline-none transition focus:border-indigo-400">
                @error('name')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-300">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                       class="mt-1 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-white outline-none transition focus:border-indigo-400">
                @error('email')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subject" class="block text-sm font-medium text-slate-300">Asunto</label>
                <input id="subject" name="subject" type="text" value="{{ old('subject') }}" required
                       class="mt-1 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-white outline-none transition focus:border-indigo-400">
                @error('subject')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-slate-300">Mensaje</label>
                <textarea id="body" name="body" rows="6" required
                          class="mt-1 w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-white outline-none transition focus:border-indigo-400">{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full rounded-xl bg-indigo-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-400">
                Enviar mensaje
            </button>
        </form>
    </section>
@endsection
