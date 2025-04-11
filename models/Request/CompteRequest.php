<?php
require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/../CompteBancaire.php';


class CompteRequest
{
    // Attribut
    public DatabaseConnection $connection;

    // Constructeur
    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }
    // Methodes

    // Récupérer tous les comptes
    public function getComptes(): array
    {
        $statement = $this->connection->getConnection()->query('SELECT * FROM compte_bancaire');
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $comptes = [];
        foreach ($result as $row) {
            $compte = new CompteBancaire(
                $row['rib_compte'], // RIB du compte
                $row['type_compte'], // Type de compte
                $row['solde_compte'], // Solde du compte
                $row['id_client'], // ID du client
                $row['id_compte'] // ID du compte (auto-incrémenté)
            );
            $comptes[] = $compte;
        }

        return $comptes;
    }

    public function getCompteById(int $id_compte): ?CompteBancaire // recupere un compte en fonction de son id
    {
        $statement = $this->connection->getConnection()
            ->prepare('SELECT * FROM compte_bancaire WHERE id_compte = :id_compte');
        $statement->execute(['id_compte' => $id_compte]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new CompteBancaire(
                $row['rib_compte'],
                $row['type_compte'],
                $row['solde_compte'],
                $row['id_client'],
                $row['id_compte']
            );
        }
        return null;
    }

    public function compteAvecClient(int $id_client): array
    {
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM compte_bancaire WHERE id_client = :id_client');
        $statement->execute(['id_client' => $id_client]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $comptes = [];
        foreach ($result as $row) {
            // Instancier un objet CompteBancaire avec les données récupérées
            $compte = new CompteBancaire(
                $row['id_compte'],
                $row['rib_compte'],
                $row['type_compte'],
                (float) ($row['solde_compte'] ?? 0),
                $row['id_client'],

            );
            $comptes[] = $compte;
        }
        return $comptes;
    }
    public function verifierExistenceClient($id_client)
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('SELECT COUNT(*) FROM client WHERE id_client = :id_client');
        $statement->execute(['id_client' => $id_client]);
        return $statement->fetchColumn() > 0;
    }
    //fonction pour compter les comptes (utiliser dans l'affichage du dashboard)
    public function compterComptes(): int
    {
        $statement = $this->connection->getConnection()->query('SELECT COUNT(*) FROM compte_bancaire');
        return (int) $statement->fetchColumn();
    }

    // CRUD Compte 


    public function ajouter(CompteBancaire $compte)
    {
        // Vérifier si l'ID client existe dans la base de données
        $statement = $this->connection
            ->getConnection()
            ->prepare('SELECT COUNT(*) FROM client WHERE id_client = :id_client');
        $statement->execute(['id_client' => $compte->getIdClient()]);
        $clientExists = $statement->fetchColumn();
        if ($clientExists == 0) {
            return false;
        }

        $statement = $this->connection
            ->getConnection()
            ->prepare('INSERT INTO compte_bancaire (rib_compte, type_compte, solde_compte, id_client) 
                    VALUES (:rib_compte, :type_compte, :solde_compte, :id_client);');
        return $statement->execute([
            'rib_compte' => $compte->getRib(),
            'type_compte' => $compte->getTypeCompte(),
            'solde_compte' => $compte->getSolde(),
            'id_client' => $compte->getIdClient(),
        ]);

    }

    public function modifier(CompteBancaire $compte)
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('UPDATE compte_bancaire SET type_compte = :type_compte, solde_compte = :solde_compte 
                 WHERE id_compte = :id_compte');

        return $statement->execute([
            'type_compte' => $compte->getTypeCompte(),
            'solde_compte' => $compte->getSolde(),
            'id_compte' => $compte->getIdCompte(),
        ]);
    }
    public function supprimerCompte(int $id_compte): bool
    {
        // Préparer la requête de suppression
        $statement = $this->connection
            ->getConnection()
            ->prepare('DELETE FROM compte_bancaire WHERE id_compte = :id_compte');

        // Exécuter la requête avec l'ID du compte
        return $statement->execute(['id_compte' => $id_compte]);
    }
    // Fin du CRUD 

}






