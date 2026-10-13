@extends('layouts.admin')

@section('title', 'Mensaje')

@section('content')
    <a href="{{ route('admin.messages.index') }}" class="text-sm text-slate-500 transition hover:text-slate-800">← Volver a mensajes</a>

    <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6">
        <h1 class="text-xl font-bold text-slate-900">{{ $message->subject }}</h1>
        <p class="mt-1 text-sm text-slate-500">
            De <span class="text-slate-700">{{ $message->name }}</span>
            (<a href="mailto:{{ $message->email }}" class="text-indigo-600 hover:text-indigo-500">{{ $message->email }}</a>)
            · {{ $message->created_at->format('d/m/Y H:i') }}
        </p>

        <div class="mt-6 whitespace-pre-line leading-relaxed text-slate-700">{{ $message->body }}</div>

        <div class="mt-8 flex flex-wrap items-center gap-3">
            <a href="mailto:{{ $message->email }}?subject=Re: {{ rawurlencode($message->subject) }}"
               class="rounded-xl bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700">
                Responder por email
            </a>
            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}"
                  onsubmit="return confirm('¿Eliminar este mensaje?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-xl border border-slate-200 px-5 py-2.5 text-sm font-semibold text-red-500 transition hover:bg-red-50">
                    Eliminar
                </button>
            </form>
        </div>
    </div>
@endsection
