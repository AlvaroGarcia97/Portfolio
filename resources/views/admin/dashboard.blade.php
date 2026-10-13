@extends('layouts.admin')

@section('title', 'Panel')

@section('content')
    <h1 class="text-2xl font-bold text-slate-900">Hola, {{ auth()->user()->name }}</h1>
    <p class="mt-1 text-slate-500">Este es el resumen de tu portfolio.</p>

    <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @php
            $cards = [
                ['label' => 'Proyectos', 'value' => $stats['projects'], 'route' => 'admin.projects.index'],
                ['label' => 'Destacados', 'value' => $stats['featured'], 'route' => 'admin.projects.index'],
                ['label' => 'Mensajes', 'value' => $stats['messages'], 'route' => 'admin.messages.index'],
                ['label' => 'Sin leer', 'value' => $stats['unread'], 'route' => 'admin.messages.index'],
            ];
        @endphp

        @foreach ($cards as $card)
            <a href="{{ route($card['route']) }}" class="rounded-2xl border border-slate-200 bg-white p-5 transition hover:border-indigo-300">
                <p class="text-sm text-slate-500">{{ $card['label'] }}</p>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $card['value'] }}</p>
            </a>
        @endforeach
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 rounded-2xl border border-slate-200 bg-white p-6">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="font-semibold text-slate-900">Últimos mensajes</h2>
                <a href="{{ route('admin.messages.index') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Ver todos</a>
            </div>

            @if ($recentMessages->isEmpty())
                <p class="py-6 text-center text-sm text-slate-400">No hay mensajes todavía.</p>
            @else
                <ul class="divide-y divide-slate-100">
                    @foreach ($recentMessages as $message)
                        <li class="flex items-center justify-between gap-4 py-3">
                            <div class="min-w-0">
                                <p class="truncate font-medium text-slate-800">
                                    {{ $message->subject }}
                                    @unless ($message->is_read)
                                        <span class="ml-1 rounded-full bg-indigo-500 px-2 py-0.5 text-xs font-semibold text-white">Nuevo</span>
                                    @endunless
                                </p>
                                <p class="truncate text-sm text-slate-500">{{ $message->name }} · {{ $message->email }}</p>
                            </div>
                            <a href="{{ route('admin.messages.show', $message) }}" class="shrink-0 text-sm text-indigo-600 hover:text-indigo-500">Ver</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6">
            <h2 class="font-semibold text-slate-900">Acciones rápidas</h2>
            <div class="mt-4 flex flex-col gap-3">
                <a href="{{ route('admin.projects.create') }}" class="rounded-xl bg-slate-900 px-4 py-2.5 text-center text-sm font-semibold text-white transition hover:bg-slate-700">
                    + Nuevo proyecto
                </a>
                <a href="{{ route('home') }}" target="_blank" class="rounded-xl border border-slate-200 px-4 py-2.5 text-center text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                    Ver el sitio público
                </a>
            </div>
        </div>
    </div>
@endsection
