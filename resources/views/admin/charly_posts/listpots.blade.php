@extends('frontend.main_master')
@section('content')
<h2>Liste des Charly Posts</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Video Link</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->titre }}</td>
            <td>{{ $post->description }}</td>
            <td>{{ $post->video_link }}</td>
            <td>
                <a href="{{ route('charly-posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                <!-- Vous pouvez ajouter d'autres actions comme supprimer, voir les détails, etc. -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }} <!-- Ceci est pour la pagination -->

@endsection