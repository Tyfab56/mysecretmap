<!DOCTYPE html>
<html>
<head>
    <title>{{ __('mail.contactTitre') }}</title>
</head>
<body>
    <h1>{{ __('mail.contactMerci') }}</h1>
    <p>{{ __('mail.contactSucces') }}Votre formulaire de contact a été soumis avec succès avec les détails suivants :</p>
    <ul>
        <li><strong>{{ __('mail.contactNom') }}</strong> {{ $nom }}</li>
        <li><strong>{{ __('mail.contactPrenom') }}</strong> {{ $prenom }}</li>
        <li><strong>{{ __('mail.contactEmail') }}</strong> {{ $email }}</li>
        <li><strong>{{ __('mail.contactMessage') }}</strong> {{ $texte }}</li>
    </ul>
    <p>{{ __('mail.contactBack') }}</p>
</body>
</html>