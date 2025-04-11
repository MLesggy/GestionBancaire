<!-- Appel de la page auth pour empecher l'accès a cette page si on est pas connecté -->
<?php require_once __DIR__ . '/../auth.php'; ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Banque/style/headerStyle.css">
    <link rel="stylesheet" href="/Banque/style/ficheCompte.css">
    <title>Ajouter des clients</title>
</head>

<body>




    <!-- Formulaire HTML pour ajouter un client -->
    <nav class="enTete">
        <div class="container">
            <h1>
                🗒️ Ajouter un client
            </h1>
            <div class="deco">
                <a class="nav-link" href="/Banque/index.php?action=logout">
                    Déconnexion
                </a>
            </div>
    </nav><br>



    <h2> Ajouter un client </h2>
    <div class="containerC">
        <form id="formClient" method="POST" action="/Banque/routeur.php?action=ajouter">
            <label for="nom_client">Nom</label>
            <input type="text" name="nom_client" id="nom_client">
            <div id="erreurNom"></div><br>

            <label for="prenom_client">Prénom</label>
            <input type="text" name="prenom_client" id="prenom_client">
            <div id="erreurPrenom"></div><br>

            <label for="email_client">Email</label>
            <input type="email" name="email_client" id="email_client">
            <div id="erreurEmail"></div><br>

            <label for="telephone_client">Téléphone</label>
            <input type="text" name="telephone_client" id="telephone_client">
            <div id="erreurTelephone"></div><br>

            <label for="adresse_client">Adresse</label>
            <input type="text" name="adresse_client" id="adresse_client">
            <div id="erreurAdresse"></div><br>

            <button type="submit">Ajouter Client</button>
            <a href="/Banque/dashboard.php">
                <button type="button">Retour au tableau de bord</button>
            </a>
        </form>
    </div>
    <script src="/Banque/JS/ajouter.js"></script>
</body>

</html>