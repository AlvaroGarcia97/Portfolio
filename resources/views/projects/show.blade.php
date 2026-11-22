@extends('layouts.app')

@section('title', $project->title.' · '.config('portfolio.name'))
@section('meta_description', $project->summary)

@section('content')
    <section class="mx-auto max-w-4xl px-6 py-20">
        <a href="{{ route('projects.index') }}" class="text-sm text-ink/60 transition hover:text-ink">← Volver a proyectos</a>

        <header class="mt-8">
            <h1 class="titulo-gigante titulo-gigante--seccion">{{ $project->title }}</h1>
            <p class="mt-4 text-lg text-ink/60">{{ $project->summary }}</p>
        </header>
        
       

        @if (! empty($project->tech_stack))
            <ul class="mt-8 flex flex-wrap gap-2">
                @foreach ($project->tech_stack as $tech)
                    <li class="rounded-full bg-mist/40 px-3 py-1 text-sm text-ink">{{ $tech }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mt-8 flex flex-wrap gap-3">
            @if ($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="rounded-xl bg-ink px-5 py-2.5 text-sm font-semibold text-paper transition hover:bg-ink/90">
                    Ver demo
                </a>
            @endif
            @if ($project->repo_url)
                <a href="{{ $project->repo_url }}" target="_blank" rel="noopener" class="rounded-xl border border-ink/20 px-5 py-2.5 text-sm font-semibold text-ink transition hover:bg-mist/40">
                    Código en GitHub
                </a>
            @endif
        </div>

        @if ($project->body)
            <div class="mt-10 leading-relaxed text-ink/70">
                {!! nl2br(e($project->body)) !!}
            </div>
        @endif
    </section>

    @if ($others->isNotEmpty())
        <section class="mx-auto max-w-6xl px-6 pb-20">
            <h2 class="text-2xl font-bold uppercase tracking-widest">Otros proyectos</h2>
            <div class="mt-8 grid grid-cols-2 gap-8 sm:grid-cols-3 sm:gap-12">
                @foreach ($others as $other)
                    @include('projects._card', ['project' => $other])
                @endforeach
            </div>
        </section>
    @endif
@endsection
