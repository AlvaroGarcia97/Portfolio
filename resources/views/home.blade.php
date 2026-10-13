@extends('layouts.app')

@section('title', config('portfolio.name').' · Portfolio')

@section('content')
    <section class="relative overflow-hidden">
        <div class="pointer-events-none absolute -top-40 left-1/2 h-96 w-96 -translate-x-1/2 rounded-full bg-indigo-500/20 blur-3xl"></div>

        <div class="relative mx-auto max-w-6xl px-6 py-24 text-center">
            <p class="mx-auto mb-6 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm text-slate-300">
                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                Disponible para trabajar
            </p>

            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                {{ config('portfolio.name') }}
            </h1>

            <p class="mt-4 text-lg font-medium text-indigo-300">{{ config('portfolio.role') }}</p>

            <p class="mx-auto mt-6 max-w-2xl leading-relaxed text-slate-400">
                {{ config('portfolio.tagline') }}. Recién graduado en Desarrollo de Aplicaciones Web,
                con muchas ganas de seguir creciendo y aportar en proyectos reales.
            </p>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
                <a href="{{ route('projects.index') }}" class="rounded-xl bg-indigo-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-400">
                    Ver proyectos
                </a>
                <a href="{{ route('contact.show') }}" class="rounded-xl border border-white/15 px-6 py-3 text-sm font-semibold text-slate-200 transition hover:bg-white/5">
                    Contáctame
                </a>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-6 pb-20">
        <h2 class="mb-8 text-2xl font-semibold text-white">Tecnologías</h2>
        <div class="grid gap-6 sm:grid-cols-3">
            @foreach (config('portfolio.skills') as $group => $items)
                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-indigo-300">{{ $group }}</h3>
                    <ul class="flex flex-wrap gap-2">
                        @foreach ($items as $item)
                            <li class="rounded-lg bg-white/5 px-3 py-1 text-sm text-slate-300">{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    @if ($featured->isNotEmpty())
        <section class="mx-auto max-w-6xl px-6 pb-24">
            <div class="mb-8 flex items-end justify-between">
                <h2 class="text-2xl font-semibold text-white">Proyectos destacados</h2>
                <a href="{{ route('projects.index') }}" class="text-sm text-indigo-300 hover:text-indigo-200">Ver todos →</a>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($featured as $project)
                    @include('projects._card', ['project' => $project])
                @endforeach
            </div>
        </section>
    @endif
@endsection
