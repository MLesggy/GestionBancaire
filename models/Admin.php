<?php

require_once __DIR__ . '/../lib/database.php';
require_once __DIR__ . '/../models/Client.php';

class Admin
{
    //attributs
    private int $id_admin;
    private string $nom_admin;
    private string $mdp_admin;
    private string $email_admin;
    // constructeur
    public function __construct(string $nom_admin = "", string $mdp_admin = "", string $email_admin = "")
    {
        $this->setNom($nom_admin);
        $this->setMDP($mdp_admin);
        $this->setEmail($email_admin);
    }
    // methode 
    // getter 
    public function getId(): int
    {
        return $this->id_admin;
    }
    public function getNom(): string
    {
        return $this->nom_admin;
    }
    public function getMdp(): string
    {
        return $this->mdp_admin;
    }
    public function getEmail(): string
    {
        return $this->email_admin;
    }
    //setter
    public function setNom(string $nom_admin): void
    {
        $this->nom_admin = htmlspecialchars($nom_admin);
    }
    public function setMDP(string $mdp_admin): void
    {
        $this->mdp_admin = htmlspecialchars($mdp_admin);
    }
    public function setEmail(string $email_admin): void
    {
        $this->email_admin = htmlspecialchars($email_admin);
    }

}

