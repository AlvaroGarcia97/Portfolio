@extends('layouts.app')

@section('title', $project->title.' · '.config('portfolio.name'))
@section('meta_description', $project->summary)

@section('content')
    <section class="mx-auto max-w-4xl px-6 py-16">
        <a href="{{ route('projects.index') }}" class="text-sm text-slate-400 transition hover:text-white">← Volver a proyectos</a>

        <header class="mt-6">
            <h1 class="text-3xl font-bold text-white sm:text-4xl">{{ $project->title }}</h1>
            <p class="mt-3 text-lg text-slate-400">{{ $project->summary }}</p>
        </header>

        @if ($project->image)
            <img src="{{ $project->image }}" alt="{{ $project->title }}" class="mt-8 w-full rounded-2xl border border-white/10 object-cover">
        @endif

        @if (! empty($project->tech_stack))
            <ul class="mt-8 flex flex-wrap gap-2">
                @foreach ($project->tech_stack as $tech)
                    <li class="rounded-full bg-indigo-500/10 px-3 py-1 text-sm text-indigo-300">{{ $tech }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mt-8 flex flex-wrap gap-3">
            @if ($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="rounded-xl bg-indigo-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-400">
                    Ver demo
                </a>
            @endif
            @if ($project->repo_url)
                <a href="{{ $project->repo_url }}" target="_blank" rel="noopener" class="rounded-xl border border-white/15 px-5 py-2.5 text-sm font-semibold text-slate-200 transition hover:bg-white/5">
                    Código en GitHub
                </a>
            @endif
        </div>

        @if ($project->body)
            <div class="mt-10 leading-relaxed text-slate-300">
                {!! nl2br(e($project->body)) !!}
            </div>
        @endif
    </section>

    @if ($others->isNotEmpty())
        <section class="mx-auto max-w-6xl px-6 pb-20">
            <h2 class="mb-6 text-xl font-semibold text-white">Otros proyectos</h2>
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($others as $other)
                    @include('projects._card', ['project' => $other])
                @endforeach
            </div>
        </section>
    @endif
@endsection
