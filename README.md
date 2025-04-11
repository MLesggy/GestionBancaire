💼 Application de Gestion Bancaire
📌 Contexte et Objectif
Cette application web a été développée pour répondre aux besoins d’une institution bancaire souhaitant moderniser la gestion de ses clients, de leurs comptes bancaires et des contrats souscrits (assurances, crédits, épargne, etc.).

L’objectif principal est de fournir une interface sécurisée, ergonomique et fluide, accessible uniquement par un administrateur, pour gérer les données de manière centralisée.

✨ Fonctionnalités
🔐 Authentification
Connexion sécurisée via email et mot de passe.

Redirection vers le tableau de bord après une authentification réussie.

Déconnexion via suppression de session.

📊 Tableau de Bord
Vue d’ensemble du système :

Nombre total de clients

Nombre total de comptes bancaires

Nombre total de contrats

Accès rapide aux sections principales.

👥 Gestion des Clients
Création de clients avec :

Numéro client généré automatiquement

Nom, prénom, email, téléphone (obligatoires), adresse (optionnelle)

Liste des clients avec options :

Modifier, Supprimer (si aucun compte ou contrat), Voir dossier

Modification des informations (hors numéro client)

Suppression avec confirmation

💳 Gestion des Comptes Bancaires
Création d’un compte avec :

Identifiant généré automatiquement

RIB, type de compte (courant ou épargne), solde initial ≥ 0€

Association à un client existant

Liste des comptes avec options :

Modifier (type ou solde), Supprimer (avec confirmation)

📄 Gestion des Contrats
Création d’un contrat avec :

Identifiant généré automatiquement

Type (assurance vie, habitation, crédits, CEL)

Montant souscrit (€), durée (mois)

Association à un client existant

Liste des contrats avec options :

Modifier (montant ou durée), Supprimer (avec confirmation)

🛠️ Stack Technique
Technologies utilisées
Back-end : PHP (architecture MVC)

Base de données : MySQL

Front-end : HTML, CSS, JavaScript

Sécurité
Mot de passe administrateur haché avec bcrypt

Sessions sécurisées

Requêtes préparées via PDO pour éviter les injections SQL

Organisation du Code
Modèles : Représentation des entités métier

DAO : Classes dédiées pour les requêtes SQL de chaque entité (Client, Compte, Contrat)

Contrôleurs : Logique métier et gestion des requêtes utilisateur

Vues : Affichage des données dans des pages HTML dynamiques

🖥️ Interface Utilisateur
Design
Page de connexion avec champs email et mot de passe

Layout avec :

Header affichant le nom de l’application

Menu latéral pour la navigation

Zone principale pour le contenu dynamique

Navigation
Page de connexion

Tableau de bord

Menu latéral :

Gestion des clients

Gestion des comptes

Gestion des contrats

Déconnexion

