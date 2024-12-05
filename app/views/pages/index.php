<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-fluid">
  <div class="container" style="position: relative;">
    <span class="badge bg-success"><?= SITENAME; ?></span>
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <hr>
    <p class="lead"><?php echo $data['description']; ?></p>
  </div>
</div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>