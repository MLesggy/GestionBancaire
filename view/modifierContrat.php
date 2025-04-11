<!-- Appel de la page auth.php pour sécuriser l'accès -->
<?php
require_once __DIR__ . '/../auth.php'; ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Banque/style/headerStyle.css">
    <link rel="stylesheet" href="/Banque/style/ficheCompte.css">
    <title>Modifier contrat</title>
</head>

<body>





    <nav class="enTete">
        <div class="container">
            <h1>
                🗒️ Bienvenue sur la modification du contrat
            </h1>
            <div class="deco">
                <a class="nav-link" href="/Banque/index.php?action=logout">
                    Déconnexion
                </a>
            </div>
    </nav><br>




    <h2>Modifier le contrat</h2>
    <form action="routeur.php?action=modifierContrat&id_contrat=<?= $contrat->getId_contrat() ?>" method="POST"
        class="containerC">


        <label for="montant_contrat">Montant:</label>
        <input type="number" name="montant_contrat" value="<?= $contrat->getMontant_contrat() ?>" step="0.01"
            min="0"><br>

        <label for="duree_contrat">Durée (mois):</label>
        <input type="number" name="duree_contrat" value="<?= $contrat->getDuree_contrat() ?>" step="1" min="1"><br>


        <button type="submit">Mettre à jour</button>
    </form>
    <a href="routeur.php?action=voirContrat">
        <button class="button">
            Retour à la liste des contrat
        </button>
    </a>
    </form>
    <script src="/Banque/JS/modifierContrat.js"></script>
</body>

</html>