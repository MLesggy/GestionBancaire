<!-- Appel de la page auth pour empecher l'accès a cette page si on est pas connecté -->
<?php require_once __DIR__ . '/../auth.php'; ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Banque/style/headerStyle.css">
    <link rel="stylesheet" href="/Banque/style/ficheCompte.css">
    <title>Ajouter des contrats</title>
</head>

<body>




    <!-- Formulaire HTML pour ajouter un client -->
    <nav class="enTete">
        <div class="container">
            <h1>
                🗒️ Ajouter un contrat
            </h1>
            <div class="deco">
                <a class="nav-link" href="/Banque/index.php?action=logout">
                    Déconnexion
                </a>
            </div>
    </nav><br>

    <h2> Ajouter un contrat </h2>
    <div class="containerC">
        <form id="formContrat" method="POST" action="/Banque/routeur.php?action=ajouterContrat">
            <label for="type_contrat">Type de contrat </label>
            <select name="type_contrat" id="type_contrat">
                <option value="assurance_vie"> Assurance vie </option>
                <option value="assurance_habitation"> Assurance Habitation </option>
                <option value="credit_immobilier"> Credit Immobilier</option>
                <option value="credit_conso"> Credit à la Consommation </option>
                <option value="CEL"> Compte Epargne Logement (CEL) </option>
            </select>

            <label for="montant_contrat">Montant du contrat </label>
            <input type="number" name="montant_contrat" id="montant_contrat">
            <div id="erreurMontant"></div><br>

            <label for="duree_contrat">Durée (en nombre de mois) </label>
            <input type="number" name="duree_contrat" id="duree_contrat">
            <div id="erreurDuree"></div><br>

            <input id="id_client" type="number" name="id_client" placeholder="ID du client">
            <div id="erreurID"></div><br>
            <button type="submit">Ajouter Contrat</button>
            <a href="/Banque/dashboard.php">
                <button type="button">Retour au tableau de bord</button>
            </a>
        </form>
    </div>
    <script src="/Banque/JS/ajouterContrat.js"></script>
</body>

</html>