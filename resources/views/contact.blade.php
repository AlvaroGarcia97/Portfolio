@extends('layouts.app')

@section('title', 'Contacto · '.config('portfolio.name'))

@section('content')
    <section class="mx-auto max-w-2xl px-6 py-20">
        <h1 class="titulo-gigante titulo-gigante--seccion">Contacto</h1>
        <p class="mt-4 text-ink/60">
            ¿Tienes una oportunidad o simplemente quieres hablar? Rellena el formulario y te
            responderé lo antes posible.
        </p>

        @if (session('status'))
            <div class="mt-6 rounded-xl border border-emerald-600/30 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="mt-8 space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-ink">Nombre</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required
                       class="mt-1 w-full rounded-xl border border-ink/15 bg-white px-4 py-2.5 text-ink outline-none transition focus:border-ink">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-ink">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                       class="mt-1 w-full rounded-xl border border-ink/15 bg-white px-4 py-2.5 text-ink outline-none transition focus:border-ink">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="subject" class="block text-sm font-semibold text-ink">Asunto</label>
                <input id="subject" name="subject" type="text" value="{{ old('subject') }}" required
                       class="mt-1 w-full rounded-xl border border-ink/15 bg-white px-4 py-2.5 text-ink outline-none transition focus:border-ink">
                @error('subject')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body" class="block text-sm font-semibold text-ink">Mensaje</label>
                <textarea id="body" name="body" rows="6" required
                          class="mt-1 w-full rounded-xl border border-ink/15 bg-white px-4 py-2.5 text-ink outline-none transition focus:border-ink">{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full rounded-xl bg-ink px-6 py-3 text-sm font-semibold text-paper transition hover:bg-ink/90">
                Enviar mensaje
            </button>
        </form>
    </section>
@endsection
