<?php require "../class/Database.php" ?>

<?php

use class\Database;

$db = new Database();

$users = $db->query("SELECT * FROM users")->findAll();
if (!isset($_GET["User"])) $_GET["User"] = null;
if (!isset($_GET["UserPwd"])) $_GET["UserPwd"] = null;
?>

<?php $i = 1 ?>
<?php foreach ($users as $user) : ?>
  <tr>
    <?php if ($user->id == $_GET["User"] or $user->id == $_GET["UserPwd"]) : ?>
      <form action="<?= "userCrud/update" . key($_GET) . ".php" ?>" method="post">
        <td><?= $i ?></td>
        <td><input type="text" class="form-control" name="nome" value="<?= $user->nome ?>"></td>
        <td><input type="text" class="form-control" name="cognome" value="<?= $user->cognome ?>"></td>
        <td><input type="email" class="form-control" name="email" value="<?= $user->email ?>"></td>
        <td>
          <?php if (isset($_GET["UserPwd"]) and $user->id == $_GET["UserPwd"]) : ?>
            <input type="password" class="form-control" name="password">
          <?php else :  ?>
            <a class="btn btn-danger fs-6 text-nowrap w-100" href="?UserPwd=<?= $user->id ?>">Change Password</a>
          <?php endif ?>
        </td>
        <td><input type="text" class="form-control" name="telefono" value="<?= $user->telefono ?>"></td>
        <td><input type="text" class="form-control" name="codice_fiscale" value="<?= $user->codice_fiscale ?>"></td>
        <td><input type="text" class="form-control" name="data_nascita" value="<?= $user->data_nascita ?>"></td>
        <td><?= $user->data_registrazione ?></td>
        <td><?= $user->role ?></td>
        <td><button type="submit" class="btn btn-lg btn-success"><?= $icon_check ?></td>
        <td><a class="btn btn-lg btn-secondary" href="/admin" role="button"><?= $icon_back ?></td>
        <td><input type="hidden" name="User" value="<?= $user->id ?>"></td>
      </form>
    <?php elseif (isset($_GET["User"]) || $user->id !== $_GET["User"]) : ?>
      <td><?= $i ?></td>
      <td><?= $user->nome ?></td>
      <td><?= $user->cognome ?></td>
      <td><?= $user->email ?></td>
      <td><?php passwordHide("&#x2022;") ?></td>
      <td><?= $user->telefono ?></td>
      <td><?= $user->codice_fiscale ?></td>
      <td><?= $user->data_nascita ?></td>
      <td><?= $user->data_registrazione ?></td>
      <td><?= $user->role ?></td>
      <td><a class="btn btn-lg btn-warning" href="?User=<?= $user->id ?>" role="button"><?= $icon_edit ?></a></td>
      <td><a class="btn btn-lg btn-danger" href="userCrud/deleteUser.php?User=<?= $user->id ?>" role="button"><?= $icon_delete ?></a></td>
    <?php endif ?>
  </tr>
  <?php $i++ ?>
<?php endforeach ?>