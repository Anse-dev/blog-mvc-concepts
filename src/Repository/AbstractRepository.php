<?php

namespace Anse\Repository;

use Anse\Helpers\Connection;

class AbstractRepository
{
  protected  \PDO $connection;
  public function __construct()
  {
    $dbConnection = new Connection();
    $this->connection = $dbConnection->getConnection();
  }
}
