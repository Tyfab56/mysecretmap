@extends('frontend.main_master')
@section('content')
<section class="messages-list-section">
    <div class="container">
        <h2>Messages</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="messages">
            @forelse($messages as $message)
                <div class="message">
                    <h3>{{ $message->subject }}</h3>
                    <p>De : {{ $message->sender->name ?? 'Inconnu' }}</p>
                    <a href="{{ route('messages.show', $message->id) }}">Lire le message</a>
                    <form action="{{ route('messages.markAsRead', $message->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-primary">Marquer comme lu</button>
                    </form>
                </div>
            @empty
                <p>Aucun message à afficher.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
