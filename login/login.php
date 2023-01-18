<?php

require "../class/Validator.php";
require "../class/Database.php";
require "../partials/utils.php";

use class\Database;
use class\Validator;

$db = new Database();

session_start();
$_SESSION["email"] = $_POST["email"];

if (Validator::checkEmpty($_POST["email"]) and Validator::checkEmpty($_POST["password"]))
  errorRedirect("/login", "Email and Password are empty");

if (Validator::checkEmpty($_POST["email"])) errorRedirect("/login", "Email is empty");
if (Validator::validateEmail($_POST["email"])) errorRedirect("/login", "Email is invalid");

if (Validator::checkEmpty($_POST["password"])) errorRedirect("/login", "Password is empty");
if (Validator::validatePassword($_POST["password"])) errorRedirect("/login", "Password is invalid");

$data = $db->query("SELECT * FROM users where email = :email", [
  "email" => $_POST["email"]
])->find();

if (password_verify($_POST["password"], $data->password)) {
  $_SESSION["logged"] = true;
  $_SESSION["role"] = $data->role;
  redirect("/{$data->role}");
}

errorRedirect("/login", "Password in not correct");
