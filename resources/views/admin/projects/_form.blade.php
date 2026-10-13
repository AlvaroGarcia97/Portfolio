@csrf
@if (($method ?? 'POST') !== 'POST')
    @method($method)
@endif

<div class="grid gap-5">
    <div>
        <label for="title" class="block text-sm font-medium text-slate-700">Título</label>
        <input id="title" name="title" type="text" required
               value="{{ old('title', $project->title) }}"
               class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">
        @error('title')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="summary" class="block text-sm font-medium text-slate-700">Resumen corto</label>
        <input id="summary" name="summary" type="text" required maxlength="300"
               value="{{ old('summary', $project->summary) }}"
               class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">
        @error('summary')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="body" class="block text-sm font-medium text-slate-700">Descripción completa</label>
        <textarea id="body" name="body" rows="6"
                  class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">{{ old('body', $project->body) }}</textarea>
        @error('body')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label for="image" class="block text-sm font-medium text-slate-700">Imagen (URL)</label>
            <input id="image" name="image" type="url" placeholder="https://..."
                   value="{{ old('image', $project->image) }}"
                   class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">
            @error('image')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="tech_stack" class="block text-sm font-medium text-slate-700">Tecnologías (separadas por comas)</label>
            <input id="tech_stack" name="tech_stack" type="text" placeholder="Laravel, PHP, MySQL"
                   value="{{ old('tech_stack', $project->tech_stack ? implode(', ', $project->tech_stack) : '') }}"
                   class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">
            @error('tech_stack')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="repo_url" class="block text-sm font-medium text-slate-700">Repositorio (URL)</label>
            <input id="repo_url" name="repo_url" type="url" placeholder="https://github.com/..."
                   value="{{ old('repo_url', $project->repo_url) }}"
                   class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">
            @error('repo_url')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="demo_url" class="block text-sm font-medium text-slate-700">Demo (URL)</label>
            <input id="demo_url" name="demo_url" type="url" placeholder="https://..."
                   value="{{ old('demo_url', $project->demo_url) }}"
                   class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">
            @error('demo_url')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="grid gap-5 sm:grid-cols-3">
        <div>
            <label for="sort_order" class="block text-sm font-medium text-slate-700">Orden</label>
            <input id="sort_order" name="sort_order" type="number" min="0"
                   value="{{ old('sort_order', $project->sort_order ?? 0) }}"
                   class="mt-1 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900 outline-none transition focus:border-indigo-400">
            @error('sort_order')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
        </div>

        <label class="flex items-center gap-2 self-end pb-3 text-sm text-slate-700">
            <input type="checkbox" name="featured" value="1" @checked(old('featured', $project->featured))
                   class="rounded border-slate-300">
            Destacado
        </label>

        <label class="flex items-center gap-2 self-end pb-3 text-sm text-slate-700">
            <input type="checkbox" name="published" value="1" @checked(old('published', $project->published ?? false))
                   class="rounded border-slate-300">
            Publicado
        </label>
    </div>
</div>

<div class="mt-8 flex items-center gap-3">
    <button type="submit" class="rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700">
        {{ $submitLabel }}
    </button>
    <a href="{{ route('admin.projects.index') }}" class="text-sm text-slate-500 transition hover:text-slate-800">Cancelar</a>
</div>
