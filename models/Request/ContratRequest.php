<?php

require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/../Contrat.php';

//DAO
class ContratRequest
{
    // Attribut
    public DatabaseConnection $connection;

    // Constructeur
    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getContrats(): array // Récupérer tous les contrat
    {
        $statement = $this->connection->getConnection()->query('SELECT * FROM contrat');
        $result = $statement->fetchAll();
        $contrats = [];

        foreach ($result as $row) {
            // Récupère les valeurs depuis le tableau $row
            $type_contrat = $row['type_contrat'];
            $montant_contrat = $row['montant_contrat'];
            $duree_contrat = $row['duree_contrat'];
            $client_associe = $row['id_client'];

            // Créer l'objet Contrat avec ces valeurs
            $contrat = new Contrat($type_contrat, $montant_contrat, $duree_contrat, $client_associe);

            // Hydrate l'objet avec les données de la ligne
            $contrat->hydrate($row);

            // Ajouter l'objet Contrat au tableau des contrats
            $contrats[] = $contrat;
        }

        return $contrats;
    }

    // Récupérer un seul contrat grace à son ID
    public function getContrat(int $id_contrat): ?Contrat
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM contrat WHERE id_contrat = :id_contrat");
        $statement->execute(['id_contrat' => $id_contrat]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $contrat = new Contrat();
        $contrat->hydrate($result);
        return $contrat;
    }

    // Recuperer des clients avec un contrat 
    public function clientAvecContrat(int $id_client): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('SELECT COUNT(*) FROM contrat WHERE id_client = :id_client');
        $statement->execute(['id_client' => $id_client]);
        return $statement->fetchColumn() > 0;
    }
    public function getContratById(int $id_contrat): ?Contrat
    {
        $statement = $this->connection->getConnection()
            ->prepare('SELECT * FROM contrat WHERE id_contrat = :id_contrat');
        $statement->execute(['id_contrat' => $id_contrat]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $contrat = new Contrat($row['type_contrat'], $row['montant_contrat'], $row['duree_contrat'], $row['id_client']);
            $contrat->hydrate($row); // Hydrate l'objet avec les données récupérées
            return $contrat;
        }
        return null;
    }
    // fonction pour compter les contrat, appellé dans l'affichage du dashboard
    public function compterContrat(): int
    {
        $statement = $this->connection->getConnection()->query('SELECT COUNT(*) FROM contrat');
        return (int) $statement->fetchColumn();
    }
    // CRUD contrat 

    public function ajouter(Contrat $contrat): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('INSERT INTO contrat (type_contrat, montant_contrat, duree_contrat, id_client) 
                    VALUES (:type_contrat, :montant_contrat, :duree_contrat, :id_client);');
        return $statement->execute([
            'type_contrat' => $contrat->getType_contrat(),
            'montant_contrat' => $contrat->getMontant_contrat(),
            'duree_contrat' => $contrat->getDuree_contrat(),
            'id_client' => $contrat->getClient_associe(),
        ]);

    }

    public function modifier(Contrat $contrat)
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('UPDATE contrat SET montant_contrat = :montant_contrat, duree_contrat= :duree_contrat
                 WHERE id_contrat = :id_contrat');

        return $statement->execute([
            'montant_contrat' => $contrat->getMontant_contrat(),
            'duree_contrat' => $contrat->getDuree_contrat(),
            'id_contrat' => $contrat->getId_contrat()
        ]);
    }
    public function supprimer(int $id_contrat)
    {
        // Préparer la requête de suppression
        $statement = $this->connection
            ->getConnection()
            ->prepare('DELETE FROM contrat WHERE id_contrat = :id_contrat');

        // Exécuter la requête avec l'ID du compte
        return $statement->execute(['id_contrat' => $id_contrat]);
    }
}



