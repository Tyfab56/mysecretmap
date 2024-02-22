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
            <form action="{{ route('admin.randos.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="spot_id">Spot ID :</label>
                    <input type="text" name="spot_id" id="spot_id" class="form-control">
                </div>

                <div class="form-group">
                    <label for="pays_id">Pays ID :</label>
                    <input type="text" name="pays_id" id="pays_id" class="form-control">
                </div>

                <div class="form-group">
                    <label for="rang">Rang :</label>
                    <input type="text" name="rang" id="rang" class="form-control">
                </div>

                <div class="form-group">
                    <label for="video_link">Lien Vidéo :</label>
                    <input type="text" name="video_link" id="video_link" class="form-control">
                </div>

                <button type="button" class="btn btn-primary" onclick="toggleTranslationForm()">Ajouter des Traductions</button>
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

                <button type="submit" class="btn btn-primary">Enregistrer les Traductions</button>
            </form>
        </div>
    </div>

    <script>
        function toggleTranslationForm() {
            var x = document.getElementById("translationForm");
            x.style.display = x.style.display === "none" ? "block" : "none";
        }
    </script>

@endsection