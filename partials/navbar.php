<?php require "utils.php" ?>
<nav class="navbar navbar-expand-md bg-dark-subtle">
  <div class="container">
    <a class="navbar-brand" href="/">Cyber Valley</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <?php if (requestUri() === "/") : ?>
          <a class="nav-link" href="/login">Login</a>
        <?php endif ?>
        <div class="dropdown-center">
          <button class="btn btn-dark dropdown-toggle text-capitalize" type="button" data-bs-toggle="dropdown">
            <?php if (isset($_SESSION["logged"])) : ?>
              <?= $_SESSION["role"] ?>
            <?php else : ?>
              <?= $icon_user ?>
            <?php endif ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>