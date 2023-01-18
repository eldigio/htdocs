<?php session_start() ?>
<?php require "../partials/header.php" ?>
<?php require "../partials/navbar.php" ?>

<main class="container w-50">

  <form action="login.php" method="post">
    <h1 class="text-center my-5">Login</h1>
    <?php if (isset($_SESSION["error"])) : ?>
      <div class="alert alert-danger" role="alert"><?= $_SESSION["error"] ?></div>
    <?php endif ?>
    <div class="form-floating my-3">
      <input type="email" class="form-control" name="email" placeholder="email" value="<?= $_SESSION["email"] ?? "" ?>">
      <label>Email address</label>
    </div>
    <div class="form-floating my-3">
      <input type="password" class="form-control" name="password" placeholder="password">
      <label>Password</label>
      <small>Between 8 and 60 characters long</small>
    </div>
    <button type="submit" class="btn btn-primary w-100 my-3">Login</button>
  </form>
  <?php //pp($_SESSION) 
  ?>
</main>

<?php unset($_SESSION["error"]) ?>
<?php unset($_SESSION["logged"]) ?>

<?php require "../partials/footer.php" ?>

<?php unset($_SESSION["email"]) ?>