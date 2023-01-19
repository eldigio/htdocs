<?php

$user = $db->query("SELECT * FROM users where id = :id", ["id" => $_SESSION["user_id"]])->find();

// pp($user);


$userData = (array)$user;
// pp($userData);


?>

<?php foreach ($user as $data) : ?>
  <?php if (key($userData) !== "id" and key($userData) !== "password" and key($userData) !== "role") : ?>
    <li class="list-group-item">
      <small class="text-capitalize"><?= str_replace("_", " ", key($userData)); ?></small>
      <span><?= current($userData) ?></span>
    </li>
  <?php endif ?>
  <?php next($userData) ?>
<?php endforeach ?>