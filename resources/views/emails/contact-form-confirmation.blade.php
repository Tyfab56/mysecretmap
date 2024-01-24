<!DOCTYPE html>
<html>
<head>
    <title>Confirmation de soumission de formulaire</title>
</head>
<body>
    <h1>Merci pour votre soumission !</h1>
    <p>Votre formulaire de contact a été soumis avec succès avec les détails suivants :</p>
    <ul>
        <li><strong>Nom:</strong> {{ $nom }}</li>
        <li><strong>Prénom:</strong> {{ $prenom }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Message:</strong> {{ $texte }}</li>
    </ul>
    <p>Nous vous répondrons dès que possible.</p>
</body>
</html>