@extends('frontend.main_master')

@section('content')
    <div class="container">
        <h2>Envoyer un message</h2>
        <form action="{{ route('admin.messages.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="recipient">Destinataire :</label>
                <select id="recipient" name="recipient" class="form-control">
                   
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea id="message" name="message" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

        <hr>

        <h2>Liste des messages</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                   <tr class="clickable-row" data-user-id="{{ $message->from_id }}">
                        <td><img src="{{ $message->sender->avatar_url }}" alt="Avatar" style="width: 50px; height: auto;">
                        @if(empty($message->sender->pseudo))
                                <!-- Si le pseudonyme est vide, affichez le prénom et le nom -->
                                {{ $message->sender->prenom }} {{ $message->sender->nom }}
                            @else
                                <!-- Sinon, affichez simplement le pseudonyme -->
                                {{ $message->sender->pseudo }}
                            @endif
                       </td>
                        <td>{{ Str::limit($message->body, 200) }}</td>
                        <td>{{ $message->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="#" class="btn btn-info">Voir</a>
                            @if ($message->to_id === auth()->id() && is_null($message->read_at))
                                <form action="{{ route('admin.messages.markAsRead', $message->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">Marquer comme lu</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                {{ $messages->links() }}
            </tbody>
        </table>
    </div>
    <script>

    // Initialiser Select2 pour le champ de sélection des destinataires
    $(document).ready(function() {
    $('#recipient').select2({
        ajax: {
            url: '{{ route("admin.users.search") }}', // URL de la route qui gère la recherche AJAX
            dataType: 'json',
            delay: 250, // Temps d'attente après la dernière frappe de touche avant de lancer la requête
            data: function (params) {
                return {
                    search: params.term // terme de recherche entré par l'utilisateur
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 1, // Nombre minimal de caractères avant de déclencher la recherche
    });
});


$('.clickable-row').click(function() {
        var userId = $(this).data('user-id'); // Récupère l'ID de l'utilisateur
        var baseUrl = "{{ route('admin.messages.index') }}?userId=";
        window.location.href = baseUrl + userId; // Redirige vers l'URL avec l'ID de l'utilisateur
    });
</script>
@endsection
