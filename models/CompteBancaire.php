<?php


class CompteBancaire
{
    // Attributs
    private ?int $id_compte;
    private string $rib_compte;
    private string $type_compte;
    private float $solde_compte;
    private $id_client;

    // Constructeur
    public function __construct($rib_compte, $type_compte, $solde_compte, $id_client, $id_compte = null)
    {
        $this->rib_compte = $rib_compte;
        $this->type_compte = $type_compte;
        $this->solde_compte = (float) $solde_compte;
        $this->id_client = $id_client;

        // Si un id_compte est passé (ce qui signifie qu'on est en train de récupérer un compte existant),
        // il sera affecté à l'attribut $id_compte, sinon il reste à null.
        $this->id_compte = $id_compte !== null ? $id_compte : null;
    }

    // Getters
    public function getIdCompte(): ?int
    {
        return $this->id_compte;
    }

    public function getRib(): string
    {
        return $this->rib_compte;
    }

    public function getTypeCompte(): string
    {
        return $this->type_compte;
    }

    public function getSolde(): float
    {
        return $this->solde_compte;
    }

    public function getIdClient()
    {
        return $this->id_client;
    }

    // Setters
    public function setIdCompte(int $id_compte): void
    {
        $this->id_compte = $id_compte;
    }

    public function setRib(string $rib_compte): void
    {
        $this->rib_compte = $rib_compte;
    }

    public function setTypeCompte(string $type_compte): void
    {
        $this->type_compte = $type_compte;
    }

    public function setSolde(float $solde_compte): void
    {
        $this->solde_compte = $solde_compte;
    }

    public function setIdClient($id_client): void
    {
        $this->id_client = $id_client;
    }

    //methodes
    public function afficherCompte()
    {
        return "Compte ID: " . $this->id_compte . ", RIB: " . $this->rib_compte . ", Type: " . $this->type_compte . ", Solde: " . $this->solde_compte . " EUR, Client ID: " . $this->id_client;
    }
    public function hydrate(array $data): void
    {
        $this->setIdCompte($data['id_compte']);
        $this->setRib($data['rib_compte']);
        $this->setTypeCompte($data['type_compte']);
        $this->setSolde($data['solde_compte']);
        $this->setIdClient($data['id_client']);
    }

}
