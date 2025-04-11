<?php

require_once __DIR__ . '/../models/Request/ContratRequest.php';

class ContratController
{
    public function deconnexion()
    {
        session_unset(); // Supprimer toutes les variables de session
        session_destroy(); // Détruire la session
        header('Location: /Banque/index.php'); // Redirection vers index.php
        exit();
    }
    public function lister() // tableau avec tout les contrats 
    {
        $contratRequest = new ContratRequest();
        $contrats = $contratRequest->getContrats();

        require_once __DIR__ . '/../view/viewContrat.php';
    }
    //CRUD Contrat 
    public function ajouter()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // empeche l'accès a la page si ça ne vient pas du formulaire'
            // Récupérer les données du formulaire
            $type_contrat = $_POST['type_contrat'];
            $montant_contrat = $_POST['montant_contrat'];
            $duree_contrat = $_POST['duree_contrat'];
            $client_associe = $_POST['id_client'];

            // Validation des données
            if (empty($montant_contrat) || ($montant_contrat < 0)) {
                echo "montant invalide";
                exit;
            }

            if (empty($duree_contrat) || ($duree_contrat < 0)) {
                echo "duree invalide";
                exit;
            }
            $clientRequest = new ClientRequest();
            if (!$clientRequest->verifierExistenceClient($client_associe)) {
                echo "Le numéro de client n'existe pas.";
                exit;
            }
            // Créer un objet Client avec les données du formulaire
            $contrat = new Contrat();
            $contrat->setType_contrat($type_contrat);
            $contrat->setMontant_contrat($montant_contrat);
            $contrat->setDuree_contrat($duree_contrat);
            $contrat->setclient_associe($client_associe);
            ;
            // Ajouter le client à la base de données
            $contratRequest = new ContratRequest();
            if ($contratRequest->ajouter($contrat)) {

                header('Location: routeur.php?action=voirContrat');
                exit();
            } else {
                echo "Erreur lors de l'ajout du client.";
            }
        }
    }
    public function modifier()
    {
        if (isset($_GET['id_contrat']) && is_numeric($_GET['id_contrat'])) {
            // Récupérer l'ID du contrat à modifier
            $contratId = $_GET['id_contrat'];

            // Créer un objet ContratRequest pour récupérer les données du contrat
            $contratRequest = new ContratRequest();
            $contrat = $contratRequest->getContratById($contratId); // Récupère le contrat par son ID

            if ($contrat === null) {
                echo "Contrat introuvable.";
                exit;
            }
            // Si le formulaire est soumis pour modifier le contrat
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $montant_contrat = $_POST['montant_contrat'];
                $duree_contrat = $_POST['duree_contrat'];

                // Mettre à jour l'objet Contrat
                $contrat->setMontant_contrat($montant_contrat);
                $contrat->setDuree_contrat($duree_contrat);

                // Appeler la méthode pour mettre à jour le contrat dans la base de données
                if ($contratRequest->modifier($contrat)) {
                    // Rediriger vers la liste des contrats après la modification
                    header('Location: routeur.php?action=voirContrat');
                    exit();
                } else {
                    echo "Erreur lors de la modification du contrat.";
                }
            }
            // Afficher la vue de modification avec les données actuelles du contrat

            require_once __DIR__ . '/../view/modifierContrat.php';
        }
    }
    public function supprimer()
    {
        if (isset($_GET['id_contrat']) && is_numeric($_GET['id_contrat'])) {
            $id_contrat = $_GET['id_contrat'];

            // Créer un objet ClientRequest pour supprimer le client
            $contratRequest = new ContratRequest();
            // Appeler la méthode de suppression dans le modèle
            $resultat = $contratRequest->supprimer($id_contrat); // Suppression du compte par son ID

            // Vérifier si la suppression a réussi
            if ($resultat) {
                // Rediriger vers la liste des comptes avec un message de succès
                header('Location: /Banque/routeur.php?action=voirContrat');
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

