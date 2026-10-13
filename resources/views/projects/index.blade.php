@extends('layouts.app')

@section('title', 'Proyectos · '.config('portfolio.name'))

@section('content')
    <section class="mx-auto max-w-6xl px-6 py-16">
        <header class="mb-10">
            <h1 class="text-3xl font-bold text-white sm:text-4xl">Proyectos</h1>
            <p class="mt-3 max-w-2xl text-slate-400">
                Una selección de los trabajos que he desarrollado durante el ciclo de Desarrollo
                de Aplicaciones Web y por mi cuenta.
            </p>
        </header>

        @if ($projects->isEmpty())
            <p class="rounded-2xl border border-white/10 bg-white/5 p-8 text-center text-slate-400">
                Todavía no hay proyectos publicados.
            </p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    @include('projects._card', ['project' => $project])
                @endforeach
            </div>
        @endif
    </section>
@endsection
