<?php require "../../class/Database.php" ?>

<?php

use class\Database;

$db = new Database();

$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];
$password = $_POST["password"];
$telefono = $_POST["telefono"] ?? null;
$codice_fiscale = $_POST["codice_fiscale"] ?? null;
$data_nascita = $_POST["data_nascita"];
$role = $_POST["role"];

$sql = "INSERT INTO `users`(`nome`, `cognome`, `email`, `password`, `data_nascita`, `telefono`, `codice_fiscale`, `role`)
        VALUES (:nome, :cognome, :email, :password, :data_nascita, :telefono, :codice_fiscale, :role)";

$params = [
        "nome" => $nome,
        "cognome" => $cognome,
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT),
        "data_nascita" => $data_nascita,
        "telefono" => $telefono,
        "codice_fiscale" => $codice_fiscale,
        "role" => $role,
];

$db->query($sql, $params);

header("location: /admin");
