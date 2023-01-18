<?php
session_start();

$user = $db->query("SELECT * FROM users where id = :id", ["id" => $_SESSION["user_id"]])->find();

// pp($user);


$userData = (array)$user;
// pp($userData);


?>

<style>
  span.input-group-text.text-capitalize {
    width: 33%;
    font-size: .75rem;
  }
</style>

<?php foreach ($user as $data) : ?>
  <?php if (key($userData) !== "id" and key($userData) !== "password" and key($userData) !== "role") : ?>
    <div class="input-group">
      <span class="input-group-text text-capitalize"><?= str_replace("_", " ", key($userData)); ?></span>
      <input type="text" class="form-control text-center" value="<?= current($userData) ?>" disabled>
    </div>
  <?php endif ?>
  <?php next($userData) ?>
<?php endforeach ?>