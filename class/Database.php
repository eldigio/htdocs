<?php

namespace class;

use PDO;

class Database
{

  protected $conn;
  protected $stmt;

  public function __construct()
  {
    $dsn = "mysql:host=127.0.0.1;dbname=cyber_valley";

    $this->conn = new PDO($dsn, "root", "", [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
  }

  public function query($query, $params = [])
  {
    $this->stmt = $this->conn->prepare($query);

    $this->stmt->execute($params);

    return $this;
  }

  public function find()
  {
    return $this->stmt->fetch();
  }

  public function findAll()
  {
    return $this->stmt->fetchAll();
  }
}
