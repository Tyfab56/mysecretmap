@extends('frontend.main_master')
@section('content')
<section class="message-details-section">
    <div class="container">
        <h2>{{ $message->subject }}</h2>
        <p>De : {{ $message->sender->name ?? 'Inconnu' }}</p>
        <p>Date : {{ $message->created_at->format('d/m/Y H:i') }}</p>
        <div class="message-body">
            <p>{{ $message->body }}</p>
        </div>
        <a href="{{ route('messages.index') }}" class="btn btn-secondary">Retour à la liste des messages</a>
    </div>
</section>
@endsection
