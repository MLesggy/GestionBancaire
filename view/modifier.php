<?php require_once __DIR__ . '/../template/header.php';
require_once __DIR__ . '/../auth.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un client </title>
    <link rel="stylesheet" href="/Banque/style/ficheCompte.css">
</head>

<body>
    <h2 class="mb-4">
        ✏️ Modifier un client
    </h2>
    <!-- Formulaire de modification du client -->
    <div class="containerC">
        <form id="formClient" action="routeur.php?action=modifier&id=<?= $client->getId_client() ?>" method="POST">
            <label for="nom_client">
                Nom
            </label>
            <input type="text" id="nom_client" name="nom_client"
                value="<?= htmlspecialchars($client->getNom_client()) ?>">
            <div id="erreurNom"></div>
            <br>
            <label for="prenom_client">
                Prénom
            </label>
            <input type="text" id="prenom_client" name="prenom_client"
                value="<?= htmlspecialchars($client->getPrenom_client()) ?>">
            <div id="erreurPrenom"></div>
            <br>

            <label for="email_client">
                Email
            </label>
            <input type="email" id="email_client" name="email_client"
                value="<?= htmlspecialchars($client->getEmail_client()) ?>">
            <div id="erreurEmail"></div>
            <br>

            <label for="telephone_client">
                Téléphone
            </label>
            <input type="text" id="telephone_client" name="telephone_client"
                value="<?= htmlspecialchars($client->getTelephone_client()) ?>">
            <div id="erreurTelephone"></div>
            <br>

            <label for="adresse_client">
                Adresse
            </label>
            <input type="text" id="adresse_client" name="adresse_client"
                value="<?= htmlspecialchars($client->getAdresse_client()) ?>">
            <div id="erreurAdress"></div>
            <br>

            <button type="submit">
                Mettre à jour
            </button>
            <a href="routeur.php?action=liste">
                <button class="button">
                    Retour à la liste des clients
                </button>
            </a>
        </form>
    </div>
    <script src="/Banque/JS/modifier.js"></script>
</body>


</html>