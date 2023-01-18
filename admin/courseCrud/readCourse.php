<?php

use class\Database;

$db = new Database();

$courses = $db->query("SELECT * FROM course")->findAll();
$numEnrolled = $db->query("SELECT u.id, u.nome, COUNT(*) numCourses FROM users u LEFT JOIN course c ON c.user_id = u.id GROUP BY u.id")->findAll();
// pp($numEnrolled);
if (!isset($_GET["Course"])) $_GET["Course"] = null;
?>

<?php $i = 0 ?>
<?php foreach ($courses as $course) : ?>
  <tr>
    <?php if ($course->id == $_GET["Course"]) : ?>
      <form action="courseCrud/updateCourse.php" method="post">
        <td><?= $course->id ?></td>
        <td><input type="text" class="form-control" name="nome" value="<?= $course->nome ?>"></td>
        <td><input type="text" class="form-control" name="desc" value="<?= $course->descrizione ?>"></td>
        <td><input type="text" class="form-control" name="user_id" value="<?= $course->user_id ?>"></td>
        <td><?= $numEnrolled[$i]->numCourses ?? 0 ?></td>
        <td><button type="submit" class="btn btn-lg btn-success"><?= $icon_check ?></td>
        <td><a class="btn btn-lg btn-secondary" href="/admin" role="button"><?= $icon_back ?></td>
        <td><input type="hidden" name="Course" value="<?= $course->id ?>"></td>
      </form>
    <?php elseif (isset($_GET["Course"]) || $course->id !== $_GET["Course"]) : ?>
      <td><?= $course->id ?></td>
      <td><?= $course->nome ?></td>
      <td><?= $course->descrizione ?></td>
      <td><?= $course->user_id ?></td>
      <td><?= $numEnrolled[$i]->numCourses ?? 0 ?></td>
      <td><a class="btn btn-lg btn-warning" href="?Course=<?= $course->id ?>" role="button"><?= $icon_edit ?></a></td>
      <td><a class="btn btn-lg btn-danger" href="courseCrud/deleteCourse.php?Course=<?= $course->id ?>" role="button"><?= $icon_delete ?></a></td>
    <?php endif ?>
  </tr>
  <?php $i++ ?>
<?php endforeach ?>