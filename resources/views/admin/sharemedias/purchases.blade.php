@extends('frontend.main_master')


@section('content')
    <div class="container">
        <h2>Derniers achats de médias par les utilisateurs</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Média</th>
                    <th>Vignette</th>
                    <th>Date d'achat</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($purchases as $user)
                    @foreach ($user->purchasedMedias as $purchase)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $purchase->title }}</td>
                            <td>
                                @if ($purchase->thumbnail_link)
                                    <!-- Vérifiez que le lien de la vignette existe -->
                                    <img src="{{ $purchase->thumbnail_link }}" alt="Vignette" style="width: 200px; height: auto;">
                                @else
                                    Pas de vignette
                                @endif
                            </td>
                            <td>{{ $purchase->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        {{ $purchases->links() }} <!-- Afficher la pagination -->
    </div>
@endsection
