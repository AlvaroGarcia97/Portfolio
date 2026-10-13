@extends('layouts.admin')

@section('title', 'Mensajes')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900">Mensajes</h1>
        <p class="mt-1 text-sm text-slate-500">Mensajes recibidos desde el formulario de contacto.</p>
    </div>

    @if ($messages->isEmpty())
        <p class="rounded-2xl border border-slate-200 bg-white p-10 text-center text-slate-400">
            No hay mensajes todavía.
        </p>
    @else
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
            <ul class="divide-y divide-slate-100">
                @foreach ($messages as $message)
                    <li class="{{ $message->is_read ? '' : 'bg-indigo-50/40' }}">
                        <a href="{{ route('admin.messages.show', $message) }}" class="flex items-start justify-between gap-4 px-4 py-4 transition hover:bg-slate-50">
                            <div class="min-w-0">
                                <p class="flex items-center gap-2 font-medium text-slate-800">
                                    @unless ($message->is_read)
                                        <span class="h-2 w-2 shrink-0 rounded-full bg-indigo-500"></span>
                                    @endunless
                                    {{ $message->subject }}
                                </p>
                                <p class="truncate text-sm text-slate-500">{{ $message->name }} · {{ $message->email }}</p>
                                <p class="mt-1 line-clamp-2 text-sm text-slate-400">{{ $message->body }}</p>
                            </div>
                            <time class="shrink-0 text-xs text-slate-400">{{ $message->created_at->diffForHumans() }}</time>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            {{ $messages->links() }}
        </div>
    @endif
@endsection
