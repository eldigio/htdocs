<?php require "../../class/Database.php" ?>

<?php

use class\Database;

$db = new Database();

$id = $_GET["Course"];

$sql = "DELETE FROM course where id = :id";
$params = ["id" => $id];

$db->query($sql, $params);

header("location: /admin");
