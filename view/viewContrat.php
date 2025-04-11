<?php require_once __DIR__ . '/../auth.php'; ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des contrat</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
    </style>
    <link rel="stylesheet" href="/Banque/style/headerStyle.css">
    <link rel="stylesheet" href="/Banque/style/viewStyle.css">
</head>


<nav class="enTete">
    <div class="container">
        <h1>
            🗒️ Bienvenue sur la liste des contrats
        </h1>
        <div class="deco">
            <a class="nav-link" href="/Banque/index.php?action=logout">
                Déconnexion
            </a>
        </div>
</nav><br>



<body>


    <table>
        <thead>
            <tr>
                <th>ID contrat</th>
                <th>Type de contrat</th>
                <th>Montant</th>
                <th>Durée</th>
                <th>Nom du client associé</th>
            </tr>
        </thead>
        <tbody></tbody>

        <?php if (!empty($contrats)): ?>
            <?php foreach ($contrats as $contrat): ?>
                <tr>
                    <td><?= htmlspecialchars($contrat->getId_contrat()) ?></td> <!-- ajout ID -->
                    <td><?= htmlspecialchars($contrat->getType_contrat()) ?></td>
                    <td><?= htmlspecialchars($contrat->getMontant_contrat()) ?></td>
                    <td><?= htmlspecialchars($contrat->getDuree_contrat()) ?></td>
                    <td><?= htmlspecialchars($contrat->getclient_associe()) ?></td>

                    <td>
                        <!-- Boutons Voir, Modifier et Supprimer -->
                        <a href="routeur.php?action=voirContrat&id_contrat=<?= $contrat->getId_contrat() ?>">
                            <button class="btn btn-voir">
                                Voir
                            </button>
                        </a>
                        <a href="routeur.php?action=modifierContrat&id_contrat=<?= $contrat->getId_contrat() ?>">
                            <button class="btn btn-modifier">
                                Modifier
                            </button>
                        </a>
                        <a href="routeur.php?action=supprimerContrat&id_contrat=<?= $contrat->getId_contrat() ?>"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?')">
                            <button class="btn btn-supprimer">
                                Supprimer
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun client trouvé.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <br>
    <a href="/Banque/dashboard.php">
        <button type="button">Retour au tableau de bord</button>
    </a>
    <a href="/Banque/view/ajouterContrat.php">
        <button type="button">Ajouter un contrat</button>
    </a>
</body>

</html>