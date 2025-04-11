<?php

require_once __DIR__ . '/../models/Request/CompteRequest.php';

class CompteController
{
    public function deconnexion()
    {
        session_unset(); // Supprimer toutes les variables de session
        session_destroy(); // Détruire la session
        header('Location: /Banque/index.php'); // Redirection vers index.php
        exit();
    }

    public function lister() // permet de generer un tableau regroupant tout les comptes
    {
        $compteRequest = new CompteRequest();
        $comptes = $compteRequest->getComptes();
        require_once __DIR__ . '/../view/viewCompte.php'; // page HTML
    }
    public function listerC()
    {
        header('Location: /Banque/view/viewCompte.php');
        exit();
    }
    public function ficheCompte() // voir la fiche détaillé d'un seul compte 
    {
        // Vérifier si l'ID du compte est bien passé via l'URL
        if (isset($_GET['id_compte']) && is_numeric($_GET['id_compte'])) {
            $id_compte = $_GET['id_compte'];
            // Créer une instance de CompteRequest pour récupérer les données du compte
            $compteRequest = new CompteRequest();
            $compte = $compteRequest->getCompteById($id_compte);

            if ($compte === null) {
                echo "Le compte demandé n'existe pas.";
                exit;
            }
            // Passer le compte à la vue pour affichage
            require_once __DIR__ . '/../view/ficheCompte.php';
        } else {
            echo "ID de compte invalide.";
            exit;
        }

    }
    // CRUD Compte bancaire
    public function ajouterC()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $rib_compte = $_POST['rib_compte'] ?? null;
            $type_compte = $_POST['type_compte'] ?? null;
            $solde_compte = $_POST['solde_compte'] ?? null;
            $id_client = $_POST['id_client'] ?? null;
            // Créer une instance de CompteRequest
            $compteRequest = new CompteRequest();
            // Vérifier si l'ID client existe
            if (!$compteRequest->verifierExistenceClient($id_client)) {
                // Redirection vers une page d'erreur si le client n'existe pas
                header('Location: /Banque/view/404.php');
                exit();
            }
            // Créer un objet CompteBancaire
            $compte = new CompteBancaire($rib_compte, $type_compte, $solde_compte, $id_client);
            // Ajouter le compte à la BDD
            $ajoutOk = $compteRequest->ajouter($compte);

            if ($ajoutOk) {
                // Rediriger vers la liste des comptes si tout est OK
                header('Location: /Banque/routeur.php?action=listerCompte');
                exit();
            } else {
                echo "Erreur lors de l'ajout du compte.";
            }
        } else {
            // Afficher le formulaire si la requête est GET
            require_once __DIR__ . '/../view/ajoutCompte.php'; // ton formulaire HTML ici
        }
    }
    public function modifierC()
    {
        if (isset($_GET['id_compte']) && is_numeric($_GET['id_compte'])) {
            // Récupérer l'ID du compte à modifier
            $compteId = $_GET['id_compte'];
            // Créer un objet ClientRequest pour récupérer les données du client
            $compteRequest = new CompteRequest();
            $compte = $compteRequest->getCompteById($compteId); // Récupère le client par son ID

            if ($compte === null) {
                echo "Client introuvable.";
                exit;
            }
            // Si le formulaire est soumis pour modifier le client
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $type_compte = $_POST['type_compte'];
                $solde = $_POST['solde_compte'];
                // Mettre à jour l'objet Client
                $compte->setIdCompte($compteId);
                $compte->setSolde($solde);
                // Appeler la méthode pour mettre à jour le client dans la base de données
                if ($compteRequest->modifier($compte)) {
                    header('Location: routeur.php?action=listerCompte');
                    exit();
                } else {
                    echo "Erreur lors de la modification du client.";
                }
            }
            // Afficher la vue de modification
            require_once __DIR__ . '/../view/modifierCompte.php'; // Inclure le fichier de la vue
        } else {
            echo "ID invalide.";
            exit;
        }
    }
    public function supprimerC()
    {
        if (isset($_GET['id_compte']) && is_numeric($_GET['id_compte'])) {
            $compte_id = $_GET['id_compte'];
            // Créer un objet ClientRequest pour supprimer le client
            $compteRequest = new CompteRequest();
            // Appeler la méthode de suppression dans le modèle
            $resultat = $compteRequest->supprimerCompte($compte_id); // Suppression du compte par son ID
            // Vérifier si la suppression a réussi
            if ($resultat) {
                // Rediriger vers la liste des comptes avec un message de succès
                header('Location: /Banque/routeur.php?action=listerCompte');
                exit();
            } else {
                // Si la suppression a échoué, afficher un message d'erreur
                echo "Erreur lors de la suppression du compte.";
                exit();
            }
        } else {
            // Si l'ID du compte n'est pas valide, afficher un message d'erreur
            echo "ID de compte invalide.";
            exit();
        }
    }

}


