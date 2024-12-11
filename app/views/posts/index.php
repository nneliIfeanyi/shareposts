<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/posts"><i class="bi bi-house text-muted"></i></a></li>
    <li class="breadcrumb-item fst-italic">Public</li>
  </ol>
</nav>
<?php flash('post_message'); ?>
<?php foreach ($data['posts'] as $post) : ?>
  <div class="card card-body mb-3">
    <h4 class="card-title fst-italics fw-light"><?php echo $post->title; ?></h4>
    <div class="bg-light p-2 mb-3">
      <?php if (empty($post->edited)): ?>
        <?php echo $post->name; ?> | <span class="fw-lighter fst-italic"><?php echo $post->day; ?></span>
      <?php else: ?>
        <?php echo $post->name; ?> | last edited: <span class="fw-lighter fst-italic"><?php echo $post->edited; ?></span>
      <?php endif; ?>
    </div>
    <p class="card-text"><?php echo $post->body; ?></p>
    <a class="btn btn-dark" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More</a>
  </div>
<?php endforeach; ?>
<!-- End of posts -->
<div class="d-flex justify-content-center">
  <div class="spinner-border spinner-border-sm text-secondary mt-3" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>

<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>