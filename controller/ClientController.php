<?php

require_once __DIR__ . '/../models/Request/ClientRequest.php';

class ClientController
{
    public function deconnexion()
    {
        session_unset(); // Supprimer toutes les variables de session
        session_destroy(); // Détruire la session
        header('Location: /Banque/index.php'); // Redirection vers index.php
        exit();
    }

    public function lister() // permet de generer un tableau avec la liste de tout les clients
    {
        $clientRequest = new ClientRequest();
        $clients = $clientRequest->getClients();
        require_once __DIR__ . '/../view/viewClient.php';
    }

    public function voir() // permet d'afficher un seul client avec toutes ces infos
    {
        // Vérifier si l'ID du compte est bien passé via l'URL
        if (isset($_GET['id_client']) && is_numeric($_GET['id_client'])) {
            $id_compte = $_GET['id_client'];
            // Créer une instance de CompteRequest pour récupérer les données du compte
            $clientRequest = new ClientRequest();
            $client = $clientRequest->getClient($id_compte); // Récupère les détails du compte

            if ($client === null) {
                echo "Le client demandé n'existe pas.";
                exit;
            }
            // Passer le compte à la vue pour affichage
            require_once __DIR__ . '/../view/ficheClient.php';
        } else {
            echo "ID de compte invalide.";
            exit;
        }
    }
    // CRUD client
    public function ajouter()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // empeche l'accès a la page si ça ne vient pas du formulaire'
            // Récupérer les données du formulaire
            $nom = $_POST['nom_client'];
            $prenom = $_POST['prenom_client'];
            $email = $_POST['email_client'];
            $telephone = $_POST['telephone_client'];
            $adresse = $_POST['adresse_client'];

            // Validation des données
            if (empty($nom) || !preg_match("/^[A-Za-zÀ-ÿ\s\-']{2,}$/", $nom)) {
                echo "Nom invalide.";
                exit;
            }
            if (empty($prenom) || !preg_match("/^[A-Za-zÀ-ÿ\s\-']{2,}$/", $prenom)) {
                echo "Prénom invalide.";
                exit;
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email invalide.";
                exit;
            }
            if (empty($telephone) || !preg_match("/^\d{10}$/", $telephone)) {
                echo "Téléphone invalide.";
                exit;
            }
            if (empty($adresse) || strlen($adresse) < 5) {
                echo "Adresse trop courte.";
                exit;
            }
            // Créer un objet Client avec les données du formulaire
            $client = new Client();
            $client->setNom_client($nom);
            $client->setPrenom_client($prenom);
            $client->setEmail_client($email);
            $client->setTelephone_client($telephone);
            $client->setAdresse_client($adresse);

            // Ajouter le client à la base de données
            $clientRequest = new ClientRequest();
            if ($clientRequest->ajouter($client)) {

                header('Location: routeur.php?action=liste');
                exit();
            } else {
                echo "Erreur lors de l'ajout du client.";
            }
        }
    }

    public function modifier()
    {

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            // Récupérer l'ID du client à modifier
            $clientId = $_GET['id'];
            // Créer un objet ClientRequest pour récupérer les données du client
            $clientRequest = new ClientRequest();
            $client = $clientRequest->getClient($clientId);

            if ($client === null) {
                echo "Client introuvable.";
                exit;
            }

            // Si le formulaire est soumis pour modifier le client
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $nom = htmlspecialchars($_POST['nom_client']);
                $prenom = htmlspecialchars($_POST['prenom_client']);
                $email = htmlspecialchars($_POST['email_client']);
                $telephone = htmlspecialchars($_POST['telephone_client']);
                $adresse = htmlspecialchars($_POST['adresse_client']);

                // Validation des données
                if (empty($nom) || !preg_match("/^[A-Za-zÀ-ÿ\s]+$/", $nom)) {
                    error_log("Nom invalide pour client ID $clientId");
                    exit;
                }
                if (empty($prenom) || !preg_match("/^[A-Za-zÀ-ÿ\s]+$/", $prenom)) {
                    echo "Prénom invalide.";
                    exit;
                }
                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "Email invalide.";
                    exit;
                }
                if (empty($telephone) || !preg_match("/^\d{10}$/", $telephone)) {
                    echo "Téléphone invalide.";
                    exit;
                }
                if (empty($adresse)) {
                    echo "L'adresse ne peut pas être vide.";
                    exit;
                }
                // Mettre à jour l'objet Client
                $client->setNom_client($nom);
                $client->setPrenom_client($prenom);
                $client->setEmail_client($email);
                $client->setTelephone_client($telephone);
                $client->setAdresse_client($adresse);
                // Appeler la méthode pour mettre à jour le client dans la base de données
                if ($clientRequest->modifier($client)) {
                    header('Location: routeur.php?action=liste');
                    exit();
                } else {
                    echo "Erreur lors de la modification du client.";
                }
            }
            // Afficher la vue de modification
            require_once __DIR__ . '/../view/modifier.php'; // Inclure le fichier de la vue
        } else {
            echo "ID invalide.";
            exit;
        }
    }
    public function supprimer()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $clientId = $_GET['id'];
            // Créer un objet ClientRequest pour supprimer le client
            $clientRequest = new ClientRequest();
            //condition if pour bloquer la suppression du client s'il a un compte bancaire
            if ($clientRequest->clientAvecCompte($clientId)) {
                header('Location: routeur.php?action=liste&erreur=compte_existant&id=' . $clientId);
                exit();
            } else {
                if ($clientRequest->supprimer($clientId)) {
                    header("Location: routeur.php?action=liste"); // Redirige vers la liste des clients
                    exit();
                } else {
                    echo "Erreur lors de la suppression du client.";
                }
            }
        } else {
            echo "ID du client invalide";
        }
    }
}