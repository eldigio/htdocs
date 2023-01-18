<?php session_start() ?>
<?php require "partials/header.php" ?>
<?php require "partials/navbar.php" ?>

<?php if (isset($_SESSION["logged"])) redirect($_SESSION["role"]) ?>

<main class="container">
  <h1 class="my-3 text-center">Homepage</h1>
  <?php //pp($_SESSION) 
  ?>
</main>

<?php require "partials/footer.php" ?>