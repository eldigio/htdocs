<?php require "../../class/Database.php" ?>

<?php

use class\Database;

$db = new Database();

$id = $_POST["User"];
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];
$telefono = $_POST["telefono"] ?? null;
$codice_fiscale = $_POST["codice_fiscale"] ?? null;
$data_nascita = $_POST["data_nascita"] ?? null;

$sql = "UPDATE
            `users`
        SET
            `nome` = :nome,
            `cognome` = :cognome,
            `email` = :email,
            `telefono` = :telefono,
            `codice_fiscale` = :codice_fiscale,
            `data_nascita` = :data_nascita
        WHERE
            id = :id";

$params = [
    "nome" => $nome,
    "cognome" => $cognome,
    "email" => $email,
    "telefono" => $telefono,
    "codice_fiscale" => $codice_fiscale,
    "data_nascita" => $data_nascita,
    "id" => $id
];

$db->query($sql, $params);

header("location: /admin");
