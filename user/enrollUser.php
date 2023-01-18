<?php require "../class/Database.php" ?>
<?php require "../partials/utils.php" ?>

<?php

use class\Database;

$db = new Database();

print_r($_POST);

$db->query("INSERT INTO courseusers (user_id, course_id)
            VALUES (:user_id, course_id)", [
  "user_id" => $_POST["user_id"],
  "course_id" => $_POST["course_id"]
]);

redirect("/user");