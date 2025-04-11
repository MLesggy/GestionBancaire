<?php

// page dédiée à la protection des pages sensibles. S'il l'admin n'est pas connecté, l'accès sera refusé. 

// auth.php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: /Banque/index.php'); // on renvoit l'utilisateur sur la page d'authentification
    exit;
}
