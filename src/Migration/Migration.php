<?php

namespace Anse\Migration;

use Anse\Helpers\Connection;

class Migration
{
  protected  $connection;
  public function __construct()
  {
    $dbConnection = new Connection();
    $this->connection = $dbConnection->getConnection();
  }

  public function createTable()
  {
    $Utilisateur = "CREATE TABLE Utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    est_locataire BOOLEAN,
    est_loueur BOOLEAN
    )";

    $Marque = "CREATE TABLE Marques (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
    )";

    $Voiture = "CREATE TABLE Voitures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modele VARCHAR(255) NOT NULL,
    annee INT NOT NULL,
    marque_id INT NOT NULL,
    FOREIGN KEY (marque_id) REFERENCES Marques(id)
    )";
    $Location = "CREATE TABLE Locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    voiture_id INT NOT NULL,
    locataire_id INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    FOREIGN KEY (voiture_id) REFERENCES Voitures(id),
    FOREIGN KEY (locataire_id) REFERENCES Utilisateurs(id)
    )";
    $Annonce = "CREATE TABLE Annonces (
      id INT AUTO_INCREMENT PRIMARY KEY,
      voiture_id INT NOT NULL,
      loueur_id INT NOT NULL,
      prix VARCHAR(55) NOT NULL,
      description TEXT NOT NULL,
      FOREIGN KEY (voiture_id) REFERENCES Voitures(id),
      FOREIGN KEY (loueur_id) REFERENCES Utilisateurs(id)
    )";

    $Commentaires = "CREATE TABLE Commentaires (
          id INT AUTO_INCREMENT PRIMARY KEY,
          annonce_id INT NOT NULL,
          auteur_id INT NOT NULL,
          texte TEXT NOT NULL,
          FOREIGN KEY (annonce_id) REFERENCES Annonces(id),
          FOREIGN KEY (auteur_id) REFERENCES Utilisateurs(id)
      )";
    $Photos = "CREATE TABLE Photos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        annonce_id INT NOT NULL,
        chemin_fichier VARCHAR(255) NOT NULL,
        FOREIGN KEY (annonce_id) REFERENCES Annonces(id)
      )";
    $Transactions = "CREATE TABLE Transactions (
          id INT AUTO_INCREMENT PRIMARY KEY,
          locataire_id INT NOT NULL,
          loueur_id INT NOT NULL,
          montant DECIMAL(10, 2) NOT NULL,
          date_transaction DATE NOT NULL,
          FOREIGN KEY (locataire_id) REFERENCES Utilisateurs(id),
          FOREIGN KEY (loueur_id) REFERENCES Utilisateurs(id)
      )";
    $Messages = "CREATE TABLE Messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            expediteur_id INT NOT NULL,
            destinataire_id INT NOT NULL,
            contenu TEXT NOT NULL,
            date_envoi DATETIME NOT NULL,
            FOREIGN KEY (expediteur_id) REFERENCES Utilisateurs(id),
            FOREIGN KEY (destinataire_id) REFERENCES Utilisateurs(id)
        )";
    $Reservations = "CREATE TABLE Reservations (
          id INT AUTO_INCREMENT PRIMARY KEY,
          voiture_id INT NOT NULL,
          locataire_id INT NOT NULL,
          date_debut DATE NOT NULL,
          date_fin DATE NOT NULL,
          FOREIGN KEY (voiture_id) REFERENCES Voitures(id),
          FOREIGN KEY (locataire_id) REFERENCES Utilisateurs(id)
      )";
    $Avis = "CREATE TABLE Avis (
            id INT AUTO_INCREMENT PRIMARY KEY,
            annonce_id INT NOT NULL,
            auteur_id INT NOT NULL,
            note INT NOT NULL,
            commentaire TEXT NOT NULL,
            FOREIGN KEY (annonce_id) REFERENCES Annonces(id),
            FOREIGN KEY (auteur_id) REFERENCES Utilisateurs(id)
        )";
    $Categories = "CREATE TABLE Categories (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(255) NOT NULL
            )";
    $Villes = "CREATE TABLE Villes (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nom VARCHAR(255) NOT NULL
            )";
    $Paiements = "CREATE TABLE Paiements (
                  id INT AUTO_INCREMENT PRIMARY KEY,
                  utilisateur_id INT NOT NULL,
                  type VARCHAR(255) NOT NULL,
                  numero VARCHAR(255) NOT NULL,
                  expiration DATE NOT NULL,
                  FOREIGN KEY (utilisateur_id) REFERENCES Utilisateurs(id)
              )";
    $Promotions = " CREATE TABLE Promotions (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    code_promo VARCHAR(255) NOT NULL,
                    reduction DECIMAL(10, 2) NOT NULL,
                    date_expiration DATE NOT NULL
                )";
    try {
      $this->connection->exec($Utilisateur);
      $this->connection->exec($Marque);
      $this->connection->exec($Voiture);
      $this->connection->exec($Location);
      $this->connection->exec($Annonce);
      $this->connection->exec($Commentaires);
      $this->connection->exec($Photos);
      $this->connection->exec($Transactions);
      $this->connection->exec($Messages);
      $this->connection->exec($Reservations);
      $this->connection->exec($Avis);
      $this->connection->exec($Categories);
      $this->connection->exec($Villes);
      $this->connection->exec($Paiements);
      $this->connection->exec($Promotions);
      echo "Tables créées avec succès!";
    } catch (\PDOException $e) {
      echo "Erreur lors de la création des tables : " . $e->getMessage();
    }
  }
}
