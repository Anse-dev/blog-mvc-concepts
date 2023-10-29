<?php

namespace Anse\Helpers;

use PDO;
use PDOException;

class Connection
{
  private $pdo;

  public function __construct()
  {
    $dbHost = "localhost";
    $dbName = "blog";
    $dbUser = "root";
    $dbPassword = "anselme";
    $charset = 'utf8';

    $this->connect($dbHost, $dbName, $dbUser, $dbPassword, $charset);
  }

  private function connect($host, $dbname, $username, $password, $charset)
  {
    $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

    try {
      $this->pdo = new PDO($dsn, $username, $password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
  }

  public function getConnection()
  {
    return $this->pdo;
  }
}
