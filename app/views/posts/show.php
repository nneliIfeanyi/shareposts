<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<a href="<?php echo URLROOT; ?>" class="btn btn-light mb-3"><i class="bi bi-chevron-left" aria-hidden="true"></i> Back</a>
<br>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
  <?php if (empty($data['user']->edited)): ?>
    Written by <?php echo $data['user']->name; ?> | <span class="fw-lighter fst-italic"><?php echo $data['post']->day; ?></span>
  <?php else: ?>
    Written by <?php echo $data['user']->name; ?> | last edited: <span class="fw-lighter fst-italic"><?php echo $data['post']->edited; ?></span>
  <?php endif; ?>
</div>
<p><?php echo $data['post']->body; ?></p>
<hr>
<div class="fw-light" style="font-size: x-small;">Reactions to this post will appear hear</div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>