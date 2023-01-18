<?php require "../../class/Database.php" ?>

<?php

use class\Database;

$db = new Database();

$id = $_POST["Course"];
$nome = $_POST["nome"];
$desc = $_POST["desc"] ?? null;
$user_id = $_POST["user_id"] ?? null;

$sql = "UPDATE
            `course`
        SET
            `nome` = :nome,
            `descrizione` = :desc,
            `user_id` = :user_id
        WHERE
            id = :id";

$params = [
    ":nome" => $nome,
    ":desc" => $desc,
    ":user_id" => $user_id,
    ":id" => $id
];

$db->query($sql, $params);

header("location: /admin");
