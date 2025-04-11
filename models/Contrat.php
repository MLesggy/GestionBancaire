<?php

class Contrat
{
    // Attributs
    private int $id_contrat;
    private string $type_contrat;
    private float $montant_contrat;
    private int $duree_contrat;
    private string $client_associe;
    // Constructeur
    public function __construct($type_contrat, $montant_contrat, $duree_contrat, $client_associe = null)
    {
        $this->type_contrat = $type_contrat;
        $this->montant_contrat = $montant_contrat;
        $this->duree_contrat = $duree_contrat;
        $this->client_associe = $client_associe;

        $this->client_associe = $client_associe !== null ? $client_associe : null;
    }
    // Getters
    public function getId_contrat()
    {
        return $this->id_contrat;
    }
    public function getType_contrat()
    {
        return $this->type_contrat;
    }
    public function getMontant_contrat()
    {
        return $this->montant_contrat;
    }
    public function getDuree_contrat()
    {
        return $this->duree_contrat;
    }
    public function getClient_associe()
    {
        return $this->client_associe;
    }
    // Setter 
    public function setId_contrat(int $id_contrat): void
    {
        $this->id_contrat = $id_contrat;
    }
    public function setType_contrat(string $type_contrat): void
    {
        $this->type_contrat = $type_contrat;
    }
    public function setMontant_contrat(float $montant_contrat): void
    {
        $this->montant_contrat = $montant_contrat;
    }
    public function setDuree_contrat(int $duree_contrat): void
    {
        $this->duree_contrat = $duree_contrat;
    }
    public function setclient_associe(string $client_associe): void
    {
        $this->client_associe = $client_associe;
    }
    // methode d'hydratation
    public function hydrate(array $data): void
    {
        $this->setId_contrat($data['id_contrat']);
        $this->setType_contrat($data['type_contrat']);
        $this->setMontant_contrat($data['montant_contrat']);
        $this->setDuree_contrat($data['duree_contrat']);
        $this->setclient_associe($data['id_client']);

    }
}