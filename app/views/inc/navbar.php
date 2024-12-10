<?php if (isset($_SESSION['user_id'])) : ?>
  <nav class="navbar navbar-expand-md fixed-top bg-dark-subtle mb-3">
    <div class="container">
      <a class="navbar-brand fw-lighter" href="<?php echo URLROOT; ?>/pages"><?php echo SITENAME; ?></a>
      <div class="d-flex mb-1 ms-auto">
        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-sm"><i class="bi bi-plus-circle fs-4 "></i></a>
        <a href="<?php echo URLROOT; ?>/users/wall" class="btn btn-sm"><i class="bi bi-journal-text fs-4"></i></a>
      </div>
      <button class="navbar-toggler border-0 mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <!-- <i class="bi bi-filter-circle fs-3"></i> -->
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/profile"><i class="bi bi-sliders" aria-hidden="true"></i> Settings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><i class="bi bi-box-arrow-left" aria-hidden="true"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php else: ?>
  <nav class="navbar navbar-expand-md fixed-top bg-dark-subtle mb-3">
    <div class="container">
      <a class="navbar-brand fw-lighter" href="<?php echo URLROOT; ?>/pages"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler border-0 mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages"><i class="bi bi-house" aria-hidden="true"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php endif; ?>