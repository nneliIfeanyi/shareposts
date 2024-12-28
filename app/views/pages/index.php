<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-fluid my-5">
  <div style="position: relative;margin-top:78px">
    <span class="badge bg-success"><?= SITENAME; ?></span>
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <hr>
    <p class="lead"><?php echo $data['description']; ?></p>
  </div>
</div>
<div class="card card-body mb-3">
  <h4 class="card-title fst-italics fw-light">A Big Welcome</h4>
  <div class="bg-light p-2 mb-3">
    Stanvic Best | <span class="fw-lighter fst-italic"><?php echo date('M d, Y'); ?></span>
  </div>
  <p class="card-text">You can start by writting a journal | How your day went today.</p>
  <a class="btn btn-dark" href="<?php echo URLROOT; ?>/users/login">More</a>
</div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>