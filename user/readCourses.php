<?php require "../class/Database.php" ?>

<?php

use class\Database;

$db = new Database();

$courses = $db->query("SELECT * FROM course")->findAll();

// pp($_SESSION);
// echo key($courses);

?>

<div id="courseCarousel" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#courseCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#courseCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#courseCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <?php $i = 0 ?>
    <?php foreach ($courses as $course) : ?>
      <div class="carousel-item <?php if ($i == 0) echo "active" ?>">
        <img src="https://via.placeholder.com/1920x1080?text=<?= $course->nome ?>" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">
          <p><?= $course->descrizione ?></p>
          <form action="enrollUser.php" method="post">
            <button type="submit" class="btn btn-primary">Enroll Now</button>
            <input type="hidden" name="course_id" value="<?= $course->id ?>">
            <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"] ?>">
          </form>
        </div>
      </div>
      <?php $i++ ?>
    <?php endforeach ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#courseCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#courseCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>