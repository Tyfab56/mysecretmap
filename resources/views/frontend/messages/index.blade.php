@extends('frontend.main_master')
@section('content')
<section class="messages-list-section">
    <div class="container">

    <h2>Envoyer un Message à l'Administrateur</h2>
        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="body">Message :</label>
                <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <h2>Messages</h2>
       
        <table class="table">
            <thead>
                <tr>
                    <th>Sujet</th>
                    <th>De</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               @forelse($messages as $message)
                    <tr class="{{ is_null($message->read_at) ? 'table-warning' : '' }}">
                        <td>
                            <img src="{{ $message->sender->avatar ?? asset('path/to/default/avatar.jpg') }}" alt="avatar" style="width: 30px; height: 30px; border-radius: 50%;">
                            {{ Str::limit($message->body, 200) }}
                        </td>
                        <td>{{ $message->sender->name ?? 'Administrateur' }}</td>
                        <td>{{ $message->created_at }}</td>
                        <td>
                            <a href="{{ route('messages.show', $message->id) }}" class="btn btn-sm btn-info">Voir</a>
                            <form action="{{ route('messages.markAsRead', $message->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Marquer comme lu</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Aucun message à afficher.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
