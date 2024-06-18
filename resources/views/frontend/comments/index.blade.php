@extends('frontend.main_master')

@section('content')
<div class="container">
    <h1>{{ $spot->name }}</h1>
    <img src="{{ $spot->imgpanomedium }}" alt="{{ $spot->name }}" class="img-fluid">

    @auth
        <div class="mt-4">
            <h2>Laisser un commentaire</h2>
            <form id="commentForm">
                <div class="form-group">
                    <textarea id="commentText" class="form-control" rows="4" placeholder="Votre commentaire..."></textarea>
                </div>
                <button type="button" class="btn btn-primary mt-2" onclick="addComment({{ $spot->id }})">Ajouter</button>
            </form>
        </div>
    @endauth

    <div class="mt-4">
        <h2>Derniers commentaires</h2>
        @foreach($spot->comments as $comment)
            <div class="comment mb-3">
                <strong>{{ $comment->user->name }}</strong>: {{ $comment->comment }}
            </div>
        @endforeach
    </div>
</div>

@section('scripts')
<script>
    function addComment(spotId) {
        const comment = document.getElementById('commentText').value;
        fetch('{{ route("comments.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                spot_id: spotId,
                user_id: {{ auth()->id() }},
                pays_id: '{{ $spot->pays_id }}',
                comment: comment
            })
        }).then(response => response.json())
        .then(data => {
            if (data.success) {
                toastr.success(data.message);
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                alert('Une erreur s\'est produite.');
            }
        }).catch(error => {
            console.error('Erreur:', error);
        });
    }
</script>
@endsection

@endsection