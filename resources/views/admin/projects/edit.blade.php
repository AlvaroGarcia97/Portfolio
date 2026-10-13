@extends('layouts.admin')

@section('title', 'Editar proyecto')

@section('content')
    <h1 class="text-2xl font-bold text-slate-900">Editar proyecto</h1>
    <p class="mt-1 text-sm text-slate-500">Actualiza los datos de «{{ $project->title }}».</p>

    <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6">
        <form method="POST" action="{{ route('admin.projects.update', $project) }}">
            @include('admin.projects._form', [
                'project' => $project,
                'method' => 'PUT',
                'submitLabel' => 'Guardar cambios',
            ])
        </form>
    </div>
@endsection
