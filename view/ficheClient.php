<?php require_once __DIR__ . '/../auth.php'; ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Compte</title>
    <link rel="stylesheet" href="/Banque/style/ficheCompte.css">
    <link rel="stylesheet" href="/Banque/style/headerStyle.css">
</head>




<body>

    <nav class="enTete">
        <div class="container">
            <h1>
                🗒️ Bienvenue sur la fiche client
            </h1>
            <div class="deco">
                <a class="nav-link" href="/Banque/index.php?action=logout">
                    Déconnexion
                </a>
            </div>
    </nav><br>


    <h2>Détails du client</h2>

    <div class="containerC">


        <table>
            <tr>
                <th>ID du compte</th>
                <td><?= htmlspecialchars($client->getId_client()) ?></td>
            </tr>
            <tr>
                <th>Nom</th>
                <td><?= htmlspecialchars($client->getNom_client()) ?></td>
            </tr>
            <tr>
                <th>Prenom</th>
                <td><?= htmlspecialchars($client->getPrenom_client()) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($client->getEmail_client()) ?> </td>
            </tr>
            <tr>
                <th>Telephone</th>
                <td><?= htmlspecialchars($client->getTelephone_client()) ?></td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td><?= htmlspecialchars($client->getAdresse_client()) ?></td>
            </tr>
        </table>


    </div>
    <div class="button">
        <a href="/Banque/routeur.php?action=liste">
            <button type="button">Retour à la liste des clients</button>
        </a>
    </div>
</body>

</html>