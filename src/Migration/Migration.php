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
    $Utilisateurs = "CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin','super_admin' ) NOT NULL DEFAULT 'user'
    )";

    $Categories = "CREATE TABLE categories (
      id INT PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR(255) NOT NULL
      )";
    $Articles = "CREATE TABLE articles (
        id INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        category_id INT,
        user_id INT,
        published BOOLEAN DEFAULT 0,
        created_date DATE NOT NULL,
        updated_date DATE NOT NULL,
        excerpt VARCHAR(255) NOT NULL,
        FOREIGN KEY (category_id) REFERENCES categories(id),
        FOREIGN KEY (user_id) REFERENCES users(id)
        )";
    $Comments = "CREATE TABLE comments (
            id INT PRIMARY KEY AUTO_INCREMENT,
            article_id INT,
            user_id INT,
            content TEXT NOT NULL,
            FOREIGN KEY (article_id) REFERENCES articles(id),
            FOREIGN KEY (user_id) REFERENCES users(id)
        )";
    try {
      $this->connection->exec($Utilisateurs);
      $this->connection->exec($Categories);
      $this->connection->exec($Articles);
      $this->connection->exec($Comments);

      echo "Tables créées avec succès!";
    } catch (\PDOException $e) {
      echo "Erreur lors de la création des tables : " . $e->getMessage();
    }
  }
}
