@extends('layouts.app')

@section('title', config('portfolio.name').' · Portfolio')

@section('content')
    <section class="flex min-h-screen flex-col items-center justify-center gap-24 px-4 py-24 text-center sm:gap-32">
        <div class="mosaicos">
            @foreach (['nube-roja.jpg', 'bleach-shinigami.jpg', 'estrella.jpg'] as $imagen)
                <img src="{{ asset('images/'.$imagen) }}" alt="" class="w-36 object-contain sm:w-56">
            @endforeach
        </div>

        <div class="flex flex-col gap-3">
            <h1 class="titulo-gigante titulo-gigante--nombre">{{ config('portfolio.display_name') }}</h1>
            <h2 class="titulo-gigante titulo-gigante--gris">{{ config('portfolio.headline') }}</h2>
            <a href="{{ route('about') }}" class="mt-2 text-xs uppercase tracking-[0.2em] text-ink/60 underline underline-offset-4 transition hover:text-ink">
                Sobre mí
            </a>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-6 py-24">
        <h2 class="titulo-gigante titulo-gigante--seccion">Proyectos</h2>

        @if ($projects->isEmpty())
            <p class="mt-10 rounded-2xl border border-ink/10 bg-white p-8 text-center text-ink/60">
                Todavía no hay proyectos publicados.
            </p>
        @else
            <div class="mt-12 grid grid-cols-2 gap-8 sm:grid-cols-3 sm:gap-12">
                @foreach ($projects as $proyecto)
                    @include('projects._card', ['project' => $proyecto])
                @endforeach
            </div>
        @endif
    </section>
@endsection
