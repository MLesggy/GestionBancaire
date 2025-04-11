<?php


require_once __DIR__ . '/models/Request/ClientRequest.php';
require_once __DIR__ . '/controller/ClientController.php';
require_once __DIR__ . '/controller/CompteController.php';
require_once __DIR__ . '/controller/ContratController.php';
require_once __DIR__ . '/auth.php';

$clientController = new ClientController();
$compteController = new CompteController();
$contratController = new ContratController();


$action = $_GET['action'] ?? 'index'; // Si $_GET['action'] est null ou vide, alors on renvoi index. Sinon on renvoi $_GET['action']
$id = $_GET['id'] ?? null;

switch ($action) {
    // action pour gerer les clients
    case 'voir':
        $clientController->voir();
        break;
    case 'ajouter':
        $clientController->ajouter();
        break;
    case 'modifier':
        $clientController->modifier();
        break;
    case 'supprimer':
        $clientController->supprimer();
        break;
    case 'logout':
        $clientController->deconnexion();
        break;
    case 'liste':
        $clientController->lister();
        exit();
    // action pour gerer les comptes
    case 'listerCompte':
        $compteController->lister();
        break;
    case 'ficheCompte':
        $compteController->ficheCompte();
        break;
    case 'ajouterCompte':
        $compteController->ajouterC();
        break;
    case 'modifierCompte':
        $compteController->modifierC();
        break;
    case 'supprimerCompte':
        $compteController->supprimerC();
        break;
    case 'dashboard':
        require_once __DIR__ . '/models/Request/ClientRequest.php';
        require_once __DIR__ . '/models/Request/CompteRequest.php';

        $clientRequest = new ClientRequest();
        $compteRequest = new CompteRequest();
        $contratRequest = new ContratRequest();

        $nbClients = $clientRequest->compterClients();
        $nbComptes = $compteRequest->compterComptes();
        $nbContrats = $contratRequest->compterContrat();

        require_once __DIR__ . '/dashboard.php';
        break;
    // action pour gerer les contrat 
    case 'voirContrat':
        $contratController->lister();
        break;
    case 'ajouterContrat':
        $contratController->ajouter();
        break;
    case 'modifierContrat':
        $contratController->modifier();
        break;
    case 'supprimerContrat':
        $contratController->supprimer();
        break;

}