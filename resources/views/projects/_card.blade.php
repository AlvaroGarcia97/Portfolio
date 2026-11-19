<a href="{{ route('projects.show', $project) }}" class="group block">
    <div class="mosaico color-{{ $project->id % 5 }} w-full">
        @if ($project->image)
            <img src="{{ $project->image }}" alt="{{ $project->title }}" class="h-full w-full rounded-2xl object-cover">
        @else
            <span>{{ mb_strtoupper(mb_substr($project->title, 0, 1)) }}</span>
        @endif
    </div>

    <h3 class="mt-4 text-xs font-bold uppercase tracking-[0.12em] group-hover:underline sm:text-sm">
        {{ $project->title }}
    </h3>
</a>
