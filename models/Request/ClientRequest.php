<?php

require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/../Client.php';

// DAO
class ClientRequest
{
    // Attribut
    public DatabaseConnection $connection;

    // Constructeur
    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    // Récupérer tous les clients
    public function getClients(): array
    {
        $statement = $this->connection->getConnection()->query('SELECT * FROM client');
        $result = $statement->fetchAll();
        $clients = [];

        foreach ($result as $row) {
            $client = new Client();
            $client->hydrate($row);
            $clients[] = $client;
        }

        return $clients;
    }

    // Récupérer un seul client grace à son ID
    public function getClient(int $id): ?Client
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM client WHERE id_client = :id_client");
        $statement->execute(['id_client' => $id]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $client = new Client();
        $client->hydrate($result); // méthode propre
        return $client;
    }
    public function clientAvecCompte(int $id): bool // verifie les clients associé à un compte (appellé dans la fonction supprimer)
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('SELECT COUNT(*) FROM compte_bancaire WHERE id_client = :id_client');
        $statement->execute(['id_client' => $id]);
        return $statement->fetchColumn() > 0;
    }
    public function verifierExistenceClient(int $id_client): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('SELECT COUNT(*) FROM client WHERE id_client = :id_client');
        $statement->execute(['id_client' => $id_client]);
        return $statement->fetchColumn() > 0;
    }
    
    // fonction pour compter les clients (utiliser pour l'affichage dans le dashboard)
    public function compterClients(): int
    {
        $statement = $this->connection->getConnection()->query('SELECT COUNT(*) FROM client');
        return (int) $statement->fetchColumn();
    }
    // CRUD Client

    public function ajouter(Client $client): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('INSERT INTO client (nom_client, prenom_client, email_client, telephone_client, adresse_client) 
                    VALUES (:nom_client, :prenom_client, :email_client, :telephone_client, :adresse_client);');
        return $statement->execute([
            'nom_client' => $client->getNom_client(),
            'prenom_client' => $client->getPrenom_client(),
            'email_client' => $client->getEmail_client(),
            'telephone_client' => $client->getTelephone_client(),
            'adresse_client' => $client->getTelephone_client()
        ]);

    }

    public function modifier(Client $client)
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('UPDATE client SET nom_client = :nom_client, prenom_client = :prenom_client, email_client = :email_client, 
                  telephone_client = :telephone_client, adresse_client = :adresse_client WHERE id_client = :id_client');

        return $statement->execute([
            'nom_client' => $client->getNom_client(),
            'prenom_client' => $client->getPrenom_client(),
            'email_client' => $client->getEmail_client(),
            'telephone_client' => $client->getTelephone_client(),
            'adresse_client' => $client->getAdresse_client(),
            'id_client' => $client->getId_client()
        ]);
    }

    public function supprimer(int $id): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('DELETE FROM client WHERE id_client = :id_client');
        return $statement->execute(['id_client' => $id]);
    }

}