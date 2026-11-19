@extends('layouts.app')

@section('title', 'Sobre mí · '.config('portfolio.name'))

@section('content')
    <section class="mx-auto max-w-4xl px-6 py-20">
        <h1 class="titulo-gigante titulo-gigante--seccion">Sobre mí</h1>

        <div class="mt-8 space-y-4 leading-relaxed text-ink/70">
            <p>
                Hola, soy <strong class="text-ink">{{ config('portfolio.name') }}</strong>, desarrollador de
                aplicaciones web. Acabo de finalizar el Ciclo Formativo de Grado Superior en
                Desarrollo de Aplicaciones Web (DAW).
            </p>
            <p>
                Durante el ciclo he trabajado con <strong class="text-ink">Java</strong> en el primer curso y
                con <strong class="text-ink">PHP y Laravel</strong> en el segundo, además de HTML, CSS,
                JavaScript y Angular para el desarrollo frontend.
            </p>
            <p>
                Disfruto construyendo aplicaciones completas: desde la base de datos y la lógica de
                servidor hasta interfaces cuidadas y responsivas. Ahora busco mi primera oportunidad
                profesional donde seguir aprendiendo y aportar valor real.
            </p>
        </div>

        <div class="mt-16">
            <h2 class="text-2xl font-bold uppercase tracking-widest">Tecnologías</h2>
            <div class="mt-8 grid gap-6 sm:grid-cols-3">
                @foreach (config('portfolio.skills') as $group => $items)
                    <div class="rounded-2xl border border-ink/10 bg-white p-6">
                        <h3 class="mb-4 text-xs font-bold uppercase tracking-widest text-ink/60">{{ $group }}</h3>
                        <ul class="flex flex-wrap gap-2">
                            @foreach ($items as $item)
                                <li class="rounded-lg bg-mist/40 px-3 py-1 text-sm text-ink">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-16 flex flex-wrap gap-3">
            <a href="mailto:{{ config('portfolio.email') }}" class="rounded-xl bg-ink px-5 py-2.5 text-sm font-semibold text-paper transition hover:bg-ink/90">
                Escríbeme
            </a>
            <a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener" class="rounded-xl border border-ink/20 px-5 py-2.5 text-sm font-semibold text-ink transition hover:bg-mist/40">
                GitHub
            </a>
            <a href="{{ config('portfolio.linkedin') }}" target="_blank" rel="noopener" class="rounded-xl border border-ink/20 px-5 py-2.5 text-sm font-semibold text-ink transition hover:bg-mist/40">
                LinkedIn
            </a>
        </div>
    </section>
@endsection
