<!-- Appel de la page auth.php pour sécuriser l'accès -->
<?php require_once __DIR__ . '/../auth.php'; ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des clients</title>
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
            🗒️ Bienvenue sur la liste des clients
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
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($clients)): ?>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?= htmlspecialchars($client->getId_client()) ?></td> <!-- ajout ID -->
                        <td><?= htmlspecialchars($client->getNom_client()) ?></td>
                        <td><?= htmlspecialchars($client->getPrenom_client()) ?></td>
                        <td><?= htmlspecialchars($client->getEmail_client()) ?></td>
                        <td><?= htmlspecialchars($client->getTelephone_client()) ?></td>
                        <td><?= htmlspecialchars($client->getAdresse_client()) ?></td>
                        <td>
                            <!-- Boutons Voir, Modifier et Supprimer -->
                            <a href="routeur.php?action=voir&id_client=<?= $client->getId_client() ?>">
                                <button class="btn btn-voir">
                                    Voir
                                </button>
                            </a>
                            <a href="routeur.php?action=modifier&id=<?= $client->getId_client() ?>">
                                <button class="btn btn-modifier">
                                    Modifier
                                </button>
                            </a>
                            <a href="routeur.php?action=supprimer&id=<?= $client->getId_client() ?>"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
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
    <!-- creation d'une div vide pour afficher un message d'erreur si une suppression est impossible car compte bancaire associé -->
    <div id="erreur"></div>

    <br>
    <a href="/Banque/dashboard.php">
        <button type="button">Retour au tableau de bord</button>
    </a>
    <a href="/Banque/view/ajoutClient.php">
        <button type="button">Ajouter un client</button>
    </a>
</body>


<script src="/Banque/JS/viewClient.js"></script>


</html>