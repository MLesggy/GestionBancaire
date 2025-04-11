<?php

class Client
{
    //attributs
    private int $id_client;
    private string $nom_client;
    private string $prenom_client;
    private string $email_client;
    private string $telephone_client;
    private string $adresse_client;
    //getter 
    public function getId_client(): int
    {
        return $this->id_client;
    }
    public function getNom_client(): string
    {
        return $this->nom_client;
    }
    public function getPrenom_client(): string
    {
        return $this->prenom_client;
    }
    public function getEmail_client(): string
    {
        return $this->email_client;
    }
    public function getTelephone_client(): string
    {
        return $this->telephone_client;
    }
    public function getAdresse_client(): string
    {
        return $this->adresse_client;
    }
    //setter 
    public function setId_client(int $id_client): void
    {
        $this->id_client = $id_client;
    }
    public function setNom_client(string $nom_client): void
    {
        $this->nom_client = htmlspecialchars($nom_client);
    }
    public function setPrenom_client(string $prenom_client): void
    {
        $this->prenom_client = htmlspecialchars($prenom_client);
    }
    public function setEmail_client(string $email_client): void
    {
        $this->email_client = htmlspecialchars($email_client);
    }
    public function setTelephone_client(string $telephone_client): void
    {
        $this->telephone_client = htmlspecialchars($telephone_client);
    }
    public function setAdresse_client(string $adresse_client): void
    {
        $this->adresse_client = htmlspecialchars($adresse_client);
    }
    public function hydrate(array $data): void
    {
        $this->setId_client($data['id_client']);
        $this->setNom_client($data['nom_client']);
        $this->setPrenom_client($data['prenom_client']);
        $this->setEmail_client($data['email_client']);
        $this->setTelephone_client($data['telephone_client']);
        $this->setAdresse_client($data['adresse_client']);
    }


}