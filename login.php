<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Assigner les informations de l'administrateur
    $admin_email = 'OnclePicsou@richesse.com';
    $admin_password = 'richeyes';

    // Vérifier si l'email et le mot de passe correspondent à l'administrateur
    if ($email === $admin_email && $password === $admin_password) {
        // Connexion réussie, on peut enregistrer dans la session l'état connecté
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['email'] = $email; // On stocke l'email dans la session

        // Rediriger vers le dashboard quand c'est ok
        header('Location: /Banque/dashboard.php');
        exit();
    } else {
        // Si les informations sont incorrectes
        echo "Email ou mot de passe incorrect.";
    }
}
