<article class="group flex flex-col overflow-hidden rounded-2xl border border-white/10 bg-white/5 transition hover:border-indigo-400/40 hover:bg-white/[0.07]">
    @if ($project->image)
        <img src="{{ $project->image }}" alt="{{ $project->title }}" class="h-44 w-full object-cover">
    @else
        <div class="flex h-44 items-center justify-center bg-gradient-to-br from-indigo-500/20 to-cyan-400/10 text-4xl font-bold text-indigo-300/70">
            {{ mb_strtoupper(mb_substr($project->title, 0, 1)) }}
        </div>
    @endif

    <div class="flex flex-1 flex-col gap-3 p-5">
        <h3 class="text-lg font-semibold text-white">{{ $project->title }}</h3>
        <p class="flex-1 text-sm leading-relaxed text-slate-400">{{ $project->summary }}</p>

        @if (! empty($project->tech_stack))
            <ul class="flex flex-wrap gap-2">
                @foreach ($project->tech_stack as $tech)
                    <li class="rounded-full bg-indigo-500/10 px-2.5 py-1 text-xs text-indigo-300">{{ $tech }}</li>
                @endforeach
            </ul>
        @endif

        <div class="flex items-center gap-4 pt-1 text-sm">
            <a href="{{ route('projects.show', $project) }}" class="font-medium text-indigo-300 hover:text-indigo-200">Ver detalle →</a>
            @if ($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="text-slate-400 hover:text-white">Demo</a>
            @endif
        </div>
    </div>
</article>
