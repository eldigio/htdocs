<?php session_start() ?>
<?php require "../partials/header.php" ?>
<?php require "../partials/navbar.php" ?>

<?php if (!isset($_SESSION["logged"])) redirect("/") ?>
<?php if ($_SESSION["role"] === "admin") redirect("/admin") ?>

<main class="container">
  <h1 class="my-3 text-center">Hello, <?= $_SESSION["name"] ?? "" ?></h1>

  <div class="row">
    <div class="col-8"><?php require "readCourses.php" ?></div>
    <div class="col-4 d-flex flex-column justify-content-center">
      <ul class="list-group"><?php require "readUser.php" ?></ul>
    </div>
  </div>

</main>

<?php require "../partials/footer.php" ?>