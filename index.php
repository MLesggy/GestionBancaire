<?php
session_start();
require_once __DIR__ . '/lib/database.php';
require_once __DIR__ . '/models/Client.php';
require_once __DIR__ . '/models/Admin.php';
require_once __DIR__ . '/models/Request/ClientRequest.php';
require_once __DIR__ . '/controller/ClientController.php';
require_once __DIR__ . '/template/indexheader.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Banque/style/indexStyle.css">
</head>

<body>
    <h2>
        Merci de vous connecter à votre espace
    </h2>
    <!-- Formulaire de connexion -->
    <form action="login.php" method="POST">
        <div class="boxConnect">
            <!-- Champ email -->
            <label for="email">
                Email :
            </label><br>
            <input type="email" id="email" name="email" placeholder="Email" required><br>
            <!-- Champ mot de passe -->
            <label for="password">
                Mot de passe :
            </label><br>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required><br>
            <!-- Bouton de soumission du formulaire -->
            <button type="submit" class="box">
                Connexion
            </button>
        </div>
    </form>
</body>

</html>