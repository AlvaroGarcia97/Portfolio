@extends('layouts.admin')

@section('title', 'Proyectos')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Proyectos</h1>
            <p class="mt-1 text-sm text-slate-500">Gestiona los proyectos de tu portfolio.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700">
            + Nuevo proyecto
        </a>
    </div>

    @if ($projects->isEmpty())
        <p class="rounded-2xl border border-slate-200 bg-white p-10 text-center text-slate-400">
            No hay proyectos todavía. Crea el primero.
        </p>
    @else
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-slate-200 bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-4 py-3">Título</th>
                        <th class="hidden px-4 py-3 md:table-cell">Tecnologías</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($projects as $project)
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    @if ($project->featured)
                                        <span title="Destacado" class="text-amber-500">★</span>
                                    @endif
                                    <span class="font-medium text-slate-800">{{ $project->title }}</span>
                                </div>
                                <span class="text-xs text-slate-400">orden: {{ $project->sort_order }}</span>
                            </td>
                            <td class="hidden px-4 py-3 md:table-cell">
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($project->tech_stack ?? [] as $tech)
                                        <span class="rounded bg-slate-100 px-2 py-0.5 text-xs text-slate-600">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                @if ($project->published)
                                    <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-medium text-emerald-700">Publicado</span>
                                @else
                                    <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-500">Borrador</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('projects.show', $project) }}" target="_blank" class="text-slate-400 hover:text-slate-700">Ver</a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-500">Editar</a>
                                    <form method="POST" action="{{ route('admin.projects.destroy', $project) }}"
                                          onsubmit="return confirm('¿Seguro que quieres eliminar «{{ $project->title }}»?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $projects->links() }}
        </div>
    @endif
@endsection
