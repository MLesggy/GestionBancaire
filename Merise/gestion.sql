#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Administrateur 
#------------------------------------------------------------

CREATE TABLE Administrateur(
        id_admin     Int  Auto_increment  NOT NULL ,
        nom_admin    Varchar (50) NOT NULL ,
        mdp_admin    Varchar (50) NOT NULL ,
        email_admin  Varchar (100) NOT NULL
	,CONSTRAINT Administrateur_PK PRIMARY KEY (id_admin)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Client 
#------------------------------------------------------------

CREATE TABLE Client(
        id_client         Int  Auto_increment  NOT NULL ,
        nom_client        Varchar (50) NOT NULL ,
        prenom_client     Varchar (50) NOT NULL ,
        email_client      Varchar (50) NOT NULL ,
        telephone_client  Numeric NOT NULL ,
        adresse_client    Varchar (50) NOT NULL
	,CONSTRAINT Client_PK PRIMARY KEY (id_client)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Compte bancaire 
#------------------------------------------------------------

CREATE TABLE Compte_bancaire(
        id_compte    Int  Auto_increment  NOT NULL ,
        rib_compte   Varchar (50) NOT NULL ,
        type_compte  Varchar (100) NOT NULL ,
        solde_compte Float NOT NULL
	,CONSTRAINT Compte_bancaire_PK PRIMARY KEY (id_compte)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contrat 
#------------------------------------------------------------

CREATE TABLE Contrat(
        id_contrat      Int  Auto_increment  NOT NULL ,
        type_contrat    Varchar (100) NOT NULL ,
        montant_contrat Float NOT NULL ,
        duree_contrat   Int NOT NULL
	,CONSTRAINT Contrat_PK PRIMARY KEY (id_contrat)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Ouvrir
#------------------------------------------------------------

CREATE TABLE Ouvrir(
        id_compte Int NOT NULL ,
        id_client Int NOT NULL
	,CONSTRAINT Ouvrir_PK PRIMARY KEY (id_compte,id_client)

	,CONSTRAINT Ouvrir_Compte_bancaire_FK FOREIGN KEY (id_compte) REFERENCES Compte_bancaire(id_compte)
	,CONSTRAINT Ouvrir_Client0_FK FOREIGN KEY (id_client) REFERENCES Client(id_client)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Souscrire
#------------------------------------------------------------

CREATE TABLE Souscrire(
        id_contrat Int NOT NULL ,
        id_client  Int NOT NULL
	,CONSTRAINT Souscrire_PK PRIMARY KEY (id_contrat,id_client)

	,CONSTRAINT Souscrire_Contrat_FK FOREIGN KEY (id_contrat) REFERENCES Contrat(id_contrat)
	,CONSTRAINT Souscrire_Client0_FK FOREIGN KEY (id_client) REFERENCES Client(id_client)
)ENGINE=InnoDB;

