@extends('frontend.main_master')
@section('content')
<title>Ajouter une nouvelle randonnée</title>
    <style>
        .container {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        select,
        textarea,
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .form-section {
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }

        .form-section:last-child {
            border: none;
        }

        .form-section h3 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter une nouvelle randonnée</h2>

        {{-- Premier formulaire pour les champs principaux --}}
        <div class="form-section">
        <form id="baseInfoForm" action="{{ route('admin.randos.storeBaseInfo') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="spot_search">Recherche de Spot :</label>
                <input type="text" id="spot_search" class="form-control" placeholder="Commencez à taper le nom du spot...">
            </div>

            <div class="form-group">
                <label for="spot_id">Spot ID :</label>
                <select name="spot_id" id="spot_id" class="form-control">
                    <option value="">Sélectionnez un spot</option>
                    <!-- Les options seront ajoutées ici par jQuery -->
                </select>
            </div>

           

            <button type="submit" class="btn btn-primary">Enregistrer les Informations de Base</button>
        </form>
    </div>

        {{-- Second formulaire pour les traductions --}}
        <div id="translationForm" class="form-section" style="display:none;">
            <h3>Traductions</h3>
            <form action="{{ route('admin.randos.storeTranslations') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="language">Sélectionnez la langue :</label>
                    <select name="language" id="language" class="form-control">
                        <option value="en">Anglais</option>
                        <option value="fr">Français</option>
                        {{-- Ajoutez d'autres options de langue ici --}}
                    </select>
                </div>

                <div class="form-group">
                    <label for="titre">Titre :</label>
                    <input type="text" name="titre" id="titre" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                </div>

                <div class="form-group">
                        <label for="video_link">Lien Vidéo :</label>
                        <input type="text" name="video_link" id="video_link" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer les Traductions</button>
            </form>
        </div>
    </div>

   
    <script>
$(document).ready(function() {
    $('#spot_search').on('keyup', function() {
        var query = $(this).val();

        $.ajax({
            url: "{{ route('admin.spots.search') }}",
            type: "GET",
            data: {'query': query},
            success: function(data) {
                $('#spot_id').html(data.html);
            },
            error: function(xhr) {
    // Affichage des messages d'erreur de validation
    if (xhr.status === 422) { // Vérification du code de statut 422
        let errors = xhr.responseJSON.errors;
        console.error(errors);
        // Traiter et afficher les messages d'erreur ici
        // Par exemple, vous pourriez vouloir afficher ces messages à côté des champs concernés
    }
}
        });
        // Empêchez l'envoi de formulaire si le champ est vide
        if (query == '') {
            $('#spot_id').html('<option value="">Sélectionnez un spot</option>');
        }
    });
});

$('#baseInfoForm').on('submit', function(e) {
    e.preventDefault(); // Empêcher la soumission standard du formulaire

    $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: $(this).serialize(), // Sérialiser les données du formulaire
        success: function(response) {
            // Afficher la section des traductions si la soumission est réussie
            $('#translationForm').show();
        },
        error: function(xhr, status, error) {
            // Gérer l'erreur
            alert("Une erreur est survenue. Veuillez réessayer.");
        }
    });
});
</script>



@endsection