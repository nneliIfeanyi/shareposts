<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<a href="<?php echo URLROOT; ?>" class="btn btn-light mb-3"><i class="bi bi-chevron-left" aria-hidden="true"></i> Back</a>
<br>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
  Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
</div>
<p><?php echo $data['post']->body; ?></p>
<?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
  <hr>
  <a class="btn-sm btn btn-dark" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id2; ?>"><i class="bi bi-pen" aria-hidden="true"></i> Edit</a>
  <a class="btn-sm btn btn-success" href="<?php echo URLROOT; ?>/users/wall"><i class="bi bi-journal-text" aria-hidden="true"></i> My Wall</a>
  <form class="float-end" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id2; ?>" method="post">
    <input type="submit" class="btn-sm btn btn-danger" value="Delete">
  </form>
<?php endif; ?>

<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>