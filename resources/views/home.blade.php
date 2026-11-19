@extends('layouts.app')

@section('title', config('portfolio.name').' · Portfolio')

@section('content')
    <section class="flex min-h-screen flex-col items-center justify-center gap-24 px-4 py-24 text-center sm:gap-32">
        <div class="mosaicos">
            @foreach ($featured as $proyecto)
                <div class="mosaico color-{{ $loop->index % 5 }} w-28 sm:w-44">
                    @if ($proyecto->image)
                        <img src="{{ $proyecto->image }}" alt="{{ $proyecto->title }}" class="h-full w-full rounded-2xl object-cover">
                    @else
                        <span>{{ mb_strtoupper(mb_substr($proyecto->title, 0, 1)) }}</span>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="flex flex-col gap-3">
            <h1 class="titulo-gigante">{{ config('portfolio.display_name') }}</h1>
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
