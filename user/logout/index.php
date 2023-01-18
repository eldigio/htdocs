<?php require "../../partials/utils.php" ?>

<?php
session_start();

session_unset();
session_destroy();

redirect("/");