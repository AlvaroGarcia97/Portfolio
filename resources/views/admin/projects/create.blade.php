@extends('layouts.admin')

@section('title', 'Nuevo proyecto')

@section('content')
    <h1 class="text-2xl font-bold text-slate-900">Nuevo proyecto</h1>
    <p class="mt-1 text-sm text-slate-500">Rellena los datos del proyecto.</p>

    <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6">
        <form method="POST" action="{{ route('admin.projects.store') }}">
            @include('admin.projects._form', [
                'project' => $project,
                'method' => 'POST',
                'submitLabel' => 'Crear proyecto',
            ])
        </form>
    </div>
@endsection
