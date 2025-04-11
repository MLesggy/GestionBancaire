<!-- Appel de la page auth.php pour sécuriser l'accès -->
<?php require_once __DIR__ . '/../auth.php'; ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Banque/style/headerStyle.css">
    <link rel="stylesheet" href="/Banque/style/ficheCompte.css">
    <title>Modifier compte</title>
</head>

<body>

</body>

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




    <h2 style="text-align:center;">Modifier le compte</h2>
    <form id="formCompte" action="routeur.php?action=modifierCompte&id_compte=<?= $compte->getIdCompte() ?>"
        method="POST">
        <label for="type_compte">
            Type de compte
        </label>
        <SELECT name="type_compte">
            <option value="Compte courant">Compte courant</option>
            <option value="Compte epargne"> Compte épargne</option>
        </SELECT>

        <input type="number" id="solde_compte" name="solde_compte" value="<?= $compte->getSolde() ?>">
        <div id="erreursolde"></div>
        <br>

        <button type="submit">
            Mettre à jour
        </button>
        <a href="routeur.php?action=listerCompte">
            <button class="button">
                Retour à la liste des clients
            </button>
        </a>
    </form>
    <script src="/Banque/JS/modifierCompte.js"></script>
</body>

</html>