<?php
require "../class/Database.php";
require "../class/Validator.php";
require "../partials/utils.php";

use class\Database;
use class\Validator;

session_start();

print_r($_POST);
print_r($_SESSION);

$db = new Database();

if (Validator::checkEmpty($_POST["password"]))
  errorRedirect("/admin?UserPwd=" . $_POST["User"], "Password is empty");
if (Validator::validatePassword($_POST["password"]))
  errorRedirect("/admin?UserPwd=" . $_POST["User"], "Password is invalid");

$data = $db->query("SELECT * FROM users where email = :email", [
  "email" => $_POST["email"]
])->find();

if (password_verify($_POST["password"], $data->password)) {
  errorRedirect("/admin?UserPwd=" . $_POST["User"], "Cannot set password that already exist");
}

$db->query("UPDATE `users` SET password = :password where id = :id", [
  "password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
  "id" => $_POST["User"]
]);
redirect("/" . $_SESSION["role"]);
