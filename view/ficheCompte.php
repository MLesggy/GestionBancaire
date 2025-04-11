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
                🗒️ Bienvenue sur la fiche du compte
            </h1>
            <div class="deco">
                <a class="nav-link" href="/Banque/index.php?action=logout">
                    Déconnexion
                </a>
            </div>
    </nav><br>





    <h2>Détails du Compte</h2>

    <div class="containerC">


        <table>
            <tr>
                <th>ID du compte</th>
                <td><?= htmlspecialchars($compte->getIdCompte()) ?></td>
            </tr>
            <tr>
                <th>RIB du compte</th>
                <td><?= htmlspecialchars($compte->getRib()) ?></td>
            </tr>
            <tr>
                <th>Type de compte</th>
                <td><?= htmlspecialchars($compte->getTypeCompte()) ?></td>
            </tr>
            <tr>
                <th>Solde du compte</th>
                <td><?= htmlspecialchars($compte->getSolde()) ?> EUR</td>
            </tr>
            <tr>
                <th>ID du client associé</th>
                <td><?= htmlspecialchars($compte->getIdClient()) ?></td>
            </tr>
        </table>


    </div>
    <div class="button">
        <a href="/Banque/routeur.php?action=listerCompte">
            <button type="button">Retour à la liste des comptes</button>
        </a>
    </div>
</body>

</html>