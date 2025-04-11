<!-- Appel de la page auth.php pour sécuriser la page  -->
<?php require_once __DIR__ . '/../auth.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter des comptes bancaires</title>
    <link rel="stylesheet" href="/Banque/style/headerStyle.css">
    <link rel="stylesheet" href="/Banque/style/ficheCompte.css">
</head>

<body>

    <nav class="enTete">
        <div class="container">
            <h1>
                🗒️ Ajouter un compte
            </h1>
            <div class="deco">
                <a class="nav-link" href="/Banque/index.php?action=logout">
                    Déconnexion
                </a>
            </div>
    </nav><br>

    <div class="container">
        <form action="/Banque/routeur.php?action=ajouterCompte" method="POST" id="formCompte">
            <label for="rib_compte">RIB Compte:</label>
            <input type="text" id="rib_compte" name="rib_compte" required>
            <div id="erreur_rib"></div>

            <select name="type_compte" required id="type_compte">
                <option value="compte courant">Compte Courant</option>
                <option value="compte épargne">Compte Épargne</option>
            </select>

            <input id="solde" type="number" step="0.01" name="solde_compte" placeholder="Solde du compte" required
                id="solde">
            <div id="erreurSolde"></div>
            <input id="id_client" type="number" name="id_client" placeholder="ID du client" required>




            <button type="submit">Ajouter Compte</button>
        </form>
    </div>
    <div class="button">
        <a href="/Banque/routeur.php?action=listerCompte">
            <button type="button">Retour à la liste des comptes</button>
        </a>
    </div>
    <script src="/Banque/JS/ajouterCompte.js"></script>
</body>

</html>