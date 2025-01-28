@extends('frontend.main_master')
@section('content')
    <style>
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1.5rem;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            text-align: center;
            color: #1a73e8;
        }

        p {
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin: 0.5rem 0;
            padding: 0.5rem;
            background: #f1f5fb;
            border-radius: 5px;
        }

        ul li span {
            font-weight: bold;
            color: #1a73e8;
        }

        .cta {
            text-align: center;
            margin-top: 2rem;
        }

        .cta a {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            color: #fff;
            background-color: #1a73e8;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .cta a:hover {
            background-color: #155bb5;
        }
    </style>

    <div class="container">
        <h1>Devenez Photographe Partenaire</h1>
        <p>
            Vous êtes photographe et souhaitez contribuer à l’un de nos guides ?
            Rejoignez-nous sur <strong>mysecretmap.com</strong> et partagez votre vision unique du monde.
            Ensemble, mettons en lumière des destinations d’exception à travers votre objectif ! 🌍📸
        </p>

        <h2>Pourquoi participer ?</h2>
        <ul>
            <li><span>💰 Collaboration rémunérée :</span> percevez un minimum de <strong>40 % de commission</strong> (après
                déduction de la distribution) au prorata de votre contribution.</li>
            <li><span>📢 Visibilité garantie :</span> votre travail sera mis en avant sur notre plateforme et crédité dans
                nos guides.</li>
            <li><span>🔓 Liberté totale :</span> conservez vos droits sur vos médias, sans exclusivité.</li>
        </ul>

        <h2>Quels contenus recherchons-nous ?</h2>
        <ul>
            <li>📸 <strong>Photos</strong> haute qualité</li>
            <li>🌀 <strong>Vues à 360°</strong> immersives</li>
            <li>🎥 <strong>Vidéos</strong> captivantes</li>
        </ul>

        <h2>Comment participer ?</h2>
        <p>
            <strong>1.</strong> Inscrivez-vous gratuitement sur notre plateforme.<br>
            <strong>2.</strong> Contactez-nous pour obtenir le statut de photographe partenaire.<br>
            <strong>3.</strong> Contribuez en photographiant des lieux uniques et des aspects culturels de votre région.
        </p>

        <h2>Conditions requises :</h2>
        <p>
            - Avoir un <strong>statut professionnel</strong> ou une <strong>société</strong> pour pouvoir facturer.<br>
            - Être passionné par la découverte et l’envie de révéler les trésors de votre région.
        </p>

        <div class="cta">
            <a href="https://mysecretmap.com" target="_blank">Rejoindre la communauté</a>
        </div>
    </div>
@endsection
