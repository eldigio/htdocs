<?php require "../../class/Database.php" ?>

<?php

use class\Database;

$db = new Database();

$nome = $_POST["nome"];
$desc = $_POST["descrizione"] ?? "";
$user_id = $_POST["user_id"] ?? 0;

$db->query("INSERT INTO `course`(`nome`, `descrizione`, `user_id`) VALUES (:nome, :desc, :user_id)", [
  "nome" => $nome,
  "desc" => $desc,
  "user_id" => $user_id
]);

header("location: /admin");
