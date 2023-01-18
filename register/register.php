<?php

require "../class/Validator.php";
require "../class/Database.php";
require "../partials/utils.php";

use class\Database;
use class\Validator;

$db = new Database();

session_start();
$_SESSION["nome"] = $_POST["nome"];
$_SESSION["cognome"] = $_POST["cognome"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["data_nascita"] = $_POST["data_nascita"];
$_SESSION["telefono"] = $_POST["telefono"] ?? null;
$_SESSION["codice_fiscale"] = $_POST["codice_fiscale"] ?? null;

pp($_POST);

if (Validator::checkEmpty($_POST["nome"])) errorRedirect("/register", "Nome is empty");
if (Validator::checkEmpty($_POST["cognome"])) errorRedirect("/register", "Cognome is empty");
if (Validator::checkEmpty($_POST["email"])) errorRedirect("/register", "Email is empty");
if (Validator::checkEmpty($_POST["password"])) errorRedirect("/register", "Password is empty");
if (Validator::checkEmpty($_POST["data_nascita"])) errorRedirect("/register", "Data Nascita is empty");

if (Validator::validateEmail($_POST["email"])) errorRedirect("/register", "Email is invalid");
if (Validator::validatePassword($_POST["password"])) errorRedirect("/register", "Password is invalid");

$db->query("INSERT INTO users(
              `nome`,
              `cognome`,
              `email`,
              `password`,
              `telefono`,
              `codice_fiscale`,
              `data_nascita`
            ) VALUES (
              :nome,
              :cognome,
              :email,
              :password,
              :telefono,
              :codice_fiscale,
              :data_nascita
            )
  ", [
    "nome" => $_POST["nome"],
    "cognome" => $_POST["cognome"],
    "email" => $_POST["email"],
    "password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
    "telefono" => $_POST["telefono"],
    "codice_fiscale" => $_POST["codice_fiscale"],
    "data_nascita" => $_POST["data_nascita"]
  ]);

successRedirect("/login", "Successfully Registered!");