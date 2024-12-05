<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1>Posted</h1>
  </div>
  <div class="col-md-6">
    <a class="btn btn-primary float-end" href="<?php echo URLROOT; ?>/posts/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Post</a>
  </div>
</div>
<?php foreach ($data['posts'] as $post) : ?>
  <div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $post->title; ?></h4>
    <div class="bg-light p-2 mb-3">
      <?php if (empty($post->edited)): ?>
        Written by <?php echo $post->name; ?> | <span class="fw-lighter fst-italic"><?php echo $post->day; ?></span>
      <?php else: ?>
        Written by <?php echo $post->name; ?> | last edited: <span class="fw-lighter fst-italic"><?php echo $post->edited; ?></span>
      <?php endif; ?>
    </div>
    <p class="card-text truncate"><?php echo $post->body; ?></p>
    <a class="btn btn-dark" href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More</a>
  </div>
<?php endforeach; ?>


<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>