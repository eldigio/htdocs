<style>
  span.input-group-text.text-capitalize {
    width: 33%;
    font-size: 14px;
  }
</style>
<?php session_start() ?>
<?php require "../class/Database.php" ?>
<?php require "../partials/header.php" ?>
<?php require "../partials/navbar.php" ?>

<?php if (!isset($_SESSION["logged"])) redirect("/") ?>
<?php if ($_SESSION["role"] !== "admin") redirect("/") ?>

<div class="mx-5 d-flex flex-column gap-5">
  <!-- Utenti -->
  <div class="row mt-3 gap-3">
    <div class="d-flex justify-content-between">
      <h1 class="">Tabella Utenti</h1>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#userModal">
        Nuovo Utente
      </button>
      <!-- Modal -->
      <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="userModalLabel">Inserisci Utente</h1>
            </div>
            <div class="modal-body">
              <form action="userCrud/createUser.php" method="post">
                <p class="fs-6 text-body-secondary"><strong class="text-danger">*</strong> are optional fields</p>
                <!-- fist name -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">nome</span>
                  <input type="text" class="form-control" name="nome" required />
                </div>
                <!-- last name -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">cognome</span>
                  <input type="text" class="form-control" name="cognome" required />
                </div>
                <!-- email -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">email</span>
                  <input type="email" class="form-control" name="email" required />
                </div>
                <!-- password -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">password</span>
                  <input type="password" class="form-control" name="password" required />
                </div>
                <!-- codice fiscale * -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">codice fiscale<strong class="text-danger">*</strong></span>
                  <input type="text" class="form-control" name="codice_fiscale" />
                </div>
                <!-- telefono * -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">telefono<strong class="text-danger">*</strong></span>
                  <input type="tel" class="form-control" name="telefono" />
                </div>
                <!-- data nascita -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">data nascita</span>
                  <input type="date" class="form-control" name="data_nascita" required />
                </div>
                <!-- role -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">role</span>
                  <select name="role" class="form-select">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
                <!-- close / add -->
                <div class="d-flex justify-content-between mt-3">
                  <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary w-25">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_SESSION["error"])) : ?>
      <div class="alert alert-danger" role="alert"><?= $_SESSION["error"] ?></div>
    <?php endif ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="text-nowrap">#</th>
          <th scope="col" class="text-nowrap">Nome</th>
          <th scope="col" class="text-nowrap">Cognome</th>
          <th scope="col" class="text-nowrap">Email</th>
          <th scope="col" class="text-nowrap">Password</th>
          <th scope="col" class="text-nowrap">Telefono</th>
          <th scope="col" class="text-nowrap">Codice Fiscale</th>
          <th scope="col" class="text-nowrap">Data Nascita</th>
          <th scope="col" class="text-nowrap">Data Registrazione</th>
          <th scope="col" class="text-nowrap">Role</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody><?php require "userCrud/readUser.php" ?></tbody>
    </table>
  </div>
  <!-- Corsi -->
  <div class="row mt-3 gap-3">
    <div class="d-flex justify-content-between">
      <h1 class="">Tabella Corsi</h1>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#courseModal">
        Nuovo Corso
      </button>
      <!-- Modal -->
      <div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="courseModalLabel">Inserisci Corso</h1>
            </div>
            <div class="modal-body">
              <form action="courseCrud/createCourse.php" method="post">
                <!-- name -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">nome</span>
                  <input type="text" class="form-control" name="nome" required />
                </div>
                <!-- desc -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">descrizione</span>
                  <textarea class="form-control" name="descrizione" required></textarea>
                </div>
                <!-- user_id -->
                <div class="input-group my-2">
                  <span class="input-group-text text-capitalize">id user</span>
                  <input type="number" class="form-control" name="user_id" />
                </div>
                <!-- close / add -->
                <div class="d-flex justify-content-between mt-3">
                  <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary w-25">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_SESSION["error"])) : ?>
      <div class="alert alert-danger" role="alert"><?= $_SESSION["error"] ?></div>
    <?php endif ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="text-nowrap">#</th>
          <th scope="col" class="text-nowrap">Nome</th>
          <th scope="col" class="text-nowrap">Descrizione</th>
          <th scope="col" class="text-nowrap">Creator Id</th>
          <th scope="col" class="text-nowrap">Num Users</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody><?php require "courseCrud/readCourse.php" ?></tbody>
    </table>
  </div>

  <?php unset($_SESSION["error"]) ?>

  <?php require "../partials/footer.php" ?>