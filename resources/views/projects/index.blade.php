@extends('layouts.app')

@section('title', 'Proyectos · '.config('portfolio.name'))

@section('content')
    <section class="mx-auto max-w-6xl px-6 py-20">
        <h1 class="titulo-gigante titulo-gigante--seccion">Proyectos</h1>
        <p class="mt-4 max-w-2xl text-ink/60">
            Una selección de los trabajos que he desarrollado durante el ciclo de Desarrollo
            de Aplicaciones Web y por mi cuenta.
        </p>

        @if ($projects->isEmpty())
            <p class="mt-10 rounded-2xl border border-ink/10 bg-white p-8 text-center text-ink/60">
                Todavía no hay proyectos publicados.
            </p>
        @else
            <div class="mt-12 grid grid-cols-2 gap-8 sm:grid-cols-3 sm:gap-12">
                @foreach ($projects as $project)
                    @include('projects._card', ['project' => $project])
                @endforeach
            </div>
        @endif
    </section>
@endsection
