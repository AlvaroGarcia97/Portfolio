@extends('layouts.app')

@section('title', 'Sobre mí · '.config('portfolio.name'))

@section('content')
    <section class="mx-auto max-w-4xl px-6 py-16">
        <h1 class="text-3xl font-bold text-white sm:text-4xl">Sobre mí</h1>

        <div class="mt-6 space-y-4 leading-relaxed text-slate-300">
            <p>
                Hola, soy <strong class="text-white">{{ config('portfolio.name') }}</strong>, desarrollador de
                aplicaciones web. Acabo de finalizar el Ciclo Formativo de Grado Superior en
                Desarrollo de Aplicaciones Web (DAW).
            </p>
            <p>
                Durante el ciclo he trabajado con <strong class="text-white">Java</strong> en el primer curso y
                con <strong class="text-white">PHP y Laravel</strong> en el segundo, además de HTML, CSS,
                JavaScript y Angular para el desarrollo frontend.
            </p>
            <p>
                Disfruto construyendo aplicaciones completas: desde la base de datos y la lógica de
                servidor hasta interfaces cuidadas y responsivas. Ahora busco mi primera oportunidad
                profesional donde seguir aprendiendo y aportar valor real.
            </p>
        </div>

        <div class="mt-12">
            <h2 class="text-xl font-semibold text-white">Tecnologías</h2>
            <div class="mt-6 grid gap-6 sm:grid-cols-3">
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
        </div>

        <div class="mt-12 flex flex-wrap gap-3">
            <a href="mailto:{{ config('portfolio.email') }}" class="rounded-xl bg-indigo-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-indigo-400">
                Escríbeme
            </a>
            <a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener" class="rounded-xl border border-white/15 px-5 py-2.5 text-sm font-semibold text-slate-200 transition hover:bg-white/5">
                GitHub
            </a>
            <a href="{{ config('portfolio.linkedin') }}" target="_blank" rel="noopener" class="rounded-xl border border-white/15 px-5 py-2.5 text-sm font-semibold text-slate-200 transition hover:bg-white/5">
                LinkedIn
            </a>
        </div>
    </section>
@endsection
