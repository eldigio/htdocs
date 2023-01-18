<?php session_start() ?>
<?php require "../partials/header.php" ?>
<?php require "../partials/navbar.php" ?>

<main class="container w-50">

  <form action="register.php" method="post">
    <h1 class="text-center my-3">Register</h1>
    <p class="text-body-secondary"><strong class="text-danger">*</strong> are optional fields</p>
    <?php if (isset($_SESSION["error"])) : ?>
      <div class="alert alert-danger" role="alert"><?= $_SESSION["error"] ?></div>
    <?php endif ?>
    <?php if (isset($_SESSION["success"])) : ?>
      <div class="alert alert-success" role="alert"><?= $_SESSION["success"] ?></div>
    <?php endif ?>
    <!-- Nome / Cognome -->
    <div class="d-flex gap-3 my-3">
      <div class="form-floating w-100">
        <input type="text" class="form-control" name="nome" placeholder="nome" value="<?= $_SESSION["nome"] ?? "" ?>">
        <label>Nome</label>
      </div>
      <div class="form-floating w-100">
        <input type="text" class="form-control" name="cognome" placeholder="cognome" value="<?= $_SESSION["cognome"] ?? "" ?>">
        <label>Cognome</label>
      </div>
    </div>
    <!-- Email -->
    <div class="form-floating my-3">
      <input type="email" class="form-control" name="email" placeholder="email" value="<?= $_SESSION["email"] ?? "" ?>">
      <label>Email address</label>
    </div>
    <!-- Password -->
    <div class="form-floating">
      <input type="password" class="form-control" name="password" placeholder="password">
      <label>Password</label>
      <small>Between 8 and 60 characters long</small>
    </div>
    <!-- Data Nascita -->
    <div class="form-floating">
      <input type="date" class="form-control" name="data_nascita" value="<?= $_SESSION["data_nascita"] ?? "" ?>" />
      <label>data nascita</label>
    </div>
    <!-- optional(telefono / codice_fiscale) -->
    <div class="d-flex gap-3 mt-3">
      <div class="form-floating w-100">
        <input type="tel" class="form-control" name="telefono" placeholder="telefono" value="<?= $_SESSION["telefono"] ?? "" ?>">
        <label>Telefono <strong class="text-danger">*</strong></label>
      </div>
      <div class="form-floating w-100">
        <input type="text" class="form-control" name="codice_fiscale" placeholder="codice_fiscale" value="<?= $_SESSION["codice_fiscale"] ?? "" ?>">
        <label>Codice Fiscale <strong class="text-danger">*</strong></label>
      </div>
    </div>
    <!-- /login -->
    <div class="d-flex gap-1">
      <small class="fs-6">Already a user?</small>
      <a href="/login">Login</a>
    </div>
    <button type="submit" class="btn btn-primary w-100">Register</button>

  </form>
  <?php //pp($_SESSION) 
  ?>
</main>

<?php unset($_SESSION["error"]) ?>
<?php unset($_SESSION["success"]) ?>

<?php require "../partials/footer.php" ?>

<?php unset($_SESSION["nome"]) ?>
<?php unset($_SESSION["cognome"]) ?>
<?php unset($_SESSION["email"]) ?>
<?php unset($_SESSION["data_nascita"]) ?>
<?php unset($_SESSION["telefono"]) ?>
<?php unset($_SESSION["codice_fiscale"]) ?>