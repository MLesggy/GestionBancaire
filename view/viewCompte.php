<?php
require_once __DIR__ . "/viewCompte.php";
require_once __DIR__ . '/../models/Request/CompteRequest.php';
require_once __DIR__ . '/../auth.php';

$compteRequest = new CompteRequest();
$comptes = $compteRequest->getComptes(); // Récupère tous les comptes
require_once 'viewCompte.php'; // Affiche la vue
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des comptes</title>
    <link rel="stylesheet" href="/Banque/style/headerStyle.css">
    <link rel="stylesheet" href="/Banque/style/viewStyle.css">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
</head>


<body>

    <nav class="enTete">
        <div class="container">
            <h1>
                🗒️ Bienvenue sur la liste des comptes
            </h1>
            <div class="deco">
                <a class="nav-link" href="/Banque/index.php?action=logout">
                    Déconnexion
                </a>
            </div>
    </nav><br>




    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>RIB</th>
                <th>Type de compte</th>
                <th>Solde</th>
                <th>Client Associé</th>
                <th> Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($comptes)): ?>
                <?php foreach ($comptes as $compte): ?>
                    <tr>
                        <!-- ID du compte dans la première colonne -->
                        <td><?= htmlspecialchars($compte->getIdCompte()) ?></td>
                        <!-- RIB du compte dans la deuxième colonne -->
                        <td><?= htmlspecialchars($compte->getRib()) ?></td>
                        <!-- Type du compte dans la troisième colonne -->
                        <td><?= htmlspecialchars($compte->getTypeCompte()) ?></td>
                        <!-- Solde du compte dans la quatrième colonne -->
                        <td><?= htmlspecialchars($compte->getSolde()) ?> EUR</td>
                        <!-- ID du client dans la cinquième colonne -->
                        <td><?= htmlspecialchars($compte->getIdClient()) ?></td>
                        <!-- Colonne avec le bouton Modifier -->

                        <td><a href="/Banque/routeur.php?action=ficheCompte&id_compte=<?= $compte->getIdCompte() ?>"><button>
                                    Voir</button></a>
                            <a href="/Banque/routeur.php?action=modifierCompte&id_compte=<?= $compte->getIdCompte() ?>">
                                <button class="btn btn-modifier">Modifier</button>
                            </a>
                            <a href="/Banque/routeur.php?action=supprimerCompte&id_compte=<?= $compte->getIdCompte() ?>"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte bancaire ?')"><button>
                                    Supprimer</button></a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucun compte trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <a href="/Banque/dashboard.php">
        <button type="button">Retour au tableau de bord</button>
    </a>
    <a href="/Banque/view/ajoutCompte.php">
        <button type="button">Ajouter un compte</button>
    </a>

</body>