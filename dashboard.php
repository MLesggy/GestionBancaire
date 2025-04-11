<?php
if (!isset($nbClients) || !isset($nbComptes) || !isset($nbContrats)) {
    // Redirection vers le routeur pour définir les variables $nbClients et $nbComptes
    header("Location: routeur.php?action=dashboard");
    exit;
}
require_once __DIR__ . '/auth.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Banque/style/headerStyle.css">
    <link rel="stylesheet" href="/Banque/style/dashboardStyle.css">
</head>



<body>
    <nav class="enTete">
        <div class="container">
            <h1>
                🗒️ Bienvenue sur le tableau de bord de la Banque à Picsou
            </h1>
            <div class="deco">
                <a class="nav-link" href="/Banque/index.php?action=logout">
                    Déconnexion
                </a>
            </div>
    </nav>

    <h2>
        Que faisons nous aujourd'hui?
    </h2>
    <br>
    <!-- Liste des actions possible via le dashboard -->
    <div class="containerC">
        <div class="box">
            <a href="routeur.php?action=liste">Gerer les clients 📖</a>
        </div>
        <div class="box">
            <a href="view/viewCompte.php"> ​ On gère les comptes 💸</a>
        </div>
        <div class="box">
            <a href="routeur.php?action=voirContrat">On gère les contrats 📝</a>
        </div>

    </div>
    <br>
    <hr>
    <br>
    <br>
    <div class="containerD">
        <div>
            <p> Nombre total de client enregistrés : <strong> <?= $nbClients ?></strong></p>
        </div>
        <div>
            <p> Nombre de compte bancaire ouverts : <strong><?= $nbComptes ?></strong></p>
        </div>
        <div>
            <p> Nombre de contrat souscrits : <strong><?= $nbContrats ?></strong></p>
        </div>
    </div>
</body>

</html>